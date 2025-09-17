<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>History</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <style>
        @import url('https://fonts.googleapis.com/css2?family=Poppins:wght@400;500;600;700&display=swap');
        body {
            font-family: 'Poppins', sans-serif;
        }
    </style>
    @vite('resources/js/app.js', 'resources/css/app.css')
</head>
<body class="bg-white">
    <div class="p-6">
        <!-- Header -->
        <div class="flex items-center mb-6">
            <a href="{{ url('/dashboard') }}" class="mr-4">
                <img class="w-8 h-8" src="{{ asset('assets/svg/arrow-icon.svg') }}" alt="arrow">
            </a>
            <h1 class="text-2xl font-pilcrow font-pilcrow-bold text-black text-nowrap select-none">History</h1>
        </div>

        <!-- Current Target Card -->
@foreach ($targets as $target)
    <div class="bg-primary p-5 rounded-2xl border-2 border-black shadow-black mb-6">
        <div class="flex justify-between items-start mb-4">
            <div>
                <h2 class="text-lg text-white mb-1">{{ $target->title }}</h2>
                <p class="text-sm text-white">Timeline {{ $target->timeline }} Bulan</p>
            </div>
        </div>
        
        <div class="mb-4">
            <h3 class="text-sm text-white mb-1">Target Omzet</h3>
            <p class="text-xl text-white">
                Rp {{ number_format($target->current_omzet, 0, ',', '.') }} / Rp {{ number_format($target->target, 0, ',', '.') }}
            </p>
        </div>
        
        <div>
            <div class="flex items-center gap-3 mb-2">
                <div class="flex-1">
                    <div class="w-full bg-white rounded-full h-3">
                        <div class="bg-orange-500 h-3 rounded-full" style="width: {{ $target->progress }}%"></div>
                    </div>
                </div>
                <span class="text-sm text-white">{{ $target->progress }}%</span>
            </div>
        </div>
    </div>
@endforeach


        <!-- Action Icons -->
        <div class="flex justify-end gap-4 mb-6">
            <button class="w-6 h-6">
                <img class="w-full h-full" src="{{ asset('assets/svg/trash-icon.svg') }}" alt="Delete">
            </button>
            <button class="w-6 h-6">
                <img class="w-full h-full" src="{{ asset('assets/svg/edit-icon.svg') }}" alt="Edit">
            </button>
        </div>

        <!-- Section Title -->
        <h2 class="text-xl font-pilcrow font-pilcrow-bold text-black mb-4">Riwayat Target Omzetmu</h2>

        <!-- Target History Cards -->
        <div class="space-y-4">
            <!-- Omzet Periode 3 Card -->
            <div class="bg-primary p-5 rounded-2xl border-2 border-black shadow-black">
                <div class="mb-4">
                    <h2 class="text-lg font-pilcrow font-pilcrow-bold text-white mb-1">Omzet Periode 3</h2>
                    <p class="text-xs font-quicksand font-quicksand-regular text-white opacity-80">Jan 01/01/2025 - Mar 30/03/2025</p>
                </div>
                
                <div class="flex items-center justify-between">
                    <div class="flex-1">
                        <div class="text-xl font-quicksand font-quicksand-regular text-white mb-3">
                            5.000.000/10.000.000
                        </div>
                        
                        <div class="flex items-center gap-3">
                            <div class="flex-1">
                                <div class="w-full bg-white rounded-full h-3">
                                    <div class="bg-[#DD661D] h-3 rounded-full" style="width: 50%"></div>
                                </div>
                            </div>
                            <span class="text-sm font-quicksand font-quicksand-regular text-white">50%</span>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Omzet Periode 2 Card -->
            <div class="bg-primary p-5 rounded-2xl border-2 border-black shadow-black">
                <div class="mb-4">
                    <h2 class="text-lg font-pilcrow font-pilcrow-bold text-white mb-1">Omzet Periode 2</h2>
                    <p class="text-xs font-quicksand font-quicksand-regular text-white opacity-80">Nov 01/11/2024 - Dec 31/12/2024</p>
                </div>
                
                <div class="flex items-center justify-between">
                    <div class="flex-1">
                        <div class="text-xl font-quicksand font-quicksand-regular text-white mb-3">
                            250.000/1.000.000
                        </div>
                        
                        <div class="flex items-center gap-3">
                            <div class="flex-1">
                                <div class="w-full bg-white rounded-full h-3">
                                    <div class="bg-[#DD661D] h-3 rounded-full" style="width: 20%"></div>
                                </div>
                            </div>
                            <span class="text-sm font-quicksand font-quicksand-regular text-white">20%</span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</body>
</html>