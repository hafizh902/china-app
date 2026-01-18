<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class AdminUserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        \App\Models\User::firstOrCreate(
            ['email' => 'admin@china-app.com'],
            [
                'name' => 'Admin',
                'password' => bcrypt('password'),
                'role' => 'admin',
            ]
        );
        \App\Models\User::firstOrCreate(
            ['email' => 'user@china-app.com'],
            [
                'name' => 'user',
                'password' => bcrypt('password'),
                'role' => 'user',
            ]
        );
    }
}
