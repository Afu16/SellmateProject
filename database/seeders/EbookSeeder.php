<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Ebook;
use Illuminate\Support\Str;

class EbookSeeder extends Seeder
{
    public function run(): void
    {
        $ebooks = [
            [
                'title' => 'Revolusi Pembelajaran Menuju Masa Depan',
                'description' => 'Belajar AI, teknologi, dan masa depan pendidikan.',
                'kategori' => 'Inspirasi',
            ],
            [
                'title' => 'Edukasi Digital Marketing untuk Masyarakat',
                'description' => 'Dasar digital marketing untuk UMKM.',
                'kategori' => 'Edukasi',
            ],
            [
                'title' => 'Tips Menjadi Content Creator',
                'description' => 'Langkah awal menjadi content creator sukses.',
                'kategori' => 'Tips',
            ],
        ];

        foreach ($ebooks as $ebook) {
            Ebook::create([
                'title' => $ebook['title'],
                'slug' => Str::slug($ebook['title']),
                'description' => $ebook['description'],
                'thumbnail' => 'assets/img/example-img.jpg', // pakai gambar dummy
                'kategori' => $ebook['kategori'],
                'file_url' => '#', // bisa isi link PDF dummy
            ]);
        }
    }
}
