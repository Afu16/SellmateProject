<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Article </title>
    @vite(['resources/css/app.css'])
</head>
<body>
<a href="{{ url('/articles') }}" class="absolute z-20 top-4 left-4">
    <img class="w-8 h-8" src="{{ asset('assets/svg/arrow-icon.svg') }}" alt="arrow">
</a>
<div class="relative">
    <img src="{{ asset('assets/img/' . $article->thumbnail) }}" alt="tumbnail" class="w-full h-[40vh] object-cover">
    <div class="absolute inset-0 bg-gradient-to-b from-black/60 via-black/30 to-transparent rounded-b-xl"></div>
    <div class="absolute top-[32vh] left-0 w-full px-5">
        <h1 class="text-white text-xl font-bold leading-tight drop-shadow-md">{{ $article->title }}</h1>
    </div>
</div>
<article class="z-10 -mt-8 bg-white w-full rounded-t-xl p-5 relative">
    <div class="flex items-center mb-4">
        <img src="{{ asset('assets/img/profile.png') }}" alt="profile" class="w-10 h-10 rounded-full border-2 border-white shadow-md">
        <div class="ml-3">
            <div class="font-semibold text-gray-800 leading-tight">{{ $article->author ?? 'Anonim' }}</div>
            <div class="text-xs text-gray-500">Posted {{ $article->created_at->format('d M Y') }}</div>
        </div>
    </div>
    <p class="text-gray-700 text-sm leading-relaxed">
        {!! nl2br(e($article->content)) !!}
    </p>
</article>

</body>
</html>