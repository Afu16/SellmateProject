<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Product;
use Faker\Factory as Faker;

class ProductSeeder extends Seeder
{
    public function run(): void
    {
        $faker = Faker::create('id_ID');
        $categories = ['Elektronik', 'Fashion', 'Makanan', 'Minuman', 'Kesehatan', 'Kecantikan', 'Rumah Tangga', 'Olahraga'];

        for ($i = 0; $i < 100; $i++) {
            Product::create([
                'name' => $faker->words(3, true),
                'quantity' => $faker->numberBetween(10, 1000),
                'price' => $faker->numberBetween(10000, 10000000),
                'comission' => $faker->randomFloat(2, 1, 20), // Komisi 1% - 20%
                'product_photo' => 'https://source.unsplash.com/random/300x300/?product',
                'category' => $faker->randomElement($categories),
            ]);
        }
    }
}