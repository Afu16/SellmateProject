# Panduan Penggunaan Font Inter, Pilcrow Rounded & Quicksand

## Font yang Tersedia

### 1. Inter
Font sans-serif modern yang dirancang untuk tampilan optimal di layar. Sangat baik untuk UI/UX design dan memberikan keterbacaan yang tinggi.

**Weight yang tersedia:**
- Thin (100)
- ExtraLight (200)
- Light (300)
- Regular (400)
- Medium (500)
- SemiBold (600)
- Bold (700)
- ExtraBold (800)
- Black (900)

### 2. Pilcrow Rounded
Font dengan karakteristik rounded yang cocok untuk heading dan elemen yang membutuhkan penekanan visual.

**Weight yang tersedia:**
- Light (300)
- Regular (400)
- Medium (500)
- Semibold (600)
- Bold (700)
- Heavy (900)

### 3. Quicksand
Font sans-serif modern yang cocok untuk body text dan memberikan keterbacaan yang baik.

**Weight yang tersedia:**
- Light (300)
- Regular (400)
- Medium (500)
- Semibold (600)
- Bold (700)

## Cara Penggunaan di Tailwind CSS

### Font Family
```html
<!-- Menggunakan Inter -->
<h1 class="font-inter">Heading dengan Inter</h1>
<p class="font-inter">Body text dengan Inter</p>

<!-- Menggunakan Pilcrow Rounded -->
<h1 class="font-pilcrow">Heading dengan Pilcrow</h1>

<!-- Menggunakan Quicksand -->
<p class="font-quicksand">Body text dengan Quicksand</p>
```

### Font Weight
```html
<!-- Inter -->
<h1 class="font-inter font-inter-thin">Thin (100)</h1>
<h1 class="font-inter font-inter-extralight">ExtraLight (200)</h1>
<h1 class="font-inter font-inter-light">Light (300)</h1>
<h1 class="font-inter font-inter-regular">Regular (400)</h1>
<h1 class="font-inter font-inter-medium">Medium (500)</h1>
<h1 class="font-inter font-inter-semibold">SemiBold (600)</h1>
<h1 class="font-inter font-inter-bold">Bold (700)</h1>
<h1 class="font-inter font-inter-extrabold">ExtraBold (800)</h1>
<h1 class="font-inter font-inter-black">Black (900)</h1>

<!-- Pilcrow Rounded -->
<h1 class="font-pilcrow font-pilcrow-light">Light (300)</h1>
<h1 class="font-pilcrow font-pilcrow-regular">Regular (400)</h1>
<h1 class="font-pilcrow font-pilcrow-medium">Medium (500)</h1>
<h1 class="font-pilcrow font-pilcrow-semibold">Semibold (600)</h1>
<h1 class="font-pilcrow font-pilcrow-bold">Bold (700)</h1>
<h1 class="font-pilcrow font-pilcrow-heavy">Heavy (900)</h1>

<!-- Quicksand -->
<p class="font-quicksand font-quicksand-light">Light (300)</p>
<p class="font-quicksand font-quicksand-regular">Regular (400)</p>
<p class="font-quicksand font-quicksand-medium">Medium (500)</p>
<p class="font-quicksand font-quicksand-semibold">Semibold (600)</p>
<p class="font-quicksand font-quicksand-bold">Bold (700)</p>
```

## Contoh Kombinasi yang Disarankan

### 1. UI/UX Design dengan Inter
```html
<div class="space-y-4">
    <h1 class="text-4xl font-inter font-inter-bold text-primary">
        Judul Utama
    </h1>
    <h2 class="text-2xl font-inter font-inter-semibold text-gray-800">
        Sub Judul
    </h2>
    <p class="font-inter font-inter-regular text-gray-600 leading-relaxed">
        Body text menggunakan Inter untuk keterbacaan yang optimal di layar.
    </p>
</div>
```

### 2. Heading dengan Pilcrow, Body dengan Inter
```html
<div class="space-y-4">
    <h1 class="text-4xl font-pilcrow font-pilcrow-bold text-primary">
        Judul Utama
    </h1>
    <h2 class="text-2xl font-pilcrow font-pilcrow-semibold text-gray-800">
        Sub Judul
    </h2>
    <p class="font-inter font-inter-regular text-gray-600 leading-relaxed">
        Body text menggunakan Inter untuk UI/UX yang optimal.
    </p>
</div>
```

### 3. Card dengan Kombinasi Font
```html
<div class="bg-white p-6 rounded-lg shadow-lg">
    <h3 class="text-xl font-inter font-inter-bold text-primary mb-4">
        Judul Card
    </h3>
    <p class="font-inter font-inter-regular text-gray-700 mb-4">
        Deskripsi card menggunakan Inter untuk keterbacaan yang baik.
    </p>
    <button class="font-quicksand font-quicksand-medium bg-primary text-white px-4 py-2 rounded">
        Tombol Aksi
    </button>
</div>
```

### 4. Navigation dengan Inter
```html
<nav class="bg-white shadow">
    <div class="max-w-7xl mx-auto px-4">
        <div class="flex justify-between h-16">
            <div class="flex items-center">
                <span class="font-pilcrow font-pilcrow-bold text-primary text-xl">
                    Logo
                </span>
            </div>
            <div class="flex items-center space-x-8">
                <a href="#" class="font-inter font-inter-medium text-gray-700 hover:text-primary">
                    Beranda
                </a>
                <a href="#" class="font-inter font-inter-medium text-gray-700 hover:text-primary">
                    Tentang
                </a>
                <a href="#" class="font-inter font-inter-medium text-gray-700 hover:text-primary">
                    Kontak
                </a>
            </div>
        </div>
    </div>
</nav>
```

## Tips Penggunaan

1. **Inter untuk UI/UX**: Gunakan Inter untuk interface elements, body text, dan konten digital
2. **Pilcrow untuk Branding**: Gunakan Pilcrow untuk heading, logo, dan elemen yang membutuhkan penekanan
3. **Quicksand untuk Accent**: Gunakan Quicksand untuk subtitle, button text, dan elemen pendukung
4. **Keterbacaan**: Inter sangat baik untuk teks panjang dan konten yang membutuhkan keterbacaan tinggi
5. **Konsistensi**: Tetap konsisten dalam penggunaan font weight untuk elemen yang sama
6. **Responsivitas**: Semua font akan tetap terbaca dengan baik di berbagai ukuran layar

## Testing Font

Untuk melihat contoh penggunaan font, kunjungi:
```
http://localhost:8000/font-example          # Pilcrow & Quicksand
http://localhost:8000/font-inter-example    # Inter
```

Halaman ini akan menampilkan semua variasi font yang tersedia beserta contoh penggunaannya. 