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

                <div class="grid grid-cols-2 gap-4">
            @foreach($products as $product)
                <div class="bg-primary shadow-black rounded-2xl border border-black overflow-hidden">
                    <div class="aspect-square bg-gray-200 rounded-t-2xl flex items-center justify-center">
                        <div class="w-full h-full bg-gradient-to-br from-purple-200 to-purple-300 rounded-t-2xl flex items-center justify-center">
                            <img src="{{ asset('assets/img/' . $product->product_photo) }}" alt="{{ $product->name }}">
                        </div>
                    </div>
                    <div class="p-4 mt-3">
                        <h3 class="text-lg font-pilcrow font-pilcrow-bold text-white mb-1">{{ $product->name }}</h3>
                        <p class="text-sm font-pilcrow font-pilcrow-regular text-white mb-2">Rp {{ number_format($product->price, 0, ',', '.') }}</p>
                        <p class="text-xs font-pilcrow font-pilcrow-regular text-white mb-3">{{ $product->category }}</p>
                        <button     
                            onclick="window.location.href='{{ route('note', ['product' => $product->id]) }}'" 
                            class="w-full bg-[#DD661D] text-white py-2 px-4 rounded-lg font-pilcrow font-pilcrow-bold text-sm">
                            Tambah
                        </button>
                    </div>
                </div>
            @endforeach
        </div>
            
    </div>
</body>
</html>
