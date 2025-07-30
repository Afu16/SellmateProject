<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Note</title>
    @vite('resources/js/app.js', 'resources/css/app.css')
</head>
<body>
    <div class="p-6">

        <a class="mr-4 mb-10" href="{{ url('/user') }}">
            <img class="w-8 h-8" src="{{ asset('assets/svg/arrow-icon.svg') }}" alt="arrow">
        </a>

        <h1 class="text-2xl font-inter font-inter-bold text-black">Simpan dan Catat Omzetmu </h1>
        <img src="{{ asset('assets/img/note-img.png') }}" alt="note" class="mt-5 mx-auto w-80">

        <form action="" method="post" class="mt-5">
            <div class="p-5 rounded-xl mb-5 border-2 border-black shadow-black">
                <div class="flex flex-row">
                    <div class="w-1/2 mb-4">
                <label class="block text-black font-inter font-inter-bold text-sm mb-2">Nama Jasa/Produk</label>
                <input type="text" value="Rp 250.000" class="w-full mb-2 px-3 py-2 border border-black rounded-lg font-inter font-inter-regular text-black bg-white">
                <!-- Jumlah Produk -->
                <div class="">
                    <label class="block text-black font-inter font-inter-bold text-sm mb-2">Jumlah Produk</label>
                    <div class="flex items-center">
                        <button onclick="decrementQuantity()" class="w-10 h-10 border border-black rounded-l-lg flex items-center justify-center bg-white hover:bg-gray-50">
                            <span class="text-black font-inter font-inter-bold">-</span>
                        </button>
                        <div class="w-16 h-10 border-t border-b border-black flex items-center justify-center bg-white">
                            <span id="quantity" class="text-black font-inter font-inter-bold text-sm">1</span>
                        </div>
                        <button onclick="incrementQuantity()" class="w-10 h-10 border border-black rounded-r-lg flex items-center justify-center bg-white hover:bg-gray-50">
                            <span class="text-black font-inter font-inter-bold">+</span>
                        </button>
                    </div>
                </div>
            </div>
            <div class="mx-auto">
                <img width="123" class="border-2 border-black rounded-xl" src="{{ asset('assets/img/example-img.jpg') }}" alt="owl">
            </div>
        </div>


                <!-- Total Omset -->
                <div class="mb-4">
                    <label class="block text-black font-inter font-inter-bold text-sm mb-2">Total Omset</label>
                    <input type="text" value="Rp 250.000" class="w-full px-3 py-2 border border-black rounded-lg font-inter font-inter-regular text-black bg-white">
                </div>
                
                <!-- Hari / Tanggal -->
                <div class="mb-6">
                    <label class="block text-black font-inter font-inter-bold text-sm mb-2">Hari / Tanggal</label>
                    <div class="relative">
                        <input type="text" value="27 Feb 2025" class="w-full px-3 py-2 border border-black rounded-lg font-inter font-inter-regular text-black bg-white pr-10">
                        <div class="absolute right-3 top-1/2 transform -translate-y-1/2">
                            <svg class="w-5 h-5 text-black" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z"></path>
                            </svg>
                        </div>
                    </div>
                </div>
            </div>

                <!-- Action Buttons -->
                <div class="p-5 flex gap-3">
                    <button class="shadow-black flex-1 py-4 px-4 border border-black rounded-xl bg-white text-black font-inter font-inter-bold text-sm hover:bg-gray-50">
                        Batal
                    </button>
                    <button class="shadow-black flex-1 py-4 px-4 bg-tertiary rounded-xl text-black font-inter font-inter-bold text-sm hover:bg-secondary">
                        Simpan
                    </button>
                </div>
            </div>
            </div>

</form>

    <script>
        let quantity = 1;

        function incrementQuantity() {
            quantity++;
            document.getElementById('quantity').textContent = quantity;
        }

        function decrementQuantity() {
            if (quantity > 1) {
                quantity--;
                document.getElementById('quantity').textContent = quantity;
            }
        }
    </script>
</body>
</html>