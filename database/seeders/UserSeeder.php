<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        \App\Models\User::factory()->create([
            'name' => 'Test User',
            'email' => 'test@example.com',
            'password' => Hash::make('password123'),
        ]);

        \App\Models\User::factory()->create([
            'name' => 'Test User 2',
            'email' => 'test2@example.com',
            'password' => Hash::make('password123'),
        ]); 

        \App\Models\User::factory()->create([
            'name' => 'Test User 3',
            'email' => 'test3@example.com',
            'password' => Hash::make('password123'),
        ]);

        \App\Models\User::factory()->create([
            'name' => 'Test User 4',
            'email' => 'test4@example.com',
            'password' => Hash::make('password123'),
        ]);

        \App\Models\User::factory()->create([
            'name' => 'Test User 5',
            'email' => 'test5@example.com',
            'password' => Hash::make('password123'),
        ]);

        \App\Models\User::factory()->create([
            'name' => 'Test User 6',
            'email' => 'test6@example.com',
            'password' => Hash::make('password123'),
        ]);

        \App\Models\User::factory()->create([
            'name' => 'Test User 7',
            'email' => 'test7@example.com',
            'password' => Hash::make('password123'),
        ]);

        \App\Models\User::factory()->create([
            'name' => 'Test User 8',
            'email' => 'test8@example.com',
            'password' => Hash::make('password123'),
        ]);

        \App\Models\User::factory()->create([
            'name' => 'Test User 9',
            'email' => 'test9@example.com',
            'password' => Hash::make('password123'),
        ]);

        \App\Models\User::factory()->create([
            'name' => 'Test User 10',
            'email' => 'test10@example.com',
            'password' => Hash::make('password123'),
        ]);
            

    }
}
