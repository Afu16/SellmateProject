<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Font Inter Example</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body class="bg-gray-100 p-8">
    <div class="max-w-4xl mx-auto">
        <h1 class="text-4xl font-inter font-inter-black text-primary mb-8">Font Inter</h1>
        
        <div class="space-y-4 mb-8">
            <h2 class="text-2xl font-inter font-inter-thin">Inter Thin (100)</h2>
            <h2 class="text-2xl font-inter font-inter-extralight">Inter ExtraLight (200)</h2>
            <h2 class="text-2xl font-inter font-inter-light">Inter Light (300)</h2>
            <h2 class="text-2xl font-inter font-inter-regular">Inter Regular (400)</h2>
            <h2 class="text-2xl font-inter font-inter-medium">Inter Medium (500)</h2>
            <h2 class="text-2xl font-inter font-inter-semibold">Inter SemiBold (600)</h2>
            <h2 class="text-2xl font-inter font-inter-bold">Inter Bold (700)</h2>
            <h2 class="text-2xl font-inter font-inter-extrabold">Inter ExtraBold (800)</h2>
            <h2 class="text-2xl font-inter font-inter-black">Inter Black (900)</h2>
        </div>

        <div class="bg-white p-6 rounded-lg shadow-lg">
            <h3 class="text-xl font-inter font-inter-bold text-primary mb-4">Contoh Penggunaan Inter</h3>
            <p class="font-inter font-inter-regular text-gray-700 leading-relaxed mb-4">
                Font Inter adalah font sans-serif yang dirancang untuk tampilan yang optimal di layar. 
                Font ini sangat baik untuk UI/UX design dan memberikan keterbacaan yang tinggi.
            </p>
            <p class="font-inter font-inter-medium text-gray-800">
                Inter cocok untuk body text, interface elements, dan berbagai jenis konten digital.
            </p>
        </div>

        <div class="mt-8 grid grid-cols-1 md:grid-cols-2 gap-6">
            <div class="bg-white p-6 rounded-lg shadow-lg">
                <h4 class="font-inter font-inter-bold text-primary mb-3">Heading dengan Inter</h4>
                <p class="font-inter font-inter-regular text-gray-600">
                    Inter memberikan tampilan yang modern dan clean untuk heading dan judul.
                </p>
            </div>
            
            <div class="bg-white p-6 rounded-lg shadow-lg">
                <h4 class="font-inter font-inter-semibold text-secondary mb-3">Body Text dengan Inter</h4>
                <p class="font-inter font-inter-regular text-gray-600">
                    Untuk body text, Inter memberikan keterbacaan yang optimal dan nyaman untuk dibaca.
                </p>
            </div>
        </div>

        <div class="mt-8 bg-white p-6 rounded-lg shadow-lg">
            <h3 class="text-xl font-inter font-inter-bold text-primary mb-4">Kombinasi Font</h3>
            <div class="space-y-4">
                <div>
                    <h4 class="font-pilcrow font-pilcrow-bold text-primary mb-2">Heading dengan Pilcrow</h4>
                    <p class="font-inter font-inter-regular text-gray-600">
                        Body text menggunakan Inter untuk keterbacaan yang optimal.
                    </p>
                </div>
                <div>
                    <h4 class="font-quicksand font-quicksand-bold text-secondary mb-2">Heading dengan Quicksand</h4>
                    <p class="font-inter font-inter-regular text-gray-600">
                        Inter sangat baik untuk body text yang panjang dan detail.
                    </p>
                </div>
            </div>
        </div>
    </div>
</body>
</html> 