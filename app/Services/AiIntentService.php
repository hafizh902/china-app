<?php

namespace App\Services;

class AiIntentService
{
    public function parse(string $message): array
    {
        $ai = app(AiService::class);

        $response = $ai->chat([
            [
                'role' => 'system',
                'content' => <<<PROMPT
Kamu adalah parser untuk sistem restoran.

TUGAS:
- Tentukan intent user
- Ekstrak nama menu jika ada
- Jangan menjawab pertanyaan
- Jangan mengarang data

BALAS HANYA JSON VALID, TANPA TEKS TAMBAHAN.

FORMAT:
{
  "intent": "price | description | list_menu | general",
  "menu": "nama menu atau null"
}
PROMPT
            ],
            [
                'role' => 'user',
                'content' => $message
            ]
        ]);

        $json = json_decode($response, true);

        if (! is_array($json)) {
            return [
                'intent' => 'general',
                'menu' => null
            ];
        }

        return [
            'intent' => $json['intent'] ?? 'general',
            'menu'   => $json['menu']   ?? null
        ];
    }
}
