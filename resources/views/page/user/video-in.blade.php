<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>{{ $video->title }}</title>
    @vite(['resources/css/app.css'])
</head>
<body class="bg-gray-100 text-gray-900">

    <div class="max-w-5xl mx-auto p-6">
        <!-- Back Button -->
    <div class="p-6">
        <div class="flex items-center">
            <a href="{{ url('/videos') }}" class="mr-4">
                <img class="w-8 h-8" src="{{ asset('assets/svg/arrow-icon.svg') }}" alt="arrow">
            </a>
            <h1 class="text-2xl font-pilcrow font-pilcrow-bold text-black select-none text-nowrap">Video</h1>
        </div>
    </div>

        <!-- Video Player -->
        <div class="bg-white rounded-2xl shadow-md overflow-hidden">
            <div class="relative aspect-video bg-black">
                @php
                    use Illuminate\Support\Str;
                    $isYoutube = preg_match('/(youtube\.com|youtu\.be)/', $video->link);
                @endphp

                @if ($isYoutube)
                    {{-- YouTube Embed --}}
                    @php
                        if (preg_match('/v=([^&]+)/', $video->link, $m)) {
                            $youtubeId = $m[1];
                        } elseif (preg_match('#youtu\.be/([^?]+)#', $video->link, $m)) {
                            $youtubeId = $m[1];
                        } else {
                            $youtubeId = null;
                        }
                    @endphp
                    @if ($youtubeId)
                        <iframe 
                            class="w-full h-full"
                            src="https://www.youtube.com/embed/{{ $youtubeId }}" 
                            frameborder="0"
                            allowfullscreen>
                        </iframe>
                    @endif
                @else
                    {{-- Local Video --}}
                    <video class="w-full h-full" controls>
                        <source src="{{ asset('storage/' . $video->link) }}" type="video/mp4">
                        Browser kamu tidak mendukung video.
                    </video>
                @endif
            </div>

            <!-- Video Info -->
            <div class="p-6">
                <h1 class="text-2xl font-bold mb-2">{{ $video->title }}</h1>               
                    <div class="flex items-center gap-4">
                    <!-- Thumbnail or Avatar -->
                    <div class="w-12 h-12 rounded-full overflow-hidden border-2 border-gray-300">
                        @if ($video->user->foto_link)
                            <img src="{{ asset('storage/' . $video->user->foto_link) }}" alt="{{ $video->user->name }}" class="w-full h-full object-cover">
                        @else
                            <div class="w-full h-full flex items-center justify-center bg-gray-300 text-gray-700 font-bold">
                                {{ strtoupper(substr($video->user->name, 0, 1)) }}
                            </div>
                        @endif
                    </div>

                    <div>
                        <p class="text-sm font-semibold">{{ $video->user->name }}</p>
                        <p class="text-gray-500">{{ $video->published_at->format('d M Y') }}</p>
                    </div>
                </div>
                @if ($video->category)
                    <p class="text-sm text-gray-600 mb-3">Kategori: {{ $video->category }}</p>
                @endif

                <p class="text-gray-800 mb-6">{{ $video->description ?? 'Tidak ada deskripsi.' }}</p>
            </div>
        </div>
    </div>

</body>
</html>
