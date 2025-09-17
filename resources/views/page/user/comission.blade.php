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
        <h1 class="text-2xl font-pilcrow font-pilcrow-semibold text-black">Riwayat Komisi</h1>
    </div>

    <!-- Total Komisi Section -->
    <div class="bg-primary rounded-lg p-6 shadow-black border-2 border-black mb-6">
        <div class="text-white">
            <p class="text-sm font-pilcrow font-pilcrow-semibold mb-2">Total Komisi</p>
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
                    <h3 class="text-lg font-pilcrow font-pilcrow-heavy text-black">
                        Komisi {{ $carbon->translatedFormat('F Y') }}
                    </h3>
                    <span class="text-lg font-quicksand font-quicksand-regular text-black">
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
                            <span class="text-white font-medium">{{ $item->product->name ?? 'Produk' }}</span>
                        </div>
                        <div class="text-right">
                            <p class="text-white font-quicksand font-quicksand-regular">
                                Rp {{ number_format($item->komisi_didapat, 0, ',', '.') }}
                            </p>
                            <p class="text-white text-sm opacity-80">
                                {{ \Carbon\Carbon::parse($item->date)->format('d M Y') }}
                            </p>
                        </div>
                    </div>
                </div>
                @endforeach
            </div>
        @endforeach

    </div>

</body>
</html>
