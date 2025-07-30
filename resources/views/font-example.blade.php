<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Font Example - Pilcrow & Quicksand</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body class="bg-gray-100 p-8">
    <div class="max-w-4xl mx-auto">
        <h1 class="text-4xl font-pilcrow font-pilcrow-heavy text-primary mb-8">Font Pilcrow Rounded</h1>
        
        <div class="space-y-4 mb-8">
            <h2 class="text-2xl font-pilcrow font-pilcrow-light">Pilcrow Light (300)</h2>
            <h2 class="text-2xl font-pilcrow font-pilcrow-regular">Pilcrow Regular (400)</h2>
            <h2 class="text-2xl font-pilcrow font-pilcrow-medium">Pilcrow Medium (500)</h2>
            <h2 class="text-2xl font-pilcrow font-pilcrow-semibold">Pilcrow Semibold (600)</h2>
            <h2 class="text-2xl font-pilcrow font-pilcrow-bold">Pilcrow Bold (700)</h2>
            <h2 class="text-2xl font-pilcrow font-pilcrow-heavy">Pilcrow Heavy (900)</h2>
        </div>

        <h1 class="text-4xl font-quicksand font-quicksand-bold text-secondary mb-8">Font Quicksand</h1>
        
        <div class="space-y-4 mb-8">
            <h2 class="text-2xl font-quicksand font-quicksand-light">Quicksand Light (300)</h2>
            <h2 class="text-2xl font-quicksand font-quicksand-regular">Quicksand Regular (400)</h2>
            <h2 class="text-2xl font-quicksand font-quicksand-medium">Quicksand Medium (500)</h2>
            <h2 class="text-2xl font-quicksand font-quicksand-semibold">Quicksand Semibold (600)</h2>
            <h2 class="text-2xl font-quicksand font-quicksand-bold">Quicksand Bold (700)</h2>
        </div>

        <div class="bg-white p-6 rounded-lg shadow-lg">
            <h3 class="text-xl font-pilcrow font-pilcrow-bold text-primary mb-4">Contoh Penggunaan</h3>
            <p class="font-quicksand font-quicksand-regular text-gray-700 leading-relaxed">
                Ini adalah contoh penggunaan font Quicksand untuk body text. Font ini memberikan keterbacaan yang baik 
                dan nyaman untuk dibaca dalam waktu yang lama.
            </p>
            <p class="font-pilcrow font-pilcrow-medium text-gray-800 mt-4">
                Sedangkan font Pilcrow Rounded cocok untuk heading dan elemen yang membutuhkan penekanan visual.
            </p>
        </div>

        <div class="mt-8 grid grid-cols-1 md:grid-cols-2 gap-6">
            <div class="bg-white p-6 rounded-lg shadow-lg">
                <h4 class="font-pilcrow font-pilcrow-bold text-primary mb-3">Heading dengan Pilcrow</h4>
                <p class="font-quicksand font-quicksand-regular text-gray-600">
                    Kombinasi font Pilcrow untuk heading dan Quicksand untuk body text memberikan hierarki visual yang jelas.
                </p>
            </div>
            
            <div class="bg-white p-6 rounded-lg shadow-lg">
                <h4 class="font-quicksand font-quicksand-bold text-secondary mb-3">Heading dengan Quicksand</h4>
                <p class="font-quicksand font-quicksand-regular text-gray-600">
                    Quicksand juga bisa digunakan untuk heading jika ingin tampilan yang lebih modern dan clean.
                </p>
            </div>
        </div>
    </div>
</body>
</html> 