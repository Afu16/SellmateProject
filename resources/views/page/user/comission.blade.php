<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Riwayat Komisi</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])

    <!-- Flatpickr CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/flatpickr/dist/flatpickr.min.css">
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
</head>

<body class="bg-white p-6">

    <!-- Header -->
    <div class="flex items-center mb-6">
        <a href="{{ url('/dashboard') }}" class="mr-4">
            <img src="{{ asset('assets/svg/arrow-icon.svg') }}" class="w-8 h-8" alt="arrow">
        </a>
        <h1 class="text-2xl font-pilcrow font-pilcrow-semibold text-black select-none text-nowrap">
            Riwayat Komisi
        </h1>
    </div>

    <!-- Dropdown Left -->
    <div id="userDropdownL"
         class="fixed z-50 bottom-16 left-0 bg-white w-40 sm:w-48 rounded-lg hidden shadow-lg border-2 border-primary text-xs">
        <div class="py-1 text-center">
            <h1 class="block px-4 py-2 text-sm font-pilcrow font-pilcrow-medium">Tanggal</h1>
            <input type="date" id="datePicker"
                   class="rounded-xl mx-2 px-2 py-0.5 h-8 text-xs sm:text-sm font-pilcrow font-pilcrow-medium w-[85%]">
        </div>
    </div>

    <!-- Dropdown Right -->
    <div id="userDropdownR"
         class="fixed z-50 bottom-16 right-0 bg-white w-40 sm:w-48 rounded-lg hidden shadow-lg border-2 border-primary text-xs">
        <div class="py-1 text-center">
            <h1 class="block px-4 py-2 text-sm font-pilcrow font-pilcrow-medium">Tanggal</h1>
            <input type="date" id="datePickerRight"
                   class="rounded-xl mx-2 px-2 py-0.5 h-8 text-xs sm:text-sm font-pilcrow font-pilcrow-medium w-[85%]">
        </div>
    </div>

    <!-- Bottom Bar -->
    <div class="fixed overflow-hidden -ml-6 px-6 w-full h-16 bg-primary-300 bottom-0 z-10">
        <div class="flex flex-row mt-4">
            <div class="w-1/2 text-xs relative">
                <button id="userDropdownBtnL"
                        class="bg-white w-full h-7 rounded-l-full border-2 border-primary font-pilcrow font-pilcrow-medium">
                    Semua Produk
                </button>
            </div>
            <div class="bg-primary opacity-100 w-16"></div>
            <div class="w-1/2 text-xs relative">
                <button id="userDropdownBtnR"
                        class="bg-white w-full h-7 rounded-r-full border-2 border-primary font-pilcrow font-pilcrow-medium">
                    {{ date('F Y') }}
                </button>
            </div>
        </div>
    </div>

    <!-- Total Komisi -->
    <div class="bg-primary rounded-lg p-6 shadow-black border-2 border-black mb-6">
        <div class="text-white">
            <p class="text-sm font-pilcrow font-pilcrow-semibold mb-2">Total Komisi</p>
            <p class="text-3xl font-quicksand font-quicksand-regular">
                Rp {{ number_format($totalKomisi,0,',','.') }}
            </p>
        </div>
    </div>

    <!-- Record Komisi -->
    <h2 class="text-xl font-pilcrow font-pilcrow-heavy text-black mb-2">Record Komisi</h2>
    <div class="bg-white rounded-lg shadow-lg p-4 border-2 border-black shadow-black mb-20">
        <div class="mb-4 flex justify-between items-center">
            <h3 class="text-lg font-pilcrow font-pilcrow-heavy text-black">
                {{ \Carbon\Carbon::createFromFormat('Y-m', $selectedMonth)->translatedFormat('F Y') }}
            </h3>
            <span class="text-lg font-quicksand font-quicksand-regular text-black">
                Rp {{ number_format($totalKomisiBulanIni,0,',','.') }}
            </span>
        </div>

        @php
            $labels = [1=>'Minggu 1', 2=>'Minggu 2', 3=>'Minggu 3', 4=>'Minggu 4'];
        @endphp

@foreach($weeks as $i => $total)
    @php $label = "Minggu $i"; @endphp
            <div class="bg-primary rounded-lg p-4 mb-3">
                <div class="flex items-center justify-between">
                    <span class="text-white text-sm font-pilcrow font-pilcrow-heavy">{{ $label }}</span>
                    <span class="text-white text-sm font-quicksand font-quicksand-regular">
                        Rp {{ number_format($weeks[$i] ?? 0,0,',','.') }}
                    </span>
                </div>
            </div>

            @foreach(($weeksItems[$i] ?? collect()) as $o)
                <div class="bg-white rounded-lg p-4 mb-3 border-2 border-black shadow-black">
                    <div class="flex items-center justify-between">
                        <div class="flex items-center">
                            <img src="{{ asset('assets/img/' . ($o->product->product_photo ?? 'default-thumbnail.jpg')) }}"
                                 alt="{{ $o->product->name ?? 'Produk' }}"
                                 class="w-10 h-10 rounded-lg mr-2">
                            <div>
                                <div class="text-black text-sm font-pilcrow font-pilcrow-heavy">{{ $o->product->name ?? 'Produk' }}</div>
                                {{-- Rincian harga / qty / persen --}}
                                <div class="text-xs text-gray-600">
                                    Harga: Rp{{ number_format($o->product_price ?? ($o->product->price ?? 0), 0, ',', '.') }} ·
                                    Qty: {{ $o->product_qty ?? ($o->quantity ?? 1) }} ·
                                    Rate: {{ number_format( ( ($o->commission_percent ?? $o->product->comission ?? 0) * 100 ), 2) }}%
                                </div>
                            </div>
                        </div>
                        <div class="text-right">
                            <p class="text-black text-xs font-quicksand font-quicksand-regular">
                                Rp {{ number_format($o->computed_commission ?? $o->total_omzets ?? 0, 0, ',', '.') }}
                            </p>
                            <p class="text-gray-600 text-xs font-quicksand font-quicksand-regular">
                                {{ \Carbon\Carbon::parse($o->date)->format('d M Y') }}
                            </p>
                        </div>
                    </div>
                </div>
            @endforeach
        @endforeach
    </div>

    <!-- Script -->
    <script src="https://cdn.jsdelivr.net/npm/flatpickr"></script>
    <script>
        const dropdownBtnL = document.getElementById('userDropdownBtnL');
        const dropdownBtnR = document.getElementById('userDropdownBtnR');
        const dropdownL = document.getElementById('userDropdownL');
        const dropdownR = document.getElementById('userDropdownR');
        const dateInput = document.getElementById('datePicker');
        const datePickerRight = document.getElementById('datePickerRight');

        // ==== Fungsi Tanggal ====
        function getMonday() {
            const today = new Date();
            const day = today.getDay();
            const diff = (day === 0 ? -6 : 1 - day);
            today.setDate(today.getDate() + diff);
            return today;
        }

        function formatDateInput(date) {
            return date.toISOString().split('T')[0];
        }

        function formatDateReadable(date) {
            return date.toLocaleDateString('id-ID', { day: 'numeric', month: 'short', year: 'numeric' });
        }

        function formatInputDate(date) {
            return date.toISOString().split('T')[0];
        }

        function formatTanggal(date) {
            return date.toLocaleDateString('id-ID', { day: 'numeric', month: 'short', year: 'numeric' });
        }

        // ==== Variabel Session ====
        const urlObj = new URL(window.location.href);
        const keepParam = urlObj.searchParams.get('keep');
        const ss = window.sessionStorage;

        // ==== Kiri (Senin per minggu) ====
        const monday = getMonday();
        const mondayStr = formatDateInput(monday);
        const mondayHuman = formatDateReadable(monday);

        const lastMonday = localStorage.getItem('lastMonday');
        if (!lastMonday || lastMonday !== mondayStr) {
            localStorage.setItem('lastMonday', mondayStr);
            ss.removeItem('selectedDateL');
            location.reload();
        }

        const savedLeft = keepParam === '1' ? ss.getItem('selectedDateL') : null;
        if (savedLeft) {
            dateInput.value = savedLeft;
            dropdownBtnL.textContent = formatDateReadable(new Date(savedLeft));
        } else {
            dateInput.value = mondayStr;
            dropdownBtnL.textContent = mondayHuman;
            ss.removeItem('selectedDateL');
        }

        dateInput.addEventListener('change', e => {
            const val = e.target.value;
            dropdownBtnL.textContent = formatDateReadable(new Date(val));
            ss.setItem('selectedDateL', val);
            const url = new URL(window.location.href);
            url.searchParams.set('start_date', val);
            url.searchParams.set('keep', '1');
            window.location.href = url.toString();
        });

        // ==== Kanan (Tanggal per hari) ====
        const today = new Date();
        const todayStr = formatInputDate(today);
        const lastUpdateR = localStorage.getItem('lastUpdateRight');

        if (!lastUpdateR || lastUpdateR !== todayStr) {
            localStorage.setItem('lastUpdateRight', todayStr);
            ss.removeItem('selectedDateR');
            location.reload();
        }

        const savedRight = keepParam === '1' ? ss.getItem('selectedDateR') : null;
        if (savedRight) {
            datePickerRight.value = savedRight;
            dropdownBtnR.textContent = formatTanggal(new Date(savedRight));
        } else {
            datePickerRight.value = todayStr;
            dropdownBtnR.textContent = formatTanggal(today);
            ss.removeItem('selectedDateR');
        }

        datePickerRight.addEventListener('change', e => {
            const val = e.target.value;
            dropdownBtnR.textContent = formatTanggal(new Date(val));
            ss.setItem('selectedDateR', val);
            const url = new URL(window.location.href);
            url.searchParams.set('end_date', val);
            url.searchParams.set('month', val.slice(0, 7));
            url.searchParams.set('keep', '1');
            window.location.href = url.toString();
        });

        // ==== Toggling Dropdown ====
        dropdownBtnL.addEventListener('click', e => {
            e.stopPropagation();
            dropdownL.classList.toggle('hidden');
            dropdownR.classList.add('hidden');
        });

        dropdownBtnR.addEventListener('click', e => {
            e.stopPropagation();
            dropdownR.classList.toggle('hidden');
            dropdownL.classList.add('hidden');
        });

        document.addEventListener('click', e => {
            if (!dropdownL.contains(e.target) && !dropdownBtnL.contains(e.target)) dropdownL.classList.add('hidden');
            if (!dropdownR.contains(e.target) && !dropdownBtnR.contains(e.target)) dropdownR.classList.add('hidden');
        });

        // ==== Flatpickr Setup ====
        const fpOpts = {
            dateFormat: 'Y-m-d',
            disableMobile: true,
            position: 'below',
            onOpen: (s, d, inst) => {
                if (inst.input.id === 'datePicker') dropdownL.classList.add('hidden');
                else dropdownR.classList.add('hidden');
            },
            onClose: (s, d, inst) => {
                if (inst.input.id === 'datePicker') dropdownL.classList.remove('hidden');
                else dropdownR.classList.remove('hidden');
            },
            onChange: (s, d, inst) => inst.close()
        };

        if (dateInput) flatpickr(dateInput, fpOpts);
        if (datePickerRight) flatpickr(datePickerRight, fpOpts);
    </script>
</body>
</html>
