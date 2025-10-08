<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Produk Unggulan Tefa</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <style>
        @import url('https://fonts.googleapis.com/css2?family=Poppins:wght@400;500;600;700&display=swap');
        body {
            font-family: 'Poppins', sans-serif;
        }
    </style>
    @vite('resources/js/app.js', 'resources/css/app.css')
</head>
<body class="bg-white">
    <div id="mobile-product" class="p-6 md:hidden">
        <!-- Header -->
        <div class="flex items-center mb-6">
            <button class="mr-4">
                <a href="{{ url('/dashboard') }}">
                    <img class="w-8 h-8" src="{{ asset('assets/svg/arrow-icon.svg') }}" alt="arrow">
                </a>
            </button>
            <h1 class="text-2xl font-inter font-inter-bold text-black text-nowrap select-none">Produk Unggulan Tefa</h1>
        </div>

        <!-- Product Grid -->
        <div class="grid grid-cols-1 gap-4">
            @foreach($products as $product)
                <div class="bg-primary shadow-black border-2 border-black rounded-2xl overflow-hidden">
                    <!-- Product Image -->
                    <div class=" rounded-xl flex items-center justify-center p-2">
                        <img 
                            src="{{ asset('assets/img/' . $product->product_photo) }}" 
                            alt="{{ $product->name }}"
                            class="w-full h-44 object-cover rounded-xl"
                        >
                    </div>
                    
                    <!-- Product Details -->
                    <div class="p-4 flex">
                        <div class="w-full">
                            <h3 class="text-xl font-pilcrow font-pilcrow-bold text-white mb-2">{{ $product->name }}</h3>
                            <p class="text-md font-pilcrow font-pilcrow-regular text-white mb-1">Rp {{ number_format($product->price, 0, ',', '.') }}</p>
                            <p class="text-xs font-pilcrow font-pilcrow-regular text-white">Produk</p>
                            
                            <!-- Add Button -->
                            <button     
                            onclick="window.location.href='{{ route('note', ['product' => $product->id]) }}'" 
                            class=" h-10 mt-2  bg-secondary shadow-black border-2 border-black text-black py-1 w-full items-center rounded-full font-pilcrow font-pilcrow-bold text-sm hover:bg-[#C55A1A] transition-colors">
                            Tambah
                        </button>
                    </div>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
</body>
</html>
