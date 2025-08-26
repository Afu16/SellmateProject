<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Ebook</title>
    @vite(['resources/css/app.css'])
</head>
<body class="p-1">
<!-- Header -->
          <div class="flex p-6 items-center -mb-6">
            <a href="{{ url('/user') }}" class="mr-4">
           <img class="w-8 h-8" src="{{ asset('assets/svg/arrow-icon.svg') }}" alt="arrow">
            </a>
            <h1 class=" text-2xl font-bold text-black">Ebook Tefa</h1>
        </div>
<div class="pt-8 px-4">
    <div class="flex gap-5 mb-6">
        <button class="w-16 px-5 py-2 rounded-xl border-2 border-black shadow-black bg-secondary text-white font-pilcrow font-pilcrow-semibold  shadow transition-colors duration-200">Edukasi</button>
        <button class="w-16 px-5 py-2 rounded-xl border-2 border-black shadow-black text-black font-pilcrow font-pilcrow-semibold   bg-white shadow transition-colors duration-200">Inspirasi</button>
        <button class="w-16 px-5 py-2 rounded-xl border-2 border-black shadow-black text-black font-pilcrow font-pilcrow-semibold   bg-white shadow transition-colors duration-200">Tips</button>
    </div>
    <div class="grid grid-cols-1 gap-4">
        <!-- Card 1 -->
        <div class="relative rounded-xl overflow-hidden shadow-md bg-gray-900">
            <img src="{{ asset('assets/img/example-img.jpg') }}" alt="AI bersama tefa" class="w-full h-52 object-cover opacity-70">
            <div class="absolute inset-0 bg-gradient-to-t from-black/70 via-black/30 to-transparent"></div>
            <div class="absolute bottom-0 left-0 p-4 w-full">
                <h2 class="text-white font-semibold text-base mb-1">Pengertian dasar tentang AI bersama tefa</h2>
                <p class="text-white text-xs leading-tight line-clamp-2">Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.</p>
            </div>
        </div>
        <!-- Card 2 -->
        <div class="relative rounded-xl overflow-hidden shadow-md bg-gray-900">
            <img src="{{ asset('assets/img/it-career.jpg') }}" alt="Karir di bidang IT" class="w-full h-52 object-cover opacity-70">
            <div class="absolute inset-0 bg-gradient-to-t from-black/70 via-black/30 to-transparent"></div>
            <div class="absolute bottom-0 left-0 p-4 w-full">
                <h2 class="text-white font-semibold text-base mb-1">Memulai karir di bidang IT</h2>
                <p class="text-white text-xs leading-tight line-clamp-2">Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.</p>
            </div>
        </div>
        <!-- Card 3 -->
        <div class="relative rounded-xl overflow-hidden shadow-md bg-gray-900">
            <img src="{{ asset('assets/img/content-creator.jpg') }}" alt="Tips content creator" class="w-full h-52 object-cover opacity-70">
            <div class="absolute inset-0 bg-gradient-to-t from-black/70 via-black/30 to-transparent"></div>
            <div class="absolute top-0 left-0 p-2">
                <span class="bg-orange-400 text-white text-xs font-semibold px-3 py-1 rounded-full">Tips menjadi content creator</span>
            </div>
            <div class="absolute bottom-0 left-0 p-4 w-full">
                <p class="text-white text-xs leading-tight line-clamp-2 mt-2">Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.</p>
            </div>
        </div>
        <!-- Card 4 -->
        <div class="relative rounded-xl overflow-hidden shadow-md bg-gray-900">
            <img src="{{ asset('assets/img/wirausaha.jpg') }}" alt="Memulai wirausaha" class="w-full h-52 object-cover opacity-70">
            <div class="absolute inset-0 bg-gradient-to-t from-black/70 via-black/30 to-transparent"></div>
            <div class="absolute top-0 left-0 p-2">
                <span class="bg-white/80 text-gray-700 text-xs font-semibold px-3 py-1 rounded-full">Cara awal memulai Wirausaha</span>
            </div>
            <div class="absolute bottom-0 left-0 p-4 w-full">
    
</body>
</html>