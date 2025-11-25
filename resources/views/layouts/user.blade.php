<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>User</title>
    @vite('resources/js/app.js', 'resources/css/app.css')
</head>
<body>
    <div class="bg-[#f5f7fa] min-h-screen">
        <div class="bg-primary w-full p-5 shadow-sm flex flex-row gap-10 min-h-[15svh]">
            <div class="mt-5 sm:mt-3">
                <h1 class="text-[30px] hidden md:block mt-[1.5vh] sm:text-lg md:text-3xl font-pilcrow font-pilcrow-rounded text-white">SellMate</h1>
            </div>
            <div class="mt-0 ml-auto">
                <button class="flex items-center gap-3 p-2 rounded-xl shadow-secondary bg-secondary border-2 border-black w-40 h-[7vh] md:w-48 md:h-14 xl:w-56 xl:h-16">
                    <div class="flex flex-col leading-tight">
                        <span class="text-xs font-pilcrow font-pilcrow-semibold text-black">User</span>
                    </div>
                    <div class="w-10 h-10 rounded-full border-2 border-black flex items-center justify-center bg-gray-300 text-black font-bold overflow-hidden">
                        <span>👤</span>
                    </div>
                </button>
            </div>
        </div>

        <div class="flex flex-row">
            <div class="w-[15%] -ml-2 flex flex-col border-r-2 h-screen border-black">
                <a href="/user/dashboard" class="{{ request()->path() == 'user/dashboard' ? 'bg-gray-300' : '' }} flex items-center px-4 py-3 text-[1vw] text-black hover:bg-gray-100 transition-colors w-full">
                    <img src="/assets/svg/dashboard-icon.svg" alt="Dashboard" class="w-[2vw] h-[2vh] mr-1">Dashboard
                </a>
                <a href="/user/product" class="{{ request()->path() == 'user/product' ? 'bg-gray-300' : '' }} flex items-center px-4 py-3 text-[1vw] text-black hover:bg-gray-100 transition-colors w-full">
                    <img src="/assets/svg/product-icon.svg" alt="Produk" class="w-[2vw] h-[2vh] mr-1">Produk
                </a>
                <a href="/user/omzet" class="{{ request()->path() == 'user/omzet' ? 'bg-gray-300' : '' }} flex items-center px-4 py-3 text-[1vw] text-black hover:bg-gray-100 transition-colors w-full">
                    <img src="/assets/svg/totalOmzet2-icon.svg" alt="Omzet" class="w-[2vw] h-[2vh] mr-1">Omzet
                </a>
                <a href="/user/video" class="{{ request()->path() == 'user/video' ? 'bg-gray-300' : '' }} flex items-center px-4 py-3 text-[1vw] text-black hover:bg-gray-100 transition-colors w-full">
                    <img src="/assets/svg/blackVideo-icon.svg" alt="Video" class="w-[2vw] h-[2vh] mr-1">Video
                </a>
                <a href="/user/ebook" class="{{ request()->path() == 'user/ebook' ? 'bg-gray-300' : '' }} flex items-center px-4 py-3 text-[1vw] text-black hover:bg-gray-100 transition-colors w-full">
                    <img src="/assets/svg/blackEbook-icon.svg" alt="Ebook" class="w-[2vw] h-[2vh] mr-1">Ebook
                </a>
                <a href="/user/articles" class="{{ request()->path() == 'user/articles' ? 'bg-gray-300' : '' }} flex items-center px-4 py-3 text-[1vw] text-black hover:bg-gray-100 transition-colors w-full">
                    <img src="/assets/svg/blackArticle-icon.svg" alt="Artikel" class="w-[2vw] h-[2vh] mr-1">Artikel
                </a>
                <a href="/user/setting" class="{{ request()->path() == 'user/setting' ? 'bg-gray-300' : '' }} flex items-center px-4 py-3 text-[1vw] text-black hover:bg-gray-100 transition-colors w-full">
                    <img src="/assets/svg/userManage-icon.svg" alt="Setting" class="w-[2vw] h-[2vh] mr-1">Setting
                </a>
            </div>
            <div class="w-full p-5">
                @yield('content')
            </div>
        </div>
    </div>
</body>
</html>