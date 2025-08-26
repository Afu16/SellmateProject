<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Note</title>
    @vite('resources/js/app.js', 'resources/css/app.css')
    <style>
        /* Custom styles untuk date input */
        input[type="date"]::-webkit-calendar-picker-indicator {
            background: transparent;
            bottom: 0;
            color: transparent;
            cursor: pointer;
            height: auto;
            left: 0;
            position: absolute;
            right: 0;
            top: 0;
            width: auto;
        }
        
        input[type="date"]::-webkit-datetime-edit {
            color: #000;
        }
        
        input[type="date"]::-webkit-datetime-edit-fields-wrapper {
            color: #000;
        }
        
        input[type="date"]::-webkit-datetime-edit-text {
            color: #000;
        }
        
        input[type="date"]::-webkit-datetime-edit-month-field {
            color: #000;
        }
        
        input[type="date"]::-webkit-datetime-edit-day-field {
            color: #000;
        }
        
        input[type="date"]::-webkit-datetime-edit-year-field {
            color: #000;
        }
    </style>
</head>
<body>
<div class="p-6">

    <!-- Tombol kembali -->
    <div class="flex items-center">
            <a href="{{ url('/products') }}" class="mr-4">
           <img class="w-8 h-8" src="{{ asset('assets/svg/arrow-icon.svg') }}" alt="arrow">
            </a>
            <h1 class=" text-2xl font-bold text-black">Simpan dan Catat Omzetmu</h1>
        </div>

    <!-- Judul -->
    <img src="{{ asset('assets/img/note-img.png') }}" alt="note" class="mt-5 mx-auto w-80">

    <!-- Form -->
    <form action="{{ route('note.store') }}" method="post" class="mt-5">
        @csrf
        <input type="hidden" name="product_id" value="{{ $product->id }}">

        <input type="hidden" name="quantity" id="quantityInput" value="1">
        <input type="hidden" name="total_omzets" id="totalOmzetInput" value="{{ $product->price }}">

        <div class="p-5 rounded-xl mb-5 border-2 border-black shadow-black">
            <div class="flex flex-row gap-2">
                <!-- Input Nama Produk -->
                <div class="w-1/2 mb-4">
                    <label class="block text-black font-pilcrow font-pilcrow-bold text-sm mb-2">Nama Jasa/Produk</label>
                    <input type="text" value="{{ $product->name }}" readonly
                           class="w-full mb-2 px-3 py-2 border text-xs border-black rounded-lg bg-gray-100">

                    <!-- Jumlah Produk -->
                    <label class="block text-black font-pilcrow font-pilcrow-bold text-sm mb-2">Jumlah Produk</label>
                    <div class="flex items-center">
                        <button type="button" onclick="decrementQuantity()" 
                                class="w-10 h-9 border border-black rounded-l-lg flex items-center justify-center bg-white hover:bg-gray-50">-</button>
                        <div class="w-16 h-9 border-t border-b border-black flex items-center justify-center bg-white">
                            <span id="quantity" class="text-black font-pilcrow font-pilcrow-bold text-xs">1</span>
                        </div>
                        <button type="button" onclick="incrementQuantity()" 
                                class="w-10 h-9 border border-black rounded-r-lg flex items-center justify-center bg-white hover:bg-gray-50">+</button>
                    </div>
                </div>

                <!-- Gambar Produk -->
                <div class="mx-auto my-auto">
                    <img  class="border-2 h-40 object-cover border-gray-300 rounded-xl" 
                         src="{{ asset('assets/img/' . $product->product_photo) }}" 
                         alt="{{ $product->name }}">
                </div>
            </div>

            <!-- Total Omzet -->
            <div class="mb-4">
                <label class="block text-black font-pilcrow font-pilcrow-bold text-sm mb-2">Total Omzet</label>
                <input type="text" id="totalOmzet" readonly
                    class="w-full text-xs px-3 py-2 border border-black rounded-lg bg-gray-100">
            </div>

            <!-- Hari / Tanggal -->
            <div class="mb-6">
                <label class="block text-black font-pilcrow font-pilcrow-bold text-sm mb-2">Hari / Tanggal</label>
                <div class="relative">
                    <input type="date" id="dateInput" name="date"
                        value="{{ old('date', now()->format('Y-m-d')) }}"
                        class="w-full px-3 py-2 pr-10 border text-xs border-black rounded-lg bg-gray-100 focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-transparent">
                    <div class="absolute inset-y-0 right-0 flex items-center pr-3 pointer-events-none">
                        <svg class="w-5 h-5 text-black" fill="none" stroke="currentColor" viewBox="0 0 24 24"
                            xmlns="http://www.w3.org/2000/svg">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z"></path>
                        </svg>
                    </div>
                </div>
            </div>


            <!-- Tombol Aksi -->
            <div class=" flex gap-3">
                <a href="{{ url('/products') }}" 
                   class="flex-1 py-2 px-4 shadow-black border border-black rounded-xl font-pilcrow font-pilcrow-bold bg-white text-black text-center">Batal</a>
                <button type="submit" 
                        class="flex-1 py-2 px-4 shadow-black bg-secondary rounded-xl font-pilcrow font-pilcrow-bold text-black">Simpan</button>
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
    document.addEventListener('DOMContentLoaded', function() {
        updateTotal();
        initializeDatePicker();
    });

    // Fungsi untuk inisialisasi date picker
    function initializeDatePicker() {
        const dateInput = document.getElementById('dateInput');
        const formattedDateInput = document.getElementById('formattedDate');
        
        // Format tanggal saat halaman dimuat
        formatDateDisplay();
        
        // Event listener untuk perubahan tanggal
        dateInput.addEventListener('change', formatDateDisplay);
        
        function formatDateDisplay() {
            const selectedDate = new Date(dateInput.value);
            if (!isNaN(selectedDate.getTime())) {
                const day = selectedDate.getDate().toString().padStart(2, '0');
                const month = selectedDate.toLocaleDateString('id-ID', { month: 'short' });
                const year = selectedDate.getFullYear();
                const formattedDate = `${day} ${month} ${year}`;
                formattedDateInput.value = formattedDate;
            }
        }
    }
</script>
</body>
</html>
