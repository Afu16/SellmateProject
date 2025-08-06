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
        <a href="{{ url('/user') }}" class="mr-4">
            <img class="w-8 h-8" src="{{ asset('assets/svg/arrow-icon.svg') }}" alt="arrow">
        </a>
        <h1 class="text-2xl font-pilcrow font-pilcrow-semibold text-black">Riwayat Komisi</h1>
    </div>

    <!-- Total Komisi Section -->
    <div class="bg-primary rounded-lg p-6 mb-6">
        <div class="text-white">
            <p class="text-sm font-pilcrow font-pilcrow-semibold mb-2">Total Komisi</p>
            <p class="text-3xl font-quicksand font-quicksand-semibold">Rp 1.400.000</p>
        </div>
    </div>

    <!-- Record Komisi Section -->
    <div class="bg-white rounded-lg shadow-lg p-6 border-2 border-black shadow-black">
        <h2 class="text-xl font-bold text-black mb-6">Record Komisi</h2>

        <!-- Omzet Bulan ini -->
        <div class="mb-8">
            <div class="flex justify-between items-center mb-4">
                <h3 class="text-lg font-semibold text-black">Omzet Bulan ini</h3>
                <span class="text-lg font-semibold text-black">Rp 800.000</span>
            </div>

            <!-- Entry 1 - Cake -->
            <div class="bg-purple-600 rounded-lg p-4 mb-3">
                <div class="flex items-center justify-between">
                    <div class="flex items-center">
                        <img src="{{ asset('assets/img/cake-thumbnail.jpg') }}" alt="Cake" class="w-12 h-12 rounded-lg mr-3">
                        <span class="text-white font-medium">Cake</span>
                    </div>
                    <div class="text-right">
                        <p class="text-white font-semibold">Rp 250.000</p>
                        <p class="text-white text-sm opacity-80">27 Feb 2025</p>
                    </div>
                </div>
            </div>

            <!-- Entry 2 - SkinCare -->
            <div class="bg-purple-600 rounded-lg p-4 mb-3">
                <div class="flex items-center justify-between">
                    <div class="flex items-center">
                        <img src="{{ asset('assets/img/skincare-thumbnail.jpg') }}" alt="SkinCare" class="w-12 h-12 rounded-lg mr-3">
                        <span class="text-white font-medium">SkinCare</span>
                    </div>
                    <div class="text-right">
                        <p class="text-white font-semibold">Rp 650.000</p>
                        <p class="text-white text-sm opacity-80">29 Feb 2025</p>
                    </div>
                </div>
            </div>
        </div>

        <!-- Divider -->
        <div class="border-t border-gray-200 mb-8"></div>

        <!-- Omzet Januari -->
        <div class="mb-8">
            <div class="flex justify-between items-center mb-4">
                <h3 class="text-lg font-semibold text-black">Omzet Januari</h3>
                <span class="text-lg font-semibold text-black">Rp 800.000</span>
            </div>

            <!-- Entry 1 - Cake -->
            <div class="bg-purple-600 rounded-lg p-4 mb-3">
                <div class="flex items-center justify-between">
                    <div class="flex items-center">
                        <img src="{{ asset('assets/img/cake-thumbnail.jpg') }}" alt="Cake" class="w-12 h-12 rounded-lg mr-3">
                        <span class="text-white font-medium">Cake</span>
                    </div>
                    <div class="text-right">
                        <p class="text-white font-semibold">Rp 250.000</p>
                        <p class="text-white text-sm opacity-80">25 Jan 2025</p>
                    </div>
                </div>
            </div>

            <!-- Entry 2 - SkinCare -->
            <div class="bg-purple-600 rounded-lg p-4 mb-3">
                <div class="flex items-center justify-between">
                    <div class="flex items-center">
                        <img src="{{ asset('assets/img/skincare-thumbnail.jpg') }}" alt="SkinCare" class="w-12 h-12 rounded-lg mr-3">
                        <span class="text-white font-medium">SkinCare</span>
                    </div>
                    <div class="text-right">
                        <p class="text-white font-semibold">Rp 650.000</p>
                        <p class="text-white text-sm opacity-80">16 Jan 2025</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</body>
</html>
