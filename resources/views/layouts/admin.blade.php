<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Admin</title>
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
                        <span class="text-xs font-pilcrow font-pilcrow-semibold text-black">Admin</span>
                    </div>
                    <div class="w-10 h-10 rounded-full border-2 border-black flex items-center justify-center bg-gray-300 text-black font-bold overflow-hidden">
                        <span>👤</span>
                    </div>
                </button>
            </div>
        </div>

        <div class="flex flex-row">
            <div class="w-[15%] -ml-2 flex flex-col border-r-2 h-screen border-black">
                <a href="/admin/dashboard" class="{{ request()->path() == 'admin/dashboard' ? 'bg-gray-300' : '' }} flex items-center px-4 py-3 text-[1vw] text-black hover:bg-gray-100 transition-colors w-full">
                    <img src="/assets/svg/dashboard-icon.svg" alt="Dashboard" class="w-[2vw] h-[2vh] mr-1">Dashboard
                </a>
                <a href="/admin/users" class="{{ request()->path() == 'admin/users' ? 'bg-gray-300' : '' }} flex items-center px-4 py-3 text-[1vw] text-black hover:bg-gray-100 transition-colors w-full">
                    <img src="/assets/svg/userManage-icon.svg" alt="User Management" class="w-[2vw] h-[2vh] mr-1">User Management
                </a>
                <a href="/admin/products" class="{{ request()->path() == 'admin/products' ? 'bg-gray-300' : '' }} flex items-center px-4 py-3 text-[1vw] text-black hover:bg-gray-100 transition-colors w-full">
                    <img src="/assets/svg/product-icon.svg" alt="Produk" class="w-[2vw] h-[2vh] mr-1">Produk
                </a>
                <a href="/admin/omzet" class="{{ request()->path() == 'admin/omzet' ? 'bg-gray-300' : '' }} flex items-center px-4 py-3 text-[1vw] text-black hover:bg-gray-100 transition-colors w-full">
                    <img src="/assets/svg/totalOmzet2-icon.svg" alt="Total Omzet" class="w-[2vw] h-[2vh] mr-1">Total Omzet
                </a>
                <a href="/admin/videos" class="{{ request()->path() == 'admin/videos' ? 'bg-gray-300' : '' }} flex items-center px-4 py-3 text-[1vw] text-black hover:bg-gray-100 transition-colors w-full">
                    <img src="/assets/svg/blackVideo-icon.svg" alt="Video" class="w-[2vw] h-[2vh] mr-1">Video
                </a>
                <a href="/admin/ebooks" class="{{ request()->path() == 'admin/ebooks' ? 'bg-gray-300' : '' }} flex items-center px-4 py-3 text-[1vw] text-black hover:bg-gray-100 transition-colors w-full">
                    <img src="/assets/svg/blackEbook-icon.svg" alt="Ebook" class="w-[2vw] h-[2vh] mr-1">Ebook
                </a>
                <a href="/admin/articles" class="{{ request()->path() == 'admin/articles' ? 'bg-gray-300' : '' }} flex items-center px-4 py-3 text-[1vw] text-black hover:bg-gray-100 transition-colors w-full">
                    <img src="/assets/svg/blackArticle-icon.svg" alt="Artikel" class="w-[2vw] h-[2vh] mr-1">Artikel
                </a>
            </div>
            <div class="w-full p-5">
                @yield('content')
            </div>
        </div>
    </div>
</body>
</html>