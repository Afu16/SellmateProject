<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Article</title>
    <script src="https://cdn.tailwindcss.com"></script>
    @vite('resources/css/app.css')
</head>
<body>
    <!-- Header -->
    <div class="p-6">
        <div class="flex items-center">
            <a href="{{ url('/user') }}" class="mr-4">
                <img class="w-8 h-8" src="{{ asset('assets/svg/arrow-icon.svg') }}" alt="arrow">
            </a>
            <h1 class="text-2xl font-inter font-inter-bold text-black">Artikel</h1>
        </div>
    </div>

    <div class="p-4 space-y-6 flex flex-col items-center">
    @foreach($articles as $article)
    <div class="relative h-52 w-full max-w-sm rounded-xl overflow-hidden shadow-lg bg-white">
        <a href="{{ route('articles.show', $article->id) }}">
            <img class="w-full h-48 object-cover" src="{{ asset('assets/img/' . $article->thumbnail) }}" alt="{{ $article->title }}">
        </a>

        <div class="absolute inset-x-0 bottom-0 bg-gradient-to-t from-black via-black/70 to-transparent h-1/2"></div>

        <div class="absolute bottom-0 left-0 p-4 text-white w-full">
            <h3 class="text-xl font-semibold mb-1">{{ $article->title }}</h3>
            <div class="flex items-center justify-between text-sm">
                <span class="text-gray-200">Baca sekarang <span class="font-medium">🕒 15 min read</span></span>

                                   <a href="#" class="bg-white/20 p-2 rounded-full backdrop-blur-sm hover:bg-white/30 transition-colors">
                            <svg class="w-5 h-5 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8.684 13.342C8.886 12.938 9 12.482 9 12c0-.482-.114-.938-.316-1.342m0 2.684a3 3 0 110-2.684m0 2.684l6.632 3.316m-6.632-6l6.632-3.316m0 0a3 3 0 105.367-2.684 3 3 0 00-5.367 2.684zm0 9.316a3 3 0 105.367 2.684 3 3 0 00-5.367-2.684z"></path>
                            </svg>
                    </a>

            </div>
        </div>
    </div>
    @endforeach
    </div>
</body>
</html>
