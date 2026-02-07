<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Table;
use App\Models\Seller;

class TableSeeder extends Seeder
{
    public function run(): void
    {
        $seller = Seller::first();

        if (! $seller) {
            throw new \RuntimeException('Seeder gagal: tidak ada data seller.');
        }

        foreach (range(1, 18) as $i) {
            Table::updateOrCreate(
                [
                    'number' => str_pad($i, 2, '0', STR_PAD_LEFT),
                    'seller_id' => $seller->id, // WAJIB di key
                ],
                [
                    'capacity' => $i <= 6 ? 8 : 4,
                    'position' => $i <= 6 ? 'vip' : 'indoor',
                ]
            );
        }
    }
}
