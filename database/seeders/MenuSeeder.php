<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Menu;

class MenuSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
   public function run()
{
    Menu::insert([
        ['name' => 'Beef Noodles', 'category' => 'noodles', 'price' => 25000, 'is_available' => true],
        ['name' => 'Pork Dumplings', 'category' => 'dumplings', 'price' => 18000, 'is_available' => true],
        // tambahkan lainnya...
    ]);
}
}
