<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Menu>
 */
class MenuFactory extends Factory
{
    protected $model = \App\Models\Menu::class;

    public function definition(): array
    {
        $categories = ['noodles', 'dumplings', 'rice', 'drinks', 'dessert'];

        return [
            'name' => $this->faker->words(1, true), // nama menu
            'description' => $this->faker->paragraph(2), // deskripsi menu
            'category' => $this->faker->randomElement($categories), // kategori acak
            'price' => $this->faker->numberBetween(10000, 50000), // harga acak
            'image' => $this->faker->imageUrl(640, 480, 'food', true), // gambar placeholder
            'prep_time_minutes' => $this->faker->numberBetween(5, 60), // waktu persiapan
            'is_available' => $this->faker->boolean(90), // 90% kemungkinan tersedia
        ];
    }
}
