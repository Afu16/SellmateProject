<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Note</title>
    @vite('resources/js/app.js', 'resources/css/app.css')
</head>
<body>
<div class="p-6">

    <!-- Tombol kembali -->
    <a class="mr-4 mb-10" href="{{ url('/products') }}">
        <img class="w-8 h-8" src="{{ asset('assets/svg/arrow-icon.svg') }}" alt="arrow">
    </a>

    <!-- Judul -->
    <h1 class="text-2xl font-pilcrow font-pilcrow-bold text-black">Simpan dan Catat Omzetmu</h1>
    <img src="{{ asset('assets/img/note-img.png') }}" alt="note" class="mt-5 mx-auto w-80">

    <!-- Form -->
    <form action="{{ route('note.store') }}" method="post" class="mt-5">
        @csrf
        <input type="hidden" name="product_id" value="{{ $product->id }}">

        <input type="hidden" name="quantity" id="quantityInput" value="1">
        <input type="hidden" name="total_omzets" id="totalOmzetInput" value="{{ $product->price }}">

        <div class="p-5 rounded-xl mb-5 border-2 border-black shadow-black">
            <div class="flex flex-row">
                <!-- Input Nama Produk -->
                <div class="w-1/2 mb-4">
                    <label class="block text-black font-pilcrow font-pilcrow-bold text-sm mb-2">Nama Jasa/Produk</label>
                    <input type="text" value="{{ $product->name }}" readonly
                           class="w-full mb-2 px-3 py-2 border border-black rounded-lg bg-gray-100">

                    <!-- Jumlah Produk -->
                    <label class="block text-black font-pilcrow font-pilcrow-bold text-sm mb-2">Jumlah Produk</label>
                    <div class="flex items-center">
                        <button type="button" onclick="decrementQuantity()" 
                                class="w-10 h-10 border border-black rounded-l-lg flex items-center justify-center bg-white hover:bg-gray-50">-</button>
                        <div class="w-16 h-10 border-t border-b border-black flex items-center justify-center bg-white">
                            <span id="quantity" class="text-black font-pilcrow font-pilcrow-bold text-sm">1</span>
                        </div>
                        <button type="button" onclick="incrementQuantity()" 
                                class="w-10 h-10 border border-black rounded-r-lg flex items-center justify-center bg-white hover:bg-gray-50">+</button>
                    </div>
                </div>

                <!-- Gambar Produk -->
                <div class="mx-auto">
                    <img width="123" class="border-2 border-black rounded-xl" 
                         src="{{ asset('assets/img/' . $product->product_photo) }}" 
                         alt="{{ $product->name }}">
                </div>
            </div>

            <!-- Total Omzet -->
            <div class="mb-4">
                <label class="block text-black font-pilcrow font-pilcrow-bold text-sm mb-2">Total Omzet</label>
                <input type="text" id="totalOmzet" readonly
                    class="w-full px-3 py-2 border border-black rounded-lg bg-gray-100">
            </div>

            <!-- Hari / Tanggal -->
            <div class="mb-6">
                <label class="block text-black font-pilcrow font-pilcrow-bold text-sm mb-2">Hari / Tanggal</label>
                <input type="text" value="{{ now()->format('d M Y') }}"
                       class="w-full px-3 py-2 border border-black rounded-lg bg-gray-100">
            </div>

            <!-- Tombol Aksi -->
            <div class="p-5 flex gap-3">
                <a href="{{ url('/products') }}" 
                   class="flex-1 py-4 px-4 border border-black rounded-xl bg-white text-black text-center">Batal</a>
                <button type="submit" 
                        class="flex-1 py-4 px-4 bg-secondary rounded-xl text-black">Simpan</button>
            </div>
        </div>
    </form>
</div>

<script>
    let quantity = 1;
    let price = {{ $product->price }}; // harga asli dari Laravel

    function updateTotal() {
        let total = price * quantity;
        document.getElementById('totalOmzet').value = 
            "Rp " + total.toLocaleString('id-ID');

    document.getElementById('quantityInput').value = quantity;
    document.getElementById('totalOmzetInput').value = total;
    }

    function incrementQuantity() {
        quantity++;
        document.getElementById('quantity').textContent = quantity;
        updateTotal();
    }

    function decrementQuantity() {
        if (quantity > 1) {
            quantity--;
            document.getElementById('quantity').textContent = quantity;
            updateTotal();
        }
    }

    // Hitung total saat pertama kali load
    document.addEventListener('DOMContentLoaded', updateTotal);
</script>
</body>
</html>
