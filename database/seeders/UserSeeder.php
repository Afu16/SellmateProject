<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Faker\Factory as Faker;

class UserSeeder extends Seeder
{
    public function run(): void
    {
        $faker = Faker::create('id_ID');

        // Admin user
        User::create([
            'name' => 'Admin User',
            'email' => 'admin@example.com',
            'password' => Hash::make('password'),
            'role' => 'admin',
            'school' => $faker->company(),
            'major' => $faker->jobTitle(),
            'foto_link' => 'https://source.unsplash.com/random/300x300/?person',
            'phone' => substr($faker->phoneNumber(), 0, 15), // Batasi menjadi 15 karakter
            'address' => $faker->address(),
        ]);

        // Generate 99 regular users
        for ($i = 0; $i < 99; $i++) {
            User::create([
                'name' => $faker->name(),
                'email' => $faker->unique()->safeEmail(),
                'password' => Hash::make('password'),
                'role' => $faker->randomElement(['user', 'sales']),
                'school' => $faker->company(),
                'major' => $faker->jobTitle(),
                'foto_link' => 'https://source.unsplash.com/random/300x300/?person',
                'phone' => substr($faker->phoneNumber(), 0, 15), // Batasi menjadi 15 karakter
                'address' => $faker->address(),
            ]);
        }
    }
}
