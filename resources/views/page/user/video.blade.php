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
            <div class="flex items-center">
                <a href="{{ url('/user') }}" class="mr-4">
                    <img class="w-8 h-8" src="{{ asset('assets/svg/arrow-icon.svg') }}" alt="arrow">
                </a>
                <h1 class="text-2xl font-pilcrow font-pilcrow-bold text-black">Video</h1>
            </div>
            
            <!-- Search Bar -->
            <div class="relative flex items-center border-2 border-black bg-white rounded-3xl py-2 px-2 w-40 shadow-black">
                <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4 text-black mr-2" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z" />
                </svg>
                <input type="text" placeholder="Search" class="bg-transparent outline-none text-gray-400 text-sm font-quicksand font-quicksand-regular">
            </div>
        </div>
        
        <!-- Tab Navigation -->
        <div class="flex gap-3 mb-6">
            <button class="px-6 py-2 rounded-xl border-2 border-black bg-[#DD661D] text-white font-pilcrow font-pilcrow-bold shadow-md">Inspirasi</button>
            <button class="px-6 py-2 rounded-xl border-2 border-black text-black font-pilcrow font-pilcrow-bold bg-white shadow-md">Tips</button>
        </div>
        
        <!-- Video Cards -->
        <div class="space-y-4">
            <!-- Video Card 1 -->
            <div class="bg-[#3C096C] rounded-2xl border-2 border-black shadow-black overflow-hidden">
                <div class="relative p-4 rounded-xl  ">
                    <img src="{{ asset('assets/img/example-img.jpg') }}" alt="Video thumbnail" class="w-full h-48 object-cover">
                    
                    <!-- Text Overlay on Thumbnail -->
                    <div class="absolute bottom-4 left-4 text-white">
                        <h3 class="text-sm font-pilcrow font-pilcrow-heavy mb-1">Bagaimana cara menawarkan jasa developer</h3>
                        <h3 class="text-lg font-pilcrow font-pilcrow-bold mb-1">website</h3>
                        <p class="text-sm font-quicksand font-quicksand-regular">Author: Joncton</p>
                    </div>
                    
                    <!-- Duration Overlay -->
                    <div class="absolute bottom-4 right-4 bg-white text-black px-2 py-1 rounded text-xs font-quicksand font-quicksand-regular">
                        10:24
                    </div>
                </div>
                
                <!-- Description Section -->
                <div class="p-4">
                    <p class="text-sm font-quicksand font-quicksand-regular text-white mb-3">Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.</p>
                    <div class="flex justify-end">
                        <button class="w-6 h-6">
                            <svg class="w-full h-full text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8.684 13.342C8.886 12.938 9 12.482 9 12c0-.482-.114-.938-.316-1.342m0 2.684a3 3 0 110-2.684m0 2.684l6.632 3.316m-6.632-6l6.632-3.316m0 0a3 3 0 105.367-2.684 3 3 0 00-5.367 2.684zm0 9.316a3 3 0 105.367 2.684 3 3 0 00-5.367-2.684z"></path>
                            </svg>
                        </button>
                    </div>
                </div>
            </div>

            <!-- Video Card 2 -->
            <div class="bg-[#3C096C] rounded-2xl border-2 border-black shadow-black overflow-hidden">
                <div class="relative p-4 rounded-xl  ">
                    <img src="{{ asset('assets/img/example-img.jpg') }}" alt="Video thumbnail" class="w-full h-48 object-cover">
                    
                    <!-- Text Overlay on Thumbnail -->
                    <div class="absolute bottom-4 left-4 text-white">
                        <h3 class="text-sm font-pilcrow font-pilcrow-heavy mb-1">Menjadi host live fulltime di rumah</h3>
                        <p class="text-sm font-quicksand font-quicksand-regular">Author: Joncton</p>
                    </div>
                    
                    <!-- Duration Overlay -->
                    <div class="absolute bottom-4 right-4 bg-white text-black px-2 py-1 rounded text-xs font-quicksand font-quicksand-regular">
                        25:21
                    </div>
                </div>
                
                <!-- Description Section -->
                <div class="p-4">
                    <p class="text-sm font-quicksand font-quicksand-regular text-white mb-3">Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.</p>
                    <div class="flex justify-end">
                        <button class="w-6 h-6">
                            <svg class="w-full h-full text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8.684 13.342C8.886 12.938 9 12.482 9 12c0-.482-.114-.938-.316-1.342m0 2.684a3 3 0 110-2.684m0 2.684l6.632 3.316m-6.632-6l6.632-3.316m0 0a3 3 0 105.367-2.684 3 3 0 00-5.367 2.684zm0 9.316a3 3 0 105.367 2.684 3 3 0 00-5.367-2.684z"></path>
                            </svg>
                        </button>
                    </div>
                </div>
            </div>

            <!-- Video Card 3 -->
            <div class="bg-[#3C096C] rounded-2xl border-2 border-black shadow-black overflow-hidden">
                <div class="relative p-4 rounded-xl  ">
                    <img src="{{ asset('assets/img/example-img.jpg') }}" alt="Video thumbnail" class="w-full h-48 object-cover">
                    
                    <!-- Text Overlay on Thumbnail -->
                    <div class="absolute bottom-4 left-4 text-white">
                        <h3 class="text-sm font-pilcrow font-pilcrow-heavy mb-1">Membesarkan Tefa di dunia tataboga</h3>
                        <p class="text-sm font-quicksand font-quicksand-regular">Author: Ronald</p>
                    </div>
                    
                    <!-- Duration Overlay -->
                    <div class="absolute bottom-4 right-4 bg-white text-black px-2 py-1 rounded text-xs font-quicksand font-quicksand-regular">
                        20:13
                    </div>
                </div>
                
                <!-- Description Section -->
                <div class="p-4">
                    <p class="text-sm font-quicksand font-quicksand-regular text-white mb-3">Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.</p>
                    <div class="flex justify-end">
                        <button class="w-6 h-6">
                            <svg class="w-full h-full text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8.684 13.342C8.886 12.938 9 12.482 9 12c0-.482-.114-.938-.316-1.342m0 2.684a3 3 0 110-2.684m0 2.684l6.632 3.316m-6.632-6l6.632-3.316m0 0a3 3 0 105.367-2.684 3 3 0 00-5.367 2.684zm0 9.316a3 3 0 105.367 2.684 3 3 0 00-5.367-2.684z"></path>
                            </svg>
                        </button>
                    </div>
                </div>
            </div>
        </div>
    </div>
</body>
</html>
