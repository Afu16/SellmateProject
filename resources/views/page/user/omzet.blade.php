<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Riwayat Omzet</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body class="bg-white p-6">
    <!-- Header -->
    <div class="flex items-center mb-6">
        <a href="{{ url('/dashboard') }}" class="mr-4">
            <img class="w-8 h-8" src="{{ asset('assets/svg/arrow-icon.svg') }}" alt="arrow">
        </a>
        <h1 class="text-2xl font-pilcrow font-pilcrow-semibold text-black select-none text-nowrap">Riwayat Omzet</h1>
    </div>

    {{-- Dropdown Left --}}
    <div id="userDropdownL" class="fixed z-50 bottom-16 text-xs left-0 bg-white w-48 rounded-lg hidden shadow-lg border-2 border-primary">
        <div class="py-1 text-center">
            <h1 id="selectedDateLabel" class="block px-4 py-2 text-sm font-pilcrow font-pilcrow-medium">Tanggal</h1>
            <input type="date" id="datePicker" class="rounded-xl mx-2 px-2 py-1 text-sm font-pilcrow font-pilcrow-medium w-[85%]">
        </div>
    </div>

    {{-- Dropdown Right --}}
<div id="userDropdownR" class="fixed z-50 bottom-16 right-0 bg-white w-48 rounded-lg hidden shadow-lg border-2 border-primary">
    <div class="py-1 text-center">
        <h1 id="selectedDateRight" class="block px-4 py-2 text-sm font-pilcrow font-pilcrow-medium">Tanggal</h1>
        <input type="date" id="datePickerRight" class="rounded-xl mx-2 px-2 py-1 text-sm font-pilcrow font-pilcrow-medium w-[85%]">
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

<!-- Total Omzet -->
<div class="bg-primary rounded-lg p-6 shadow-black border-2 border-black mb-6">
    <div class="text-white">
        <p class="text-sm font-pilcrow font-pilcrow-semibold mb-2">Total Omzet</p>
        <p class="text-3xl font-quicksand font-quicksand-regular">
            Rp {{ number_format($totalOmzet,0,',','.') }}
        </p>
    </div>
</div>

    <!-- Record Omzet Section -->
    <h2 class="text-xl font-pilcrow font-pilcrow-heavy text-black mb-2">Record Omzet</h2>
    <div class="bg-white rounded-lg shadow-lg p-4 border-2 border-black shadow-black mb-20">

    <!-- Omzet Bulan ini -->
    <div class="mb-8">
        <div class="flex justify-between items-center mb-4">
            <h3 class="text-lg font-pilcrow font-pilcrow-heavy text-black">Bulan ini</h3>
            <span class="text-lg font-quicksand font-quicksand-regular text-black">
                Rp {{ number_format($totalBulanIni,0,',','.') }}
            </span>
        </div>

        @foreach($omzetBulanIni as $o)
            <div class="bg-primary rounded-lg p-4 mb-3">
                <div class="flex items-center justify-between">
                    <div class="flex items-center">
                     <img src="{{ asset('assets/img/' . ($o->product->product_photo ?? 'default-thumbnail.jpg')) }}"
                        alt="{{ $o->product->name ?? 'Produk' }}"
                        class="w-10 h-10 rounded-lg mr-2">                          
                    <span class="text-white text-sm font-pilcrow font-pilcrow-heavy">{{ $o->product->name ?? 'Produk' }}</span>
                    </div>
                    <div class="text-right">
                        <p class="text-white text-xs font-quicksand font-quicksand-regular">
                            <span class="text-nowrap">
                                Rp {{ number_format($o->total_omzets,0,',','.') }}
                            </span>
                        </p>
                        <p class="text-white text-xs text-nowrap font-quicksand font-quicksand-regular opacity-80">
                            {{ \Carbon\Carbon::parse($o->date)->format('d M Y') }}
                        </p>
                    </div>
                </div>
            </div>
        @endforeach
    </div>

       <!-- Omzet Bulan Lain -->
@foreach($perBulan as $pb)
    {{-- Skip bulan ini biar ga dobel --}}
    @if($pb->month != now()->month || $pb->year != now()->year)
        <div class="border-t border-gray-200 mb-8"></div>

        <div class="mb-8">
            <div class="flex justify-between items-center mb-4">
                <h3 class="text-lg font-pilcrow font-pilcrow-heavy text-black">
                    {{ \Carbon\Carbon::create($pb->year, $pb->month)->translatedFormat('F Y') }}
                </h3>
                <span class="text-lg font-quicksand font-quicksand-regular text-black">
                    Rp {{ number_format($pb->total,0,',','.') }}
                </span>
            </div>

            @php
                $omzetPerBulan = \App\Models\Omzet::whereYear('date', $pb->year)
                    ->whereMonth('date', $pb->month)
                    ->orderBy('date', 'desc')
                    ->get();
            @endphp

            @foreach($omzetPerBulan as $o)
                <div class="bg-primary rounded-lg p-4 mb-3">
                    <div class="flex items-center justify-between">
                        <div class="flex items-center">
                            <img src="{{ asset('assets/img/' . ($o->product->product_photo ?? 'default-thumbnail.jpg')) }}"
                                alt="{{ $o->product->name ?? 'Produk' }}"
                                class="w-10 h-10 rounded-lg mr-3">
                             <span class="text-white text-sm font-pilcrow font-pilcrow-heavy">{{ $o->product->name ?? 'Produk' }}</span>
                        
                        </div>
                        <div class="text-right">
                            <p class="text-white text-xs font-quicksand font-quicksand-regular">
                                Rp {{ number_format($o->total_omzets,0,',','.') }}
                            </p>
                            <p class="text-white text-xs font-quicksand font-quicksand-regular opacity-80">
                                {{ \Carbon\Carbon::parse($o->date)->format('d M Y') }}
                            </p>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    @endif
@endforeach

</div>

<script>
    const dropdownBtnL = document.getElementById('userDropdownBtnL');
    const dropdownBtnR = document.getElementById('userDropdownBtnR');
    const dropdownL = document.getElementById('userDropdownL');
    const dropdownR = document.getElementById('userDropdownR');
    const dateInput = dropdownL.querySelector('input[type="date"]');
    const datePickerRight = document.getElementById('datePickerRight');

    // ======== BAGIAN KIRI (Senin per minggu) ========

    // Fungsi ambil Senin minggu ini
    function getMonday() {
        const today = new Date();
        const day = today.getDay(); // Minggu = 0, Senin = 1
        const diff = (day === 0 ? -6 : 1 - day);
        today.setDate(today.getDate() + diff);
        return today;
    }

    function formatDateInput(date) {
        return date.toISOString().split('T')[0];
    }

    function formatDateReadable(date) {
        return date.toLocaleDateString('id-ID', {
            day: 'numeric', month: 'short', year: 'numeric'
        });
    }

    // ambil Senin minggu ini
    const monday = getMonday();
    const mondayStr = formatDateInput(monday);
    const mondayHuman = formatDateReadable(monday);

    // cek local storage
    const savedDate = localStorage.getItem('selectedDate');
    const lastMonday = localStorage.getItem('lastMonday');

    // refresh otomatis tiap Senin baru
    if (!lastMonday || lastMonday !== mondayStr) {
        localStorage.setItem('lastMonday', mondayStr);
        localStorage.removeItem('selectedDate');
        location.reload();
    }

    // set nilai awal tombol & input
    if (savedDate) {
        dateInput.value = savedDate;
        dropdownBtnL.textContent = formatDateReadable(new Date(savedDate));
    } else {
        dateInput.value = mondayStr;
        dropdownBtnL.textContent = mondayHuman;
    }

    // ubah tombol pas tanggal diganti manual
    dateInput.addEventListener('change', (e) => {
        localStorage.setItem('selectedDate', e.target.value);
        dropdownBtnL.textContent = formatDateReadable(new Date(e.target.value));
    });

    // buka & tutup dropdown kiri
    dropdownBtnL.addEventListener('click', (e) => {
        e.stopPropagation();
        dropdownL.classList.toggle('hidden');
        dropdownR.classList.add('hidden');
    });
    document.addEventListener('click', (e) => {
        if (!dropdownL.contains(e.target) && !dropdownBtnL.contains(e.target)) {
            dropdownL.classList.add('hidden');
        }
    });


    // ======== BAGIAN KANAN (Tanggal per hari) ========

    function formatTanggal(date) {
        return date.toLocaleDateString('id-ID', {
            day: 'numeric',
            month: 'short',
            year: 'numeric'
        });
    }

    function formatInputDate(date) {
        return date.toISOString().split('T')[0];
    }

    const today = new Date();
    const todayStr = formatInputDate(today);
    const savedDateR = localStorage.getItem('selectedDateRight');
    const lastUpdateR = localStorage.getItem('lastUpdateRight');

    // refresh otomatis kalau sudah ganti hari
    if (!lastUpdateR || lastUpdateR !== todayStr) {
        localStorage.setItem('lastUpdateRight', todayStr);
        localStorage.removeItem('selectedDateRight');
        location.reload();
    }

    // set nilai awal tombol & input kanan
    if (savedDateR) {
        datePickerRight.value = savedDateR;
        dropdownBtnR.textContent = formatTanggal(new Date(savedDateR));
    } else {
        datePickerRight.value = todayStr;
        dropdownBtnR.textContent = formatTanggal(today);
    }

    // ubah tombol kanan pas ganti tanggal manual
    datePickerRight.addEventListener('change', (e) => {
        localStorage.setItem('selectedDateRight', e.target.value);
        dropdownBtnR.textContent = formatTanggal(new Date(e.target.value));
    });

    // buka & tutup dropdown kanan
    dropdownBtnR.addEventListener('click', (e) => {
        e.stopPropagation();
        dropdownR.classList.toggle('hidden');
        dropdownL.classList.add('hidden');
    });
    document.addEventListener('click', (e) => {
        if (!dropdownR.contains(e.target) && !dropdownBtnR.contains(e.target)) {
            dropdownR.classList.add('hidden');
        }
    });
</script>

</body>
</html>
