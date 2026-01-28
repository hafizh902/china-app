<?php

namespace App\Services;

use App\Models\Menu;
use Illuminate\Database\Eloquent\Builder;

class MenuKnowledgeService
{
    /**
     * Ambil daftar menu (nama saja)
     */
    public function listMenus(): ?string
    {
        $menus = Menu::pluck('name');

        return $menus->isEmpty()
            ? null
            : $menus->implode(', ');
    }

    /**
     * Cari menu dari input bebas (hasil AI / user / typo)
     */
    public function find(string $menuCandidate): ?Menu
    {
        $candidate = $this->normalize($menuCandidate);

        $menus = Menu::all();

        $bestMatch = null;
        $bestScore = PHP_INT_MAX;

        foreach ($menus as $menu) {
            $dbName = $this->normalize($menu->name);

            // exact / contains
            if (
                str_contains($dbName, $candidate) ||
                str_contains($candidate, $dbName)
            ) {
                return $menu;
            }

            // levenshtein distance
            $distance = levenshtein($candidate, $dbName);

            if ($distance < $bestScore) {
                $bestScore = $distance;
                $bestMatch = $menu;
            }
        }

        // threshold ketat
        return $bestScore <= 4 ? $bestMatch : null;
    }


    /**
     * Normalisasi string (hapus spasi & simbol)
     */
    protected function normalize(string $text): string
    {
        return strtolower(
            preg_replace('/[^a-z0-9]/i', '', $text)
        );
    }

    /**
     * Ambil deskripsi AI
     */
    public function getDescription(Menu $menu): ?string
    {
        return $menu->description_ai;
    }

    /**
     * Simpan deskripsi AI
     */
    public function saveDescription(Menu $menu, string $description): void
    {
        $menu->forceFill([
            'description_ai' => $description,
        ]);

        $menu->save();

        logger()->info('FORCE SAVE DESCRIPTION', [
            'menu_id' => $menu->id,
            'description_ai' => $menu->fresh()->description_ai,
        ]);
    }

    public function topPopular(int $limit = 5)
    {
        return Menu::query()
            ->withSum('orderItems as total_sold', 'quantity')
            ->orderByDesc('total_sold')
            ->limit($limit)
            ->get();
    }
}
