<?php

namespace App\Services;

use Illuminate\Support\Facades\Http;

class AiService
{
    public function chat(array $messages): string
    {
        $provider = config('ai.providers.' . config('ai.driver'));

        $response = Http::timeout($provider['timeout'])
            ->post($provider['endpoint'], [
                'model' => $provider['model'],
                'messages' => $messages,
                'temperature' => config('ai.chat.temperature'),
            ]);

        if (! $response->successful()) {
            logger()->error('AI HTTP Error', [
                'status' => $response->status(),
                'body' => $response->body(),
            ]);

            return 'Maaf, sistem AI sedang tidak tersedia.';
        }

        return data_get($response->json(), 'choices.0.message.content')
            ?? 'AI tidak memberikan jawaban.';
    }
}
