<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Video</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body class="p-6">
    <div class="flex items-center mb-6">
        <a href="{{ url('/user') }}" class="mr-4">
            <img class="w-8 h-8" src="{{ asset('assets/svg/arrow-icon.svg') }}" alt="arrow">
        </a>
        <h1 class="text-2xl font-bold text-black">Video</h1>
    </div>
    
    <div class="flex justify-between items-center mb-6">
        <div class="relative flex items-center border-2 border-black bg-gray-100 rounded-xl shadow-md py-2 flex-grow mr-2">
            <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 text-gray-500 mr-2" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z" />
            </svg>
            <input type="text" placeholder="Search" class="bg-transparent flex-grow outline-none text-gray-700 text-lg font-medium">
        </div>
    </div>
    
    <div class="flex gap-3 mb-6">
        <button class="px-6 py-2 rounded-xl border-2 border-black bg-secondary text-white font-semibold shadow-md transition-colors duration-200 hover:bg-secondary">Inspirasi</button>
        <button class="px-6 py-2 rounded-xl border-2 border-black text-black font-semibold bg-white shadow-md transition-colors duration-200 hover:bg-gray-50">Tips</button>
    </div>
    
    <div class="flex flex-col">
        <div class="bg-primary p-2 rounded-lg">
            <div class="w-full">
                <img src="{{ asset('assets/img/example-img.jpg') }}" alt="name of image" class="w-full h-auto rounded">
            </div>
        </div>
    </div>
</body>
</html>