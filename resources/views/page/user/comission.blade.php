<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Riwayat Komisi</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body class="bg-white p-6">
    <!-- Header -->
    <div class="flex items-center mb-6">
        <a href="{{ url('/dashboard') }}" class="mr-4">
            <img class="w-8 h-8" src="{{ asset('assets/svg/arrow-icon.svg') }}" alt="arrow">
        </a>
        <h1 class="text-2xl font-pilcrow font-pilcrow-semibold text-black text-nowrap select-none">Riwayat Komisi</h1>
    </div>

{{-- Dropdown Left --}}
    <div id="userDropdownL" class="fixed z-50 bottom-16 text-xs left-0 bg-white w-48 rounded-lg hidden shadow-lg border-2 border-primary">
        <div class="py-1">
            <h1 href="#" class="block px-4 py-2 text-sm font-pilcrow font-pilcrow-medium hover:bg-gray-100">Semua Produk</h1>
            <input type="date" name="" id="" class="rounded-xl ml-2 px-4 py-2 text-sm font-pilcrow font-pilcrow-medium">
        </div>
    </div>

    {{-- Dropdown Right --}}
    <div id="userDropdownR" class="fixed z-50 bottom-16 right-0 bg-white w-48 rounded-lg hidden shadow-lg border-2 border-primary">
         <div class="py-1">
             @php
                 $currentMonth = now();
                 $months = [];
                 for ($i = 0; $i < 12; $i++) {
                     $month = now()->subMonths($i);
                     $months[] = [
                         'name' => $month->format('F Y'),
                         'value' => $month->format('Y-m')
                     ];
                 }
             @endphp
             
             @foreach($months as $month)
                 <a href="#" data-value="{{ $month['value'] }}" class="month-option block px-4 py-2 text-sm font-pilcrow font-pilcrow-medium hover:bg-gray-100 border-b border-gray-200">{{ $month['name'] }}</a>
             @endforeach
         </div>
     </div>

    <div class="fixed overflow-hidden -ml-6 px-6 w-full h-16 bg-primary-300 bottom-0 z-10">
        <div class="flex flex-row mt-4">
            <div class="w-1/2 text-xs relative">
                <button id="userDropdownBtnL" class="bg-white w-full h-7 rounded-l-full border-2 border-primary font-pilcrow font-pilcrow-medium">
                    Semua Produk
                </button>
            </div>
            <div class="bg-primary opacity-100 w-16"></div>
            <div class="w-1/2 text-xs relative">
               <button id="userDropdownBtnR" class="bg-white w-full h-7 rounded-r-full border-2 border-primary font-pilcrow font-pilcrow-medium">
                    {{ date('F Y') }}
               </button>
            </div>
        </div>
    </div>


    <!-- Total Komisi Section -->
    <div class="bg-primary rounded-lg p-6 shadow-black border-2 border-black mb-6">
        <div class="text-white">
            <p class="text-sm font-pilcrow font-pilcrow-semibold mb-2 text-nowrap select-none">Total Komisi</p>
            <p class="text-3xl font-quicksand font-quicksand-regular">
                Rp {{ number_format($totalKomisi, 0, ',', '.') }}
            </p>
        </div>
    </div>

    <!-- Record Komisi Section -->
    <h2 class="text-xl font-pilcrow font-pilcrow-heavy text-black mb-2">Record Komisi</h2>
    <div class="bg-white rounded-lg shadow-lg p-6 border-2 border-black shadow-black">

        @php
            // Grouping komisi berdasarkan bulan & tahun
            $komisiPerBulan = $riwayatKomisi->groupBy(function($item) {
                return \Carbon\Carbon::parse($item->date)->format('Y-m');
            });
        @endphp

        @foreach($komisiPerBulan as $bulan => $items)
            @php
                $carbon = \Carbon\Carbon::createFromFormat('Y-m', $bulan);
            @endphp

            <div class="mb-8">
                <div class="flex justify-between items-center mb-4">
                    <h3 class="text-sm font-pilcrow font-pilcrow-heavy text-black">
                     {{ $carbon->translatedFormat('F Y') }}
                    </h3>
                    <span class="text-md text-nowrap font-quicksand font-quicksand-regular text-black">
                        Rp {{ number_format($items->sum('komisi_didapat'), 0, ',', '.') }}
                    </span>
                </div>

                @foreach($items as $item)
                <div class="bg-primary rounded-lg p-4 mb-3">
                    <div class="flex items-center justify-between">
                        <div class="flex items-center">
                            <img src="{{ asset('assets/img/' . ($item->product->product_photo ?? 'default-thumbnail.jpg')) }}"
                                alt="{{ $item->product->name ?? 'Produk' }}"
                                class="w-12 h-12 rounded-lg mr-3">
                            <span class="text-white text-sm font-medium">{{ $item->product->name ?? 'Produk' }}</span>
                        </div>
                        <div class="text-right">
                            <p class="text-white text-xs font-quicksand font-quicksand-regular">
                                <span class="text-nowrap">
                                    Rp {{ number_format($item->komisi_didapat, 0, ',', '.') }}
                                </span>
                            </p>
                            <p class="text-white text-xs opacity-80">
                                {{ \Carbon\Carbon::parse($item->date)->format('d M Y') }}
                            </p>
                        </div>
                    </div>
                </div>
                @endforeach
            </div>
        @endforeach

    </div>

   <script>
        // Dropdown JavaScript
        const dropdownBtnL = document.getElementById('userDropdownBtnL');
        const dropdownBtnR = document.getElementById('userDropdownBtnR');
        const dropdownL = document.getElementById('userDropdownL');
        const dropdownR = document.getElementById('userDropdownR');
        
        if (dropdownBtnL && dropdownL) {
            // Toggle dropdown when button is clicked
            dropdownBtnL.addEventListener('click', function(e) {
                e.stopPropagation();
                dropdownL.classList.toggle('hidden');
                // Hide the other dropdown if it's open
                if (dropdownR && !dropdownR.classList.contains('hidden')) {
                    dropdownR.classList.add('hidden');
                }
            });
            
            // Close dropdown when clicking outside
            document.addEventListener('click', function(e) {
                if (!dropdownBtnL.contains(e.target) && !dropdownL.contains(e.target)) {
                    dropdownL.classList.add('hidden');
                }
            });
            
            // Handle product selection
            const productOptions = dropdownL.querySelectorAll('a');
            productOptions.forEach(option => {
                option.addEventListener('click', function(e) {
                    e.preventDefault();
                    const selectedProduct = this.textContent.trim();
                    dropdownBtnL.textContent = selectedProduct;
                    dropdownL.classList.add('hidden');
                    
                    // You can add AJAX call here to filter by product
                    // For now, we'll just reload the page with a query parameter
                    const url = new URL(window.location.href);
                    if (selectedProduct === 'Semua Produk') {
                        url.searchParams.delete('product');
                    } else {
                        url.searchParams.set('product', selectedProduct);
                    }
                    window.location.href = url.toString();
                });
            });
        }

        if (dropdownBtnR && dropdownR) {
            // Toggle dropdown when button is clicked
            dropdownBtnR.addEventListener('click', function(e) {
                e.stopPropagation();
                dropdownR.classList.toggle('hidden');
                // Hide the other dropdown if it's open
                if (dropdownL && !dropdownL.classList.contains('hidden')) {
                    dropdownL.classList.add('hidden');
                }
            });
            
            // Close dropdown when clicking outside
            document.addEventListener('click', function(e) {
                if (!dropdownBtnR.contains(e.target) && !dropdownR.contains(e.target)) {    
                    dropdownR.classList.add('hidden');
                }
            });
            
            // Handle month selection
            const monthOptions = document.querySelectorAll('.month-option');
            monthOptions.forEach(option => {
                option.addEventListener('click', function(e) {
                    e.preventDefault();
                    const selectedMonth = this.textContent.trim();
                    const selectedValue = this.getAttribute('data-value');
                    dropdownBtnR.textContent = selectedMonth;
                    dropdownR.classList.add('hidden');
                    
                    // You can add AJAX call here to filter by month
                    // For now, we'll just reload the page with a query parameter
                    const url = new URL(window.location.href);
                    url.searchParams.set('month', selectedValue);
                    window.location.href = url.toString();
                });
            });
            
            // Close dropdown when pressing Escape key
            document.addEventListener('keydown', function(e) {
                if (e.key === 'Escape') {
                    dropdownR.classList.add('hidden');
                    dropdownL.classList.add('hidden');
                }
            });
        }
    </script>
</body>
</html>
