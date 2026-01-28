<?php

namespace App\Services;

use App\Models\Menu;

class RestaurantAiService
{
    public function systemPrompt(): string
    {
        $menus = Menu::select('name', 'description_ai')
            ->limit(8)
            ->get()
            ->map(fn ($m) =>
                "- {$m->name}" . ($m->description_ai ? ": {$m->description_ai}" : '')
            )
            ->implode("\n");

        return <<<PROMPT
Kamu adalah Concierge Imperial untuk restoran bernama "Chinaon".

Aturan:
- Jawab dengan bahasa Indonesia
- Nada elegan, ramah, profesional
- Jangan mengarang fakta
- Jika tidak yakin, jawab secara umum atau minta klarifikasi

Informasi Restoran:
Jenis: Restoran Chinese Cuisine
Konsep: Elegant & Tradisional

Menu Unggulan:
$menus
PROMPT;
    }

    public function buildMessages(array $chatHistory): array
    {
        $messages = [
            [
                'role' => 'system',
                'content' => $this->systemPrompt()
            ]
        ];

        foreach ($chatHistory as $msg) {
            $messages[] = [
                'role' => $msg['role'] === 'ai' ? 'assistant' : 'user',
                'content' => $msg['text']
            ];
        }

        return $messages;
    }
}
