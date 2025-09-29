<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\User;

class FillUserMajorSeeder extends Seeder
{
    public function run(): void
    {
        $majors = [
            'IPA', 'IPS', 'Bahasa',
            'Teknik Informatika', 'Sistem Informasi',
            'TKJ', 'RPL', 'Akuntansi',
            'Desain Grafis', 'Multimedia'
        ];

        // Update hanya user yang major masih kosong
        User::whereNull('major')->orWhere('major', '')
            ->chunk(50, function ($users) use ($majors) {
                foreach ($users as $user) {
                    $user->major = $majors[array_rand($majors)];
                    $user->save();
                }
            });
    }
}
