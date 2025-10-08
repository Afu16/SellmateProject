<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Leaderboard</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body>
    <div class="p-6">

         <!-- Header -->
         <div class="flex items-center mb-6">
            <a href="{{ url('/dashboard') }}" class="mr-4">
           <img class="w-8 h-8" src="{{ asset('assets/svg/arrow-icon.svg') }}" alt="arrow">
            </a>
            <h1 class="text-2xl font-quicksand font-quicksand-bold text-black">Top Rating</h1>
        </div>

        <div class="w-full max-w-sm">
            <div class="flex justify-between min-w-100 items-center mb-6">
                <!-- Search Bar -->
                <div class="relative text-sm flex items-center border-2 border-black bg-white rounded-xl shadow-black shadow-md py-1 px-[5vw] w-[50vw]">
                    <div class="flex items-center">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 text-black mr-2" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z" />
                        </svg>
                    </div>
                    <input type="search" name="search" id="search" placeholder="Search" class="w-full text-sm font-quicksand font-quicksand-regular focus:border-none focus:outline-none focus:ring-0 border-0 bg-transparent">
                </div>
                
                <div class="absolute right-6">
                    <select class="appearance-none text-sm border-2 border-black shadow-black bg-orange-500 text-black font-semibold py-[1.5vh] px-[2.5vw] rounded-xl shadow-md pr-[10vw] outline-none">
                        <option>Bulan Ini</option>
                        <option>Bulan Lalu</option>
                        <option>Tahun Ini</option>
                    </select>
                </div>
            </div> 
        </div>

        <div class="border-2 border-black rounded-2xl w-full mx-auto shadow-black p-4 bg-white">
            <!-- Header Table -->
            <div class="flex justify-between items-center px-2 mb-2">
                <p class="font-pilcrow font-pilcrow-heavy text-black w-1/3">Nama</p>
                <p class="font-pilcrow font-pilcrow-heavy text-black w-1 relative left-[11vw] text-center">Nilai</p>
                <p class="font-pilcrow font-pilcrow-heavy text-black w-1/3 text-right">Total</p>
            </div>
            <!-- List Leaderboard -->
            <div class="flex flex-col gap-3">
                @foreach ($topRating->sortByDesc(function($item) { return $item->omzets_sum_total_omzets ?? 0; }) as $item)
                    @php
                        $total = $item->omzets_sum_total_omzets ?? 0;
                        if ($total >= 300000) {
                            $grade = 'A';
                        } elseif ($total >= 200000) {
                            $grade = 'B';
                        } elseif ($total >= 100000) {
                            $grade = 'C';
                        } else {
                            $grade = 'D';
                        }
                    @endphp

                    <div class="flex items-center bg-primary shadow-black border-2 border-black rounded-xl px-3 py-[2vh] shadow-md">
                        @php
                            $rank = ($topRating->currentPage() - 1) * $topRating->perPage() + $loop->iteration;
                        @endphp
                        <div class="flex text-[4vw] items-center justify-center w-4 h-4 rounded-full text-white font-pilcrow font-pilcrow-bold md:ml-[2vw] mr-[1vw] select-none">
                            {{ $rank }}.
                        </div>
@php
    // Sesuaikan dengan colors yg kamu define di tailwind.config.js
    $colors = [
        'bg-red-500', 'bg-blue-500', 'bg-green-500',
        'bg-yellow-500', 'bg-purple-500', 'bg-pink-500', 'bg-indigo-500'
    ];
    // Biar konsisten per user, pakai hash dari nama, bukan random
    $index = crc32($item->name) % count($colors);
    $bgColor = $colors[$index];
@endphp
<div class="w-10 h-10 lg:w-[4vw] lg:h-[4vw] rounded-full border-2 border-white flex items-center justify-center text-white font-bold overflow-hidden mr-3 {{ $bgColor }}">
    @if (!empty($item->foto_link))
        <img 
            src="{{ asset('storage/' . $item->foto_link) }}" 
            alt="{{ $item->name }}" 
            class="w-full h-full object-cover"
        >
    @else
        {{ strtoupper(substr($item->name, 0, 1)) }}
    @endif
</div>
                        
                        <div class="flex-1 gap-0">
                            <p class="text-white text-[3.5vw] font-pilcrow font-pilcrow-heavy leading-none">{{ $item->name }}</p>
                            <span class="text-[3vw] text-nowrap text-quaternary font-quicksand font-quicksand-regular">{{ $item->major }}</span>
                        </div>

                        <!-- Nilai -->
                        <div class="w-1 text-center">
                            <span class="text-white text-[3vw] ml-[2vw] font-quicksand font-pilcrow-heavy">{{ $grade }}</span>
                        </div>

                        <!-- Total Omzet -->
                        <div class="w-1/3 text-right">
                            <span class="text-white text-[2.5vw] font-quicksand font-quicksand-semibold">
                                Rp {{ number_format($total, 0, ',', '.') }}
                            </span>
                        </div>
                    </div>
                @endforeach
            </div>

            <div class="flex justify-center items-center space-x-2 mt-6">
                @php
                    $current = $topRating->currentPage();
                    $last = $topRating->lastPage();

                    // Hitung start & end supaya selalu tampil 5 angka max
                    $start = max($current - 2, 1);
                    $end = min($start + 4, $last);

                    // Kalau udah deket akhir, geser supaya tetap 5 angka
                    if ($end - $start < 4) {
                        $start = max($end - 4, 1);
                    }
                @endphp

                {{-- Tombol Prev --}}
                @if ($current > 1)
                    <a href="{{ $topRating->url($current - 1) }}"
                    class="px-3 py-2 bg-white border border-gray-300 text-black rounded-md hover:bg-gray-200">
                        &lt;
                    </a>
                @endif

                {{-- Nomor Halaman (max 5) --}}
                @for ($page = $start; $page <= $end; $page++)
                    @if ($page == $current)
                        <span class="px-3 py-2 bg-orange-500 text-white rounded-md font-bold">{{ $page }}</span>
                    @else
                        <a href="{{ $topRating->url($page) }}"
                        class="px-3 py-2 bg-white border border-gray-300 text-black rounded-md hover:bg-gray-200">
                            {{ $page }}
                        </a>
                    @endif
                @endfor

                {{-- Tombol Next --}}
                @if ($current < $last)
                    <a href="{{ $topRating->url($current + 1) }}"
                    class="px-3 py-2 bg-white border border-gray-300 text-black rounded-md hover:bg-gray-200">
                        &gt;
                    </a>
                @endif
            </div>
        </div>
    </div>
</body>
</html>