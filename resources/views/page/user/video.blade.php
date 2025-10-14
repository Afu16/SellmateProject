<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Video</title>
    @vite('resources/css/app.css')
</head>
<body class="bg-white">
    <div class="p-6">
        <!-- Header -->
        <div class="flex items-center justify-between mb-6">
            <div class="flex items-center w-full">
                <a href="{{ url('/dashboard') }}" class="mr-4">
                    <img class="w-8 h-8" src="{{ asset('assets/svg/arrow-icon.svg') }}" alt="arrow">
                </a>
                <h1 class="text-2xl font-pilcrow font-pilcrow-bold text-black select-none text-nowrap">Video</h1>
                <div class="absolute flex top-4 right-6 items-center border-2 border-black bg-white rounded-xl shadow-black shadow-md py-1 px-5 w-56">
                    <div class="flex items-center">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 text-black" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z" />
                        </svg>
                    </div>
                    <input type="search" name="search" id="search" placeholder="Search" class="w-full text-sm font-quicksand font-quicksand-regular focus:border-none focus:outline-none focus:ring-0 border-0 bg-transparent">
                </div>
            </div>
        </div>
        
        <!-- Tab Navigation -->
        <div class="flex gap-[18vw] mb-6">
            <button class=" w-56 px-6 py-2 rounded-xl shadow-black border-2 border-black bg-[#DD661D] text-white font-pilcrow font-pilcrow-bold shadow-md">Inspirasi</button>
            <button class=" w-56 px-6 py-2 rounded-xl shadow-black border-2 border-black text-black font-pilcrow font-pilcrow-bold bg-white shadow-md">Tips</button>
        </div>
        
        <!-- Video Cards -->
        <div class="space-y-4">
            @foreach($videos as $video)
            <a href="{{ route('videos.show', $video->id) }}">
                <div class="bg-[#3C096C] rounded-2xl border-2 border-black shadow-black overflow-hidden">
                    <div class="relative p-4 rounded-xl">
                        <img
                            src="{{ $video->thumbnail ? (Str::startsWith($video->thumbnail, 'http') ? $video->thumbnail : asset('storage/' . $video->thumbnail)) : asset('images/no-thumbnail.png') }}"
                            alt="Thumbnail"
                            class="w-full h-48 object-cover rounded-lg"
                        />

                        <!-- Text Overlay -->
                        <div class="absolute bottom-4 left-4 text-white">
                            <h3 class="text-sm font-pilcrow font-pilcrow-heavy mb-1">{{ $video->title }}</h3>
                            <p class="text-sm font-quicksand font-quicksand-regular">Author: {{ $video->user->name ?? 'Anonim' }}</p>
                        </div>

                        <!-- Duration -->
                        <div class="absolute bottom-4 right-4 bg-white text-black px-2 py-1 rounded text-xs font-quicksand font-quicksand-regular">
                            {{ $video->duration ?? '--:--' }}
                        </div>
                    </div>

                    <!-- Deskripsi -->
                    <div class="p-4">
                        <p class="text-sm font-quicksand font-quicksand-regular text-white mb-3">{{ $video->description }}</p>
                        <div class="flex justify-end">
                            <a href="{{ $video->link }}" target="_blank" class="w-6 h-6">
                                <svg class="w-full h-full text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                        d="M8.684 13.342C8.886 12.938 9 12.482 9 12c0-.482-.114-.938-.316-1.342m0 2.684a3 3 0 110-2.684m0 2.684l6.632 3.316m-6.632-6l6.632-3.316m0 0a3 3 0 105.367-2.684 3 3 0 00-5.367 2.684zm0 9.316a3 3 0 105.367 2.684 3 3 0 00-5.367-2.684z"></path>
                                </svg>
                            </a>
                        </div>
                    </div>
                </div>
            </a>
            @endforeach
        </div>
     
    </div>
</body>
</html>
