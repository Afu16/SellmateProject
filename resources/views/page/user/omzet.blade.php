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
    <div id="userDropdownL" class="fixed z-50 bottom-16 text-xs left-0 bg-white w-40 sm:w-48 rounded-lg hidden shadow-lg border-2 border-primary">
        <div class="py-1 text-center">
            <h1 id="selectedDateLabel" class="block px-4 py-2 text-sm font-pilcrow font-pilcrow-medium">Tanggal</h1>
            <input type="date" id="datePicker" class="rounded-xl mx-2 px-2 py-0.5 h-8 text-xs sm:text-sm font-pilcrow font-pilcrow-medium w-[85%]">
        </div>
    </div>

    {{-- Dropdown Right --}}
<div id="userDropdownR" class="fixed z-50 bottom-16 right-0 bg-white w-40 sm:w-48 rounded-lg hidden shadow-lg border-2 border-primary">
    <div class="py-1 text-center">
        <h1 id="selectedDateRight" class="block px-4 py-2 text-sm font-pilcrow font-pilcrow-medium">Tanggal</h1>
        <input type="date" id="datePickerRight" class="rounded-xl mx-2 px-2 py-0.5 h-8 text-xs sm:text-sm font-pilcrow font-pilcrow-medium w-[85%]">
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
        <div class="mb-4 flex justify-between items-center">
            <h3 class="text-lg font-pilcrow font-pilcrow-heavy text-black">
                {{ \Carbon\Carbon::createFromFormat('Y-m', $selectedMonth)->translatedFormat('F Y') }}
            </h3>
            <span class="text-lg font-quicksand font-quicksand-regular text-black">
                Rp {{ number_format($totalBulanIni,0,',','.') }}
            </span>
        </div>

        @php
            $labels = [1=>'Minggu 1',2=>'Minggu 2',3=>'Minggu 3',4=>'Minggu 4'];
        @endphp

        @foreach($weeks as $i => $total)
            @php $label = "Minggu $i"; @endphp

            <div class="bg-primary rounded-lg p-4 mb-3">
                <div class="flex items-center justify-between">
                    <span class="text-white text-sm font-pilcrow font-pilcrow-heavy">{{ $label }}</span>
                    <span class="text-white text-sm font-quicksand font-quicksand-regular">Rp {{ number_format($weeks[$i] ?? 0,0,',','.') }}</span>
                </div>
            </div>

            @foreach(($weeksItems[$i] ?? collect()) as $o)
                <div class="bg-white rounded-lg p-4 mb-3 border-2 border-black shadow-black">
                    <div class="flex items-center justify-between">
                        <div class="flex items-center">
                            <img src="{{ asset('assets/img/' . ($o->product->product_photo ?? 'default-thumbnail.jpg')) }}" alt="{{ $o->product->name ?? 'Produk' }}" class="w-10 h-10 object-cover rounded-lg mr-2">
                            <span class="text-black text-sm font-pilcrow font-pilcrow-heavy">{{ $o->product->name ?? 'Produk' }}</span>
                        </div>
                        <div class="text-right">
                            <p class="text-black text-xs font-quicksand font-quicksand-regular">
                                <span class="text-nowrap">Rp {{ number_format($o->total_omzets,0,',','.') }}</span>
                            </p>
                            <p class="text-gray-600 text-xs text-nowrap font-quicksand font-quicksand-regular">
                                {{ \Carbon\Carbon::parse($o->date)->format('d M Y') }}
                            </p>
                        </div>
                    </div>
                </div>
            @endforeach
        @endforeach
    </div>

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

    // Session persistence per-kunjungan halaman
    const urlObj = new URL(window.location.href);
    const keepParam = urlObj.searchParams.get('keep');
    const ss = window.sessionStorage;

    // cek local storage
    const lastMonday = localStorage.getItem('lastMonday');

    // refresh otomatis tiap Senin baru
    if (!lastMonday || lastMonday !== mondayStr) {
        localStorage.setItem('lastMonday', mondayStr);
        localStorage.removeItem('selectedDate');
        location.reload();
    }

    // set nilai awal tombol & input kiri
    const savedLeft = keepParam === '1' ? ss.getItem('selectedDateL') : null;
    if (savedLeft) {
        dateInput.value = savedLeft;
        dropdownBtnL.textContent = formatDateReadable(new Date(savedLeft));
    } else {
        dateInput.value = mondayStr;
        dropdownBtnL.textContent = mondayHuman;
        ss.removeItem('selectedDateL');
    }

    // ubah tombol pas tanggal diganti manual
    dateInput.addEventListener('change', (e) => {
        const val = e.target.value;
        dropdownBtnL.textContent = formatDateReadable(new Date(val));
        ss.setItem('selectedDateL', val);

        const url = new URL(window.location.href);
        url.searchParams.set('start_date', val);
        url.searchParams.set('keep', '1');
        window.location.href = url.toString();
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
    const lastUpdateR = localStorage.getItem('lastUpdateRight');

    // refresh otomatis kalau sudah ganti hari
    if (!lastUpdateR || lastUpdateR !== todayStr) {
        localStorage.setItem('lastUpdateRight', todayStr);
        localStorage.removeItem('selectedDateRight');
        location.reload();
    }

    // set nilai awal tombol & input kanan
    const savedRight = keepParam === '1' ? ss.getItem('selectedDateR') : null;
    if (savedRight) {
        datePickerRight.value = savedRight;
        dropdownBtnR.textContent = formatTanggal(new Date(savedRight));
    } else {
        datePickerRight.value = todayStr;
        dropdownBtnR.textContent = formatTanggal(today);
        ss.removeItem('selectedDateR');
    }

    function setMonthQueryFromDateStr(dateStr) {
        // dateStr format: YYYY-MM-DD
        if (!dateStr) return;
        const url = new URL(window.location.href);
        url.searchParams.set('month', dateStr.slice(0, 7));
        window.location.href = url.toString();
    }

    // ubah tombol kanan pas ganti tanggal manual
    datePickerRight.addEventListener('change', (e) => {
        const val = e.target.value;
        dropdownBtnR.textContent = formatTanggal(new Date(val));
        ss.setItem('selectedDateR', val);

        const url = new URL(window.location.href);
        url.searchParams.set('end_date', val);
        url.searchParams.set('month', val.slice(0,7));
        url.searchParams.set('keep', '1');
        window.location.href = url.toString();
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

<!-- Flatpickr (smaller calendar on mobile) -->
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/flatpickr/dist/flatpickr.min.css">
<script src="https://cdn.jsdelivr.net/npm/flatpickr"></script>
<style>
    @media (max-width: 640px) {
        .flatpickr-calendar {
            font-size: 12px;
            transform: scale(0.9);
            transform-origin: top right;
        }
        .flatpickr-day { line-height: 28px; height: 28px; }
        .flatpickr-months .flatpickr-month { height: 32px; }
    }
    .flatpickr-input[readonly] { cursor: pointer; background-color: #fff; }
    input[type="date"]::-webkit-calendar-picker-indicator { display: none; }
</style>

<script>
    if (window.flatpickr) {
        const dropdownL = document.getElementById('userDropdownL');
        const dropdownR = document.getElementById('userDropdownR');

        const fpOpts = {
            dateFormat: 'Y-m-d',
            disableMobile: true,
            position: 'below', // 💥 ini yang bikin kalender muncul di bawah input
            onOpen: function(selectedDates, dateStr, instance) {
                // Sembunyikan dropdown putih pas kalender muncul
                if (instance.input.id === 'datePicker') {
                    dropdownL.classList.add('hidden');
                } else if (instance.input.id === 'datePickerRight') {
                    dropdownR.classList.add('hidden');
                }
            },
            onClose: function(selectedDates, dateStr, instance) {
                // Tampilkan kembali dropdown setelah kalender ditutup
                if (instance.input.id === 'datePicker') {
                    dropdownL.classList.remove('hidden');
                } else if (instance.input.id === 'datePickerRight') {
                    dropdownR.classList.remove('hidden');
                }
            },
            onChange: function(selectedDates, dateStr, instance) {
                // Tutup otomatis setelah pilih tanggal
                instance.close();
            }
        };

        if (document.getElementById('datePicker')) {
            flatpickr(document.getElementById('datePicker'), fpOpts);
        }
        if (document.getElementById('datePickerRight')) {
            flatpickr(document.getElementById('datePickerRight'), fpOpts);
        }
    }
</script>


</body>
</html>
