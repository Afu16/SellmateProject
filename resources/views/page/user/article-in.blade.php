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
    <a href="{{ url('/user') }}" class="absolute z-20 top-4 left-4">
        <img class="w-8 h-8" src="{{ asset('assets/svg/arrow-icon.svg') }}" alt="arrow">
    </a>
    <div class="relative">
        <img src="{{ asset('assets/img/example-img.jpg') }}" alt="tumbnail" class="w-full h-[40vh] object-cover">
        <div class="absolute inset-0 bg-gradient-to-b from-black/60 via-black/30 to-transparent rounded-b-xl"></div>
        <div class="absolute top-[32vh] left-0 w-full px-5">
            <h1 class="text-white text-xl font-bold leading-tight drop-shadow-md">Cara menjadi host live yang sukses</h1>
        </div>
    </div>
    <article class="z-10 -mt-8 bg-white w-full rounded-t-xl p-5 relative">
        <div class="flex items-center mb-4">
            <img src="{{ asset('assets/img/profile.png') }}" alt="profile" class="w-10 h-10 rounded-full border-2 border-white shadow-md">
            <div class="ml-3">
                <div class="font-semibold text-gray-800 leading-tight">Ferdi sambo</div>
                <div class="text-xs text-gray-500">Posted 16 Feb 2025</div>
            </div>
        </div>
        <p class="text-gray-700 text-sm leading-relaxed">
            Lorem ipsum dolor sit amet consectetur. Ac hac amet amet libero platea lorem iaculis quis volutpat. Nibh magna amet nibh accumsan in. Imperdiet metus pellentesque enim convallis pulvinar porta odio augue com. Turpis nulla accumsan in ac nisi elementum molestie donec. Morbi auctor purus vulputate non egestas quam a. Magna cras lectus in vitae enim morbi net. Eget phasellus neque gravida id non.<br><br>
            Tincidunt neque vitae nulla est elementum fermentum ornare fames ipsum. Morbi lectus sed vitae eget. Sollicitudin a in fusi platea cursus quis lorem praesent.<br><br>
            Et egestas euismod lobortis nulla imperdiet. Sit purus magnis etiam enim. Est pharetra quis vulputate odio ultrices. Lobortis ut id et. Enim mauris volutpat ac eleifend eu cursus. Nunc et est mauris lobortis mauris molestie pharetra faucibus.
        </p>
    </article>
</body>
</html>