<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Target Omzet</title>
    @vite('resources/js/app.js', 'resources/css/app.css')
</head>
<body>
    <div class="p-6">
          <!-- Header -->
          <div class="flex items-center mb-6">
            <a href="{{ url('/user') }}" class="mr-4">
           <img class="w-8 h-8" src="{{ asset('assets/svg/arrow-icon.svg') }}" alt="arrow">
            </a>
            <h1 class="text-2xl font-inter font-inter-bold text-black">Detail Target Omzet</h1>
        </div>

        {{-- Omzet Card --}}
        <div class="bg-primary p-5 rounded-xl border-2 border-black shadow-black">
            <div class="flex flex-row gap-10">
                <div class="mt-3">
                    <p class="text-md text-white font-inter-semibold">Omzet Periode 1</p>
                    <p class="text-sm text-white font-inter-medium">Timeline 3 bulan</p>
                </div>
                <div class="bg-quaternary rounded-full ml-20 h-16 w-16">
                    <img class="mx-auto mt-1.5 w-12 h-12" src="{{ asset('assets/svg/targetArrow-icon.svg') }}" alt="Target Arrow">
                </div>
            </div>
            <h3 class="text-md font-inter font-inter-semibold text-white mt-5">Target Omzet</h3>
            <h1 class="text-lg font-inter font-inter-bold text-white">Rp. 10.000.000</h1>

            <div>
                <div class="flex justify-between font-quicksand font-quicksand-regular text-xs text-white mt-2 mb-2">
                    <span>On Progress</span>
                    <span>80%</span>
                </div>
                <div class="w-full bg-gray-200 rounded-full h-3 mb-3">
                    <div class="bg-secondary h-3 rounded-full" style="width: 80%"></div>
                </div>
                <div class="flex justify-between text-sm">
                    <span class="font-inter font-inter-semibold text-white">Rp 0,-</span>
                    <span class="font-inter font-inter-semibold text-white">Rp 10.000.000</span>
                </div>
            </div>
        </div>
    </div>
</body>
</html>