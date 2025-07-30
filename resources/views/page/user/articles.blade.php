<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Live Host Cards</title>
    <script src="https://cdn.tailwindcss.com"></script>
    @vite('resources/css/app.cssnbf')
</head>
<body>
        <!-- Header -->
        <div class="p-6">
            <div class="flex items-center mb-2  ">
                <a href="{{ url('/user') }}" class="mr-4">
                    <img class="w-8 h-8" src="{{ asset('assets/svg/arrow-icon.svg') }}" alt="arrow">
                </a>
                <h1 class="text-2xl font-inter font-inter-bold text-black">Top Rating</h1>
            </div>
        </div>
    <div class=" p-4 space-y-6 flex flex-col items-center">   
        <div class="relative w-full max-w-sm rounded-xl overflow-hidden shadow-lg bg-white">
        <img class="w-full h-48 object-cover" src="{{ asset('assets/img/example-img.jpg') }}" alt="Man hosting a live stream">

        <div class="absolute inset-x-0 bottom-0 bg-gradient-to-t from-black via-black/70 to-transparent h-1/2"></div>

        <div class="absolute bottom-0 left-0 p-4 text-white w-full">
            <h3 class="text-xl font-semibold mb-1">Cara menjadi host live yang sukses</h3>
            <div class="flex items-center justify-between text-sm">
                <span class="text-gray-200">Baca sekarang <span class="font-medium">🕒 15 min read</span></span>
                <button class="bg-white/20 p-2 rounded-full backdrop-blur-sm hover:bg-white/30 transition-colors">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 text-white" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M8.684 13.342C8.882 13.065 9 12.729 9 12s-.118-.935-.316-1.258m0 2.516a3 3 0 010-2.516m0 2.516v2.516c0 .817.65 1.472 1.458 1.472h1.305C13.597 15 15 13.597 15 11.829V8.171c0-1.768-1.403-3.171-3.137-3.171h-1.305c-.808 0-1.458.655-1.458 1.472v2.516m0 0V9.342m0-2.516A3 3 0 019 6c0-.817.65-1.472 1.458-1.472h1.305c1.734 0 3.137 1.403 3.137 3.172v3.656m-6.507 1.638a3 3 0 01-1.458 1.472h-1.305C6.403 15 5 13.597 5 11.829v-3.657c0-1.768 1.403-3.172 3.137-3.172h1.305c.808 0 1.458.655 1.458 1.472v2.516m0 0V9.342m0-2.516a3 3 0 01-1.458 1.472h-1.305C6.403 15 5 13.597 5 11.829v-3.657c0-1.768 1.403-3.172 3.137-3.172h1.305c.808 0 1.458.655 1.458 1.472v2.516" />
                    </svg>
                </button>
            </div>
        </div>
    </div>

    <div class="relative w-full max-w-sm rounded-xl overflow-hidden shadow-lg bg-white">
        <img class="w-full h-48 object-cover" src="{{ asset('assets/img/example-img.jpg') }}" alt="Woman preparing for a live stream">

        <div class="absolute inset-x-0 bottom-0 bg-gradient-to-t from-black via-black/70 to-transparent h-1/2"></div>

        <div class="absolute bottom-0 left-0 p-4 text-white w-full">
            <h3 class="text-xl font-semibold mb-1">Persiapan menjadi Host live</h3>
            <div class="flex items-center justify-between text-sm">
                <span class="text-gray-200">Baca sekarang <span class="font-medium">🕒 1 hour read</span></span>
                <button class="bg-white/20 p-2 rounded-full backdrop-blur-sm hover:bg-white/30 transition-colors">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 text-white" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M8.684 13.342C8.882 13.065 9 12.729 9 12s-.118-.935-.316-1.258m0 2.516a3 3 0 010-2.516m0 2.516v2.516c0 .817.65 1.472 1.458 1.472h1.305C13.597 15 15 13.597 15 11.829V8.171c0-1.768-1.403-3.171-3.137-3.171h-1.305c-.808 0-1.458.655-1.458 1.472v2.516m0 0V9.342m0-2.516A3 3 0 019 6c0-.817.65-1.472 1.458-1.472h1.305c1.734 0 3.137 1.403 3.137 3.172v3.656m-6.507 1.638a3 3 0 01-1.458 1.472h-1.305C6.403 15 5 13.597 5 11.829v-3.657c0-1.768 1.403-3.172 3.137-3.172h1.305c.808 0 1.458.655 1.458 1.472v2.516m0 0V9.342m0-2.516a3 3 0 01-1.458 1.472h-1.305C6.403 15 5 13.597 5 11.829v-3.657c0-1.768 1.403-3.172 3.137-3.172h1.305c.808 0 1.458.655 1.458 1.472v2.516" />
                    </svg>
                </button>
            </div>
        </div>
    </div>
</div>
</body>
</html>