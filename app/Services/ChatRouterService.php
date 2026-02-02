<?php

namespace App\Services;

use App\Models\Menu;

class ChatRouterService
{
    public function handle(string $message): string
    {
        $intentService = app(AiIntentService::class);
        $menuService   = app(MenuKnowledgeService::class);

        /**
         * =========================
         * 1️⃣ PARSE INTENT (AI)
         * =========================
         */
        $parsed   = $intentService->parse($message);
        $intent   = $parsed['intent'] ?? 'general';
        $menuName = isset($parsed['menu']) ? trim($parsed['menu']) : null;

        $lower = strtolower($message);

        /**
         * =========================
         * 2️⃣ SHORT MEMORY (READ)
         * =========================
         */
        if (! $menuName && session()->has('last_menu_id')) {
            $lastMenu = Menu::find(session('last_menu_id'));
            if ($lastMenu) {
                $menuName = $lastMenu->name;
            }
        }

        /**
         * =========================
         * 3️⃣ INTENT OVERRIDE (ANTI SALAH AI)
         * =========================
         */
        if (
            $menuName &&
            preg_match('/(apa|itu|makanan|deskripsi)/i', $lower)
        ) {
            $intent = 'description';
        }

        /**
         * =========================
         * 4️⃣ PRICE
         * =========================
         */
        if ($intent === 'price') {

            if (! $menuName) {
                return "Menu apa yang ingin Anda tanyakan harganya?";
            }

            $menu = $menuService->find($menuName);

            if (! $menu) {
                return "Mohon maaf, menu tersebut tidak tersedia di restoran kami.";
            }

            session(['last_menu_id' => $menu->id]);

            return "Harga {$menu->name} adalah Rp " .
                number_format($menu->price, 0, ',', '.');
        }

        /**
         * =========================
         * 5️⃣ DESCRIPTION
         * =========================
         */
        if ($intent === 'description') {

            if (! $menuName) {
                return "Menu apa yang ingin Anda ketahui deskripsinya?";
            }

            $menu = $menuService->find($menuName);

            if (! $menu) {
                return "Mohon maaf, menu tersebut tidak tersedia di restoran kami.";
            }

            session(['last_menu_id' => $menu->id]);

            if (! empty($menu->description_ai)) {
                return $menu->description_ai;
            }

            $query = preg_replace('/[^a-zA-Z0-9\s]/', '', $menu->name);
            $webText = app(WebMenuSearchService::class)->search($query);

            if (! $webText) {
                return "Kami belum menemukan informasi untuk menu {$menu->name}.";
            }

            $summary = app(AiService::class)->chat([
                [
                    'role' => 'system',
                    'content' =>
                        'Jelaskan apa itu makanan berikut dalam 2 kalimat bahasa Indonesia. Jangan membuat daftar.'
                ],
                [
                    'role' => 'user',
                    'content' => $webText
                ]
            ]);

            $menuService->saveDescription($menu, $summary);

            return $summary;
        }

        /**
         * =========================
         * 6️⃣ POPULAR / RECOMMENDATION
         * =========================
         */
        if (
            str_contains($lower, 'populer') ||
            str_contains($lower, 'rekomendasi') ||
            str_contains($lower, 'terlaris') ||
            str_contains($lower, 'best seller')
        ) {
            $menus = $menuService->topPopular(5);

            if ($menus->isEmpty()) {
                return "Saat ini belum ada data menu terpopuler.";
            }

            $list = $menus->map(fn ($m, $i) => ($i + 1) . ". {$m->name}")
                          ->implode("\n");

            return "Berikut 5 menu terpopuler di restoran kami:\n" . $list;
        }

        /**
         * =========================
         * 7️⃣ LIST MENU
         * =========================
         */
        if ($intent === 'list_menu' && ! $menuName) {

            session()->forget('last_menu_id');

            $menus = $menuService->listMenus();

            return $menus
                ? "Saat ini menu yang tersedia adalah: $menus."
                : "Mohon maaf, saat ini menu belum tersedia.";
        }

        /**
         * =========================
         * 🔓 8️⃣ SOFT GUARDRAIL
         * =========================
         */
        $hardAllowed = [
            'menu','makanan','minuman','harga','berapa','pesan',
            'rekomendasi','populer','terlaris','best seller',
            'tersedia','habis','stok','reservasi','booking'
        ];

        $softAllowed = [
            'halo','hai','hi','selamat','terima kasih',
            'buka','jam','alamat','lokasi','dimana',
            'enak','favorit','sarankan'
        ];

        $inHard = collect($hardAllowed)->some(fn ($k) => str_contains($lower, $k));
        $inSoft = collect($softAllowed)->some(fn ($k) => str_contains($lower, $k));

        if (! $inHard && ! $inSoft) {
            return "Saya fokus membantu seputar menu dan layanan restoran kami 🍽️";
        }

        /**
         * =========================
         * 9️⃣ FALLBACK AI (RESTO-ONLY)
         * =========================
         */
        $restaurantAi = app(RestaurantAiService::class);
        $aiService    = app(AiService::class);

        return $aiService->chat(
            $restaurantAi->buildMessages([
                [
                    'role' => 'user',
                    'text' => $message
                ]
            ])
        );
    }
}
