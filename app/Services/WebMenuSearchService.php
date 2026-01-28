<?php

namespace App\Services;

use Illuminate\Support\Facades\Http;

class WebMenuSearchService
{
    protected function client()
    {
        return Http::withoutVerifying()
            ->withHeaders([
                'User-Agent' => 'GoldenDragonBot/1.0 (contact: admin@goldendragon.test)',
                'Accept'     => 'application/json',
            ])
            ->timeout(15);
    }

    public function search(string $query): ?string
    {
        $query = trim($query);

        // 1️⃣ Cari judul artikel (Wikipedia ID)
        $search = $this->client()->get(
            'https://id.wikipedia.org/w/api.php',
            [
                'action'   => 'query',
                'list'     => 'search',
                'srsearch' => $query,
                'format'   => 'json',
            ]
        );

        $title = $search->json()['query']['search'][0]['title'] ?? null;

        if (! $title) {
            return null;
        }

        // 2️⃣ Ambil extract (LEBIH STABIL DARI REST SUMMARY)
        $extractResponse = $this->client()->get(
            'https://id.wikipedia.org/w/api.php',
            [
                'action'      => 'query',
                'prop'        => 'extracts',
                'exintro'     => true,
                'explaintext' => true,
                'titles'      => $title,
                'format'      => 'json',
            ]
        );

        $pages = $extractResponse->json()['query']['pages'] ?? [];
        $page  = reset($pages);

        return ! empty($page['extract'])
            ? $page['extract']
            : null;
    }
}
