<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Produk Unggulan Tefa</title>
    <script src="https://cdn.tailwindcss.com"></script>
    @vite('resources/js/app.js', 'resources/css/app.css')
</head>
<body class="bg-white">
    <div class="p-6">
        <!-- Header -->
        <div class="flex items-center mb-6">
            <button class="mr-4">
           <a href="{{ url('/user') }}">
           <img class="w-8 h-8" src="{{ asset('assets/svg/arrow-icon.svg') }}" alt="arrow">
           </a>
            </button>
            <h1 class="text-2xl font-inter font-inter-bold text-black">Produk Unggulan Tefa</h1>
        </div>

        <!-- Product Grid -->
        <div class="grid grid-cols-2 gap-4">
            <!-- Cake Card -->
            <div class="bg-primary shadow-black rounded-2xl border border-black overflow-hidden">
                <div class="aspect-square bg-gray-200 rounded-t-2xl flex items-center justify-center">
                    <div class="w-full h-full bg-gradient-to-br from-pink-200 to-pink-300 rounded-t-2xl flex items-center justify-center">
                       <img src="{{ asset('assets/img/example-img.jpg') }}" alt="example">
                    </div>
                </div>
                <div class="p-4 mt-3">
                    <h3 class="text-lg font-pilcrow font-pilcrow-bold text-white mb-1">Cake</h3>
                    <p class="text-sm font-quicksand font-quicksand-regular text-white mb-2">Rp 250.000</p>
                    <p class="text-xs font-quicksand font-quicksand-regular text-white mb-3">Produk</p>
                    <button class="w-full bg-[#DD661D] text-white py-2 px-4 rounded-lg font-quicksand font-quicksand-medium text-sm">
                        Tambah
                    </button>
                </div>
            </div>

            <!-- SkinCare Card -->
            <div class="bg-primary shadow-black rounded-2xl border border-black overflow-hidden">
                <div class="aspect-square bg-gray-200 rounded-t-2xl flex items-center justify-center">
                    <div class="w-full h-full bg-gradient-to-br from-blue-200 to-blue-300 rounded-t-2xl flex items-center justify-center">
                        <img src="{{ asset('assets/img/example-img.jpg') }}" alt="example">
                    </div>
                </div>
                <div class="p-4 mt-3">
                    <h3 class="text-lg font-pilcrow font-pilcrow-bold text-white mb-1">SkinCare</h3>
                    <p class="text-sm font-quicksand font-quicksand-regular text-white mb-2">Rp 650.000</p>
                    <p class="text-xs font-quicksand font-quicksand-regular text-white mb-3">Produk</p>
                    <button class="w-full bg-[#DD661D] text-white py-2 px-4 rounded-lg font-quicksand font-quicksand-medium text-sm">
                        Tambah
                    </button>
                </div>
            </div>

            <!-- Kaos Crop Card -->
            <div class="bg-primary shadow-black rounded-2xl border border-black overflow-hidden">
                <div class="aspect-square bg-gray-200 rounded-t-2xl flex items-center justify-center">
                    <div class="w-full h-full bg-gradient-to-br from-gray-200 to-gray-300 rounded-t-2xl flex items-center justify-center">
                       <img src="{{ asset('assets/img/example-img.jpg') }}" alt="example">
                    </div>
                </div>
                <div class="p-4 mt-3">
                    <h3 class="text-lg font-pilcrow font-pilcrow-bold text-white mb-1">Kaos Crop</h3>
                    <p class="text-sm font-quicksand font-quicksand-regular text-white mb-2">Rp 150.000</p>
                    <p class="text-xs font-quicksand font-quicksand-regular text-white mb-3">Produk</p>
                    <button class="w-full bg-[#DD661D] text-white py-2 px-4 rounded-lg font-quicksand font-quicksand-medium text-sm">
                        Tambah
                    </button>
                </div>
            </div>

            <!-- Jasa Video Card -->
            <div class="bg-primary shadow-black rounded-2xl border border-black overflow-hidden">
                <div class="aspect-square bg-gray-200 rounded-t-2xl flex items-center justify-center">
                    <div class="w-full h-full bg-gradient-to-br from-purple-200 to-purple-300 rounded-t-2xl flex items-center justify-center">
                       <img src="{{ asset('assets/img/example-img.jpg') }}" alt="example">
                    </div>
                </div>
                <div class="p-4 mt-3">
                    <h3 class="text-lg font-pilcrow font-pilcrow-bold text-white mb-1">Jasa Video</h3>
                    <p class="text-sm font-quicksand font-quicksand-regular text-white mb-2">Rp 350.000</p>
                    <p class="text-xs font-quicksand font-quicksand-regular text-white mb-3">Produk</p>
                    <button class="w-full bg-[#DD661D] text-white py-2 px-4 rounded-lg font-quicksand font-quicksand-medium text-sm">
                        Tambah
                    </button>
                </div>
            </div>
        </div>
    </div>
</body>
</html>
