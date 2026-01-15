<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Menu;

class MenuSeeder extends Seeder
{
    public function run(): void
    {
        // Membuat 1000 menu acak
        Menu::factory()->count(1)->create();
    }
}
