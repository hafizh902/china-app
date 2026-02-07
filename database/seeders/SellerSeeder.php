<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Seller;
use App\Models\User;
use Illuminate\Support\Str;

class SellerSeeder extends Seeder
{
    public function run(): void
    {
        $user = User::first();

        if (! $user) {
            throw new \RuntimeException('Seeder gagal: tidak ada user.');
        }

        Seller::create([
            'user_id'           => $user->id,
            'business_name'     => 'Default Restaurant',
            'slug'              => Str::slug('Default Restaurant'),
            'status'            => 'active',
            'is_verified'       => true,
            'is_open'           => true,
            'timezone'          => 'Asia/Makassar',
            'description'       => 'Seeder default seller',
            'business_email'    => 'default@restaurant.test',
            'business_phone'    => '0800000000',
            'business_address'  => 'Balikpapan',
        ]);
    }
}
