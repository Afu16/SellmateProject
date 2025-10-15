<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Video;
use App\Models\User;

class VideoSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // ambil user admin yang udah ada
        $admin = \App\Models\User::where('email', 'admin@example.com')->first();

        if (!$admin) {
            $this->command->warn('⚠️ User admin@example.com tidak ditemukan. Pastikan user-nya sudah ada sebelum seeding.');
            return;
        }

        $videos = [
            [
                'user_id' => $admin->id,
                'category' => 'Inspirasi',
                'title' => 'Bagaimana Cara Menjadi Developer Hebat',
                'slug' => 'bagaimana-cara-menjadi-developer-hebat',
                'description' => 'Video inspiratif tentang perjalanan menjadi developer sukses di era digital.',
                'link' => 'https://www.youtube.com/watch?v=N-Np8tcHhkQ',
                'thumbnail' => 'https://img.youtube.com/vi/N-Np8tcHhkQ/hqdefault.jpg',
                'duration' => '10:24',
                'published_at' => now(),
            ],
            [
                'user_id' => $admin->id,
                'category' => 'Tips',
                'title' => 'Strategi Menawarkan Jasa Developer Freelance',
                'slug' => 'strategi-menawarkan-jasa-developer-freelance',
                'description' => 'Tips praktis bagi kamu yang ingin memasarkan jasa developer dengan efektif.',
                'link' => 'https://www.youtube.com/watch?v=N-Np8tcHhkQ',
                'thumbnail' => 'https://img.youtube.com/vi/N-Np8tcHhkQ/hqdefault.jpg',
                'duration' => '08:15',
                'published_at' => now(),
            ],
        ];

        foreach ($videos as $video) {
            Video::create($video);
        }
    }
}
