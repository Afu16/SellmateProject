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
            <a href="{{ url('/user') }}" class="mr-4">
           <img class="w-8 h-8" src="{{ asset('assets/svg/arrow-icon.svg') }}" alt="arrow">
            </a>
            <h1 class="text-2xl font-inter font-inter-bold text-black">Top Rating</h1>
        </div>

        <div class="w-full max-w-sm">
            <div class="flex justify-between items-center  mb-6">
                {{-- <div class="relative flex items-center border-2 border-black shadow-black  bg-quaternary rounded-xl shadow-md px-1 py-2 flex-grow mr-2">
                <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 text-gray-500 mr-2" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z" />
                </svg>
                <input type="text" placeholder="Search" class="bg-quaternary flex-grow outline-none outline-quaternary ring-quaternary text-gray-700 text-lg font-medium">
            </div> --}}

            <!-- Search Bar -->
            <div class="relative flex items-center border-2 border-black bg-white w-40 rounded-3xl">
                <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4 text-black mr-2" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z" />
                </svg>
                {{-- <input type="text" placeholder="Search" class="bg-transparent outline-none text-gray-400 text-sm font-quicksand font-quicksand-regular"> --}}
                <input type="search" name="search" id="search"    class="rounded-full focus:border-none focus:outline-none focus:outline-0 focus:outline-transparent ring-transparent  border-2 border-transparent bg-transparent">
            </div>
            
            <div class="relative">
                <select class="appearance-none border-2 border-black shadow-black bg-orange-500 text-white font-semibold py-4 px-5 rounded-xl shadow-md pr-10 outline-none">
                    <option>Bulan Ini</option>
                    <option>Bulan Lalu</option>
                    <option>Tahun Ini</option>
                </select>
            </div>
        </div> 
    </div>

    <div class="border-2 border-black rounded-2xl w-screen max-w-md mx-auto shadow-black p-4 bg-white">
        <!-- Header Table -->
        <div class="flex justify-between items-center px-2 mb-2">
            <p class="font-inter font-inter-medium text-black w-1/3">Nama</p>
            <p class="font-inter font-inter-medium text-black w-1/9 relative left-7 text-center">Nilai</p>
            <p class="font-inter font-inter-medium text-black w-1/3 text-right">Total Omzet</p>
        </div>
        <!-- List Leaderboard -->
        <div class="flex flex-col gap-3">
            <!-- 1 -->
            @foreach ($topRating as $item)
                
            <div class="flex items-center bg-primary shadow-black border-2 border-black rounded-xl px-3 py-2 shadow-md">
                <img src="{{ asset('assets/img/profile/elisa.jpg') }}" alt="Elisa" class="w-10 h-10 rounded-full border-2 border-white object-cover mr-3">
                <div class="flex-1">
                    <p class="text-white font-inter font-inter-semibold leading-4">{{ $item->name }}</p>
                    <span class="text-xs text-quaternary font-quicksand font-quicksand-regular">Pemasaran</span>
                </div>
                <div class="w-1/6 text-center">
                    <span class="text-white font-inter font-inter-bold text-lg">A</span>
                </div>
                <div class="w-1/3 text-right">
                    <span class="text-white font-inter font-inter-semibold">Rp 850.000</span>
                </div>
            </div>
            @endforeach

    </div>


</div>
</body>
</html>