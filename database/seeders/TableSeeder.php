<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class TableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
   public function run(): void {
    foreach (range(1, 18) as $i) {
        \App\Models\Table::updateOrCreate([
            'number' => str_pad($i, 2, '0', STR_PAD_LEFT),
        ], [
            'capacity' => $i <= 6 ? 8 : 4,
            'position' => $i <= 6 ? 'vip' : 'indoor',
        ]);
    }
}
}
