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
        <h1 class="text-2xl font-pilcrow font-pilcrow-semibold text-black">Riwayat Omzet</h1>
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
    <div class="bg-white rounded-lg shadow-lg p-4 border-2 border-black shadow-black">

    <!-- Omzet Bulan ini -->
    <div class="mb-8">
        <div class="flex justify-between items-center mb-4">
            <h3 class="text-lg font-pilcrow font-pilcrow-heavy text-black">Omzet Bulan ini</h3>
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
                    <span class="text-white text-sm font-medium">{{ $o->product->name ?? 'Produk' }}</span>
                    </div>
                    <div class="text-right">
                        <p class="text-white text-xs font-quicksand font-quicksand-regular">
                            <span class="text-nowrap">
                                Rp {{ number_format($o->total_omzets,0,',','.') }}
                            </span>
                        </p>
                        <p class="text-white text-xs text-nowrap opacity-80">
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
                    Omzet {{ \Carbon\Carbon::create($pb->year, $pb->month)->translatedFormat('F Y') }}
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
                                class="w-12 h-12 rounded-lg mr-3">
                             <span class="text-white font-medium">{{ $o->product->name ?? 'Produk' }}</span>
                        
                        </div>
                        <div class="text-right">
                            <p class="text-white font-quicksand font-quicksand-regular">
                                Rp {{ number_format($o->total_omzets,0,',','.') }}
                            </p>
                            <p class="text-white text-sm opacity-80">
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

    
</body>
</html>
