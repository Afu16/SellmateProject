<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Omzet;
use App\Models\User;
use App\Models\Product;
use Faker\Factory as Faker;
use Carbon\Carbon;

class OmzetSeeder extends Seeder
{
    public function run(): void
    {
        $faker = Faker::create('id_ID');
        
        // Dapatkan semua ID user dengan role sales
        $salesUserIds = User::where('role', 'sales')->pluck('id')->toArray();
        if (empty($salesUserIds)) {
            $salesUserIds = User::pluck('id')->toArray(); // Jika tidak ada sales, gunakan semua user
        }
        
        // Dapatkan semua ID produk
        $productIds = Product::pluck('id')->toArray();
        
        // Buat 100 data omzet
        for ($i = 0; $i < 100; $i++) {
            $userId = $faker->randomElement($salesUserIds);
            $productId = $faker->randomElement($productIds);
            $product = Product::find($productId);
            $quantity = $faker->numberBetween(1, 10);
            
            // Hitung total omzet berdasarkan harga produk, jumlah, dan komisi
            $totalOmzet = $product->price * $quantity * ($product->comission / 100);
            
            Omzet::create([
                'user_id' => $userId,
                'product_id' => $productId,
                'quantity' => $quantity,
                'total_omzets' => $totalOmzet,
                'date' => $faker->dateTimeBetween('-6 months', 'now')->format('Y-m-d'),
            ]);
        }
    }
}