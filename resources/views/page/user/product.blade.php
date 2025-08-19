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
            @foreach($products as $product)
                <div class="bg-primary shadow-black border-2 border-black rounded-2xl overflow-hidden">
                    <!-- Product Image -->
                    <div class=" rounded-xl flex items-center justify-center p-2">
                        <img 
                            src="{{ asset('assets/img/' . $product->product_photo) }}" 
                            alt="{{ $product->name }}"
                            class="w-full h-full object-cover rounded-xl"
                        >
                    </div>
                    
                    <!-- Product Details -->
                    <div class="p-4">
                        <h3 class="text-md font-pilcrow font-pilcrow-bold text-white mb-2">{{ $product->name }}</h3>
                        <p class="text-xs font-pilcrow font-pilcrow-regular text-white mb-1">Rp {{ number_format($product->price, 0, ',', '.') }}</p>
                        <p class="text-xs font-pilcrow font-pilcrow-regular text-white mb-4">Produk</p>
                        
                        <!-- Add Button -->
                        <button     
                            onclick="window.location.href='{{ route('note', ['product' => $product->id]) }}'" 
                            class="w-full bg-secondary shadow-black border-2 border-black text-white py-3 px-4 rounded-xl font-pilcrow font-pilcrow-bold text-sm hover:bg-[#C55A1A] transition-colors">
                            Tambah
                        </button>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
</body>
</html>
