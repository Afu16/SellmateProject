<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Profile</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body class="bg-gray-100">
    <!-- Header -->
    <div class="bg-white p-6">
        <div class="flex items-center">
            <a href="{{ url('/dashboard') }}" class="mr-4">
                <img class="w-8 h-8" src="{{ asset('assets/svg/arrow-icon.svg') }}" alt="arrow">
            </a>
            <h1 class="text-2xl font-pilcrow font-pilcrow-bold text-black flex-1 ">Profile</h1>
        </div>
    </div>

    <!-- Profile Picture -->
    <div class="bg-white p-6">
        <div class="flex justify-center mb-6">
            <div class="relative">
                <img src="{{ asset('assets/img/profile/photo.png') }}" alt="Profile Picture" class="w-32 h-32 z-0 rounded-full object-cover">
                <div class="absolute bottom-0 right-0 bg-gray-400 rounded-lg p-2">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 text-black z-10" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 9a2 2 0 012-2h.93a2 2 0 001.664-.89l.812-1.22A2 2 0 0110.07 4h3.86a2 2 0 011.664.89l.812 1.22A2 2 0 0018.07 7H19a2 2 0 012 2v9a2 2 0 01-2 2H5a2 2 0 01-2-2V9z" />
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 13a3 3 0 11-6 0 3 3 0 016 0z" />
                    </svg>
                </div>
            </div>
        </div>
    </div>

    <!-- Informasi Pribadi Section -->
    <div class="bg-white p-6">
        <h2 class="text-xl font-pilcrow font-pilcrow-bold text-black mb-4">Informasi Pribadi</h2>
        <div class="bg-primary border-2 border-black shadow-black rounded-lg p-6 mb-6">
            <!-- Name -->
            <div class="mb-2 py-2">
                <label class="text-sm text-white font-pilcrow font-pilcrow-heavy ">Name</label>
                    <div class="flex p-3 items-center bg-white rounded-lg h-10">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 text-gray-500 mr-3" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15.232 5.232l3.536 3.536m-2.036-5.036a2.5 2.5 0 113.536 3.536L6.5 21.036H3v-3.572L16.732 3.732z" />
                        </svg>
                        <input type="text" value="Siska Amelia" class="w-full text-sm font-quicksand font-quicksand-regular focus:border-none focus:outline-none focus:ring-0 border-0 bg-transparent" readonly>
                    </div>
            </div>

            <!-- Email -->
            <div class="mb-2 py-2">
                <label class="text-sm text-white font-pilcrow font-pilcrow-heavy ">Email</label>
                <div class="flex items-center p-3 bg-white rounded-lg h-10">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 text-gray-500 mr-3" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 8l7.89 4.26a2 2 0 002.22 0L21 8M5 19h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z" />
                        </svg>
                        <input type="email" value="Siskaamella@gmail.com" class="w-full text-sm font-quicksand font-quicksand-regular focus:border-none focus:outline-none focus:ring-0 border-0 bg-transparent" readonly>
                    </div>
            </div>

            <!-- Phone -->
            <div class="mb-2 py-2">
                <label class="text-xs text-white font-pilcrow font-pilcrow-heavy ">Phone</label>
                <div class="flex items-center p-3 bg-white rounded-lg h-10">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 text-gray-500 mr-3" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 5a2 2 0 012-2h3.28a1 1 0 01.948.684l1.498 4.493a1 1 0 01-.502 1.21l-2.257 1.13a11.042 11.042 0 005.516 5.516l1.13-2.257a1 1 0 011.21-.502l4.493 1.498a1 1 0 01.684.949V19a2 2 0 01-2 2h-1C9.716 21 3 14.284 3 6V5z" />
                        </svg>
                        <input type="tel" value="082484333323" class="w-full text-sm font-quicksand font-quicksand-regular focus:border-none focus:outline-none focus:ring-0 border-0 bg-transparent" readonly>
                    </div>
            </div>

            <!-- Location -->
            <div class="mb-2 py-2">
                <label class="text-sm text-white font-pilcrow font-pilcrow-heavy ">Location</label>
                    <div class="flex bg-white rounded-lg h-10 items-center p-3"> 
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 text-gray-500 mr-3" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17.657 16.657L13.414 20.9a1.998 1.998 0 01-2.827 0l-4.244-4.243a8 8 0 1111.314 0z" />
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 11a3 3 0 11-6 0 3 3 0 016 0z" />
                        </svg>
                        <input type="text" value="Bandung, Indonesia" class="w-full text-sm font-quicksand font-quicksand-regular focus:border-none focus:outline-none focus:ring-0 border-0 bg-transparent" readonly>
                    </div>
            </div>

            <!-- School -->
            <div class="mb-2 py-2">
                <label class="text-sm text-white font-pilcrow font-pilcrow-heavy ">School</label>
                    <div class="flex bg-white rounded-lg h-10 items-center p-3">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 text-gray-500 mr-3" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 14l9-5-9-5-9 5 9 5z" />
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 14l6.16-3.422a12.083 12.083 0 01.665 6.479A11.952 11.952 0 0012 20.055a11.952 11.952 0 00-6.824-2.998 12.078 12.078 0 01.665-6.479L12 14z" />
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 14l9-5-9-5-9 5 9 5zm0 0l6.16-3.422a12.083 12.083 0 01.665 6.479A11.952 11.952 0 0012 20.055a11.952 11.952 0 00-6.824-2.998 12.078 12.078 0 01.665-6.479L12 14z" />
                        </svg>
                        <input type="text" value="SMK BPI Bandung" class="w-full text-sm font-quicksand font-quicksand-regular focus:border-none focus:outline-none focus:ring-0 border-0 bg-transparent" readonly>
                    </div>
            </div>

            <!-- Department -->
            <div class="mb-2 py-2">
                <label class="text-sm text-white font-pilcrow font-pilcrow-heavy ">Department</label>
                    <div class="flex bg-white rounded-lg h-10 items-center p-3">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 text-gray-500 mr-3" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 21V5a2 2 0 00-2-2H7a2 2 0 00-2 2v16m14 0h2m-2 0h-5m-9 0H3m2 0h5M9 7h1m-1 4h1m4-4h1m-1 4h1m-5 10v-5a1 1 0 011-1h2a1 1 0 011 1v5m-4 0h4" />
                    </svg>
                        <input type="text" value="RPL" class="w-full text-sm font-quicksand font-quicksand-regular focus:border-none focus:outline-none focus:ring-0 border-0 bg-transparent" readonly>
                </div>
            </div>
        </div>
    </div>

    <!-- Keamanan Akun Section -->
    <div class="bg-white p-6">
        <h2 class="text-xl font-pilcrow font-pilcrow-bold text-black mb-4">Keamanan Akun</h2>
        <div class="bg-primary shadow-black border-2 border-black rounded-lg p-6 mb-6">
            <!-- Username -->
            <div class="mb-2 py-2">
                    <div class="flex items-center bg-white border-2 border-black shadow-black rounded-lg p-3">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 text-gray-500 mr-3" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z" />
                        </svg>
                        <input type="text" value="Siska Amelia02" class="w-full text-sm font-quicksand font-quicksand-regular focus:border-none focus:outline-none focus:ring-0 border-0 bg-transparent" readonly>
                    </div>
            </div>

            <!-- Password -->
            <div class="mb-2 py-2">
                    <div class="flex items-center bg-white border-2 border-black shadow-black rounded-lg p-3">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 text-gray-500 mr-3" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 15v2m-6 4h12a2 2 0 002-2v-6a2 2 0 00-2-2H6a2 2 0 00-2 2v6a2 2 0 002 2zm10-10V7a4 4 0 00-8 0v4h8z" />
                        </svg>
                        <input type="password" value="********" class="w-full text-sm font-quicksand font-quicksand-regular focus:border-none focus:outline-none focus:ring-0 border-0 bg-transparent" readonly>
                    </div>
            </div>
        </div>
    </div>

    <!-- Action Buttons -->
    <div class="bg-white p-6">
        <div class="flex gap-4">
            <button class="flex-1 bg-white shadow-black border-2 border-black text-black font-pilcrow font-pilcrow-semibold py-3 rounded-lg transition-colors duration-200 hover:bg-gray-50">
                Batal
            </button>
            <button class="flex-1 bg-secondary text-white font-pilcrow font-pilcrow-semibold py-3 rounded-lg transition-colors duration-200 hover:bg-tertiary border-2 border-black shadow-black ">
                Simpan
            </button>
        </div>
    </div>
</body>
</html>
