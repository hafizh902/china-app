<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Menu;
use App\Models\Seller;

class MenuSeeder extends Seeder
{
    public function run(): void
    {
        $seller = Seller::first();

        if (! $seller) {
            throw new \RuntimeException('Seeder gagal: tidak ada seller.');
        }

        Menu::factory()
            ->count(20)
            ->create([
                'seller_id' => $seller->id,
            ]);
    }
}
