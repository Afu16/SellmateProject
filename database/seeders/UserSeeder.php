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

        $users = [];

        // generate 10 user dummy
        foreach (range(1, 100) as $index) {
            $users[] = [
                'name' => $faker->name(),
                'email' => $faker->unique()->safeEmail(),
                'password' => Hash::make('password'), // default password
            ];
        }

        foreach ($users as $user) {
            User::create($user);
        }
    }
}
