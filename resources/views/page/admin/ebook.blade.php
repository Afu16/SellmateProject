<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>E-Book Management</title>
    @vite('resources/js/app.js', 'resources/css/app.css')
</head>
<body>
    <div class="hidden md:block">
        <div class="bg-[#f5f7fa] min-h-screen">
            <!-- Header -->
            <div class="bg-primary sticky top-0 z-10 w-full p-5 shadow-sm flex flex-row gap-10 min-h-[15svh]">
                <div class="mt-5 sm:mt-3">
                    <h1 class="text-[30px] hidden md:block mt-[1.5vh] sm:text-lg md:text-3xl font-pilcrow font-pilcrow-rounded text-white">SellMate</h1>
                    <h1 class="text-[15px] md:hidden sm:text-lg md:text-3xl font-pilcrow font-pilcrow-heavy text-white">Hello DEDEN,</h1>
                    <p class=" text-[10px] md:hidden sm:text-xs md:text-sm font-quicksand font-quicksand-regular text-white mb-4">Ada yang bisa kami bantu?</p>
                </div>
                <div class="mt-0 ml-auto">
                    <button class="user-dropdown-btn flex absolute top-8 right-5 items-center p-2 rounded-xl shadow-secondary bg-secondary border-2 border-black w-32 h-[7vh] md:w-36 md:h-14 xl:w-44 xl:h-16 hover:bg-tertiary transition-colors">
                        <!-- Nama User -->
                        <h3 class="text-xs font-pilcrow font-pilcrow-semibold text-black ml-2">{{ Auth::user()->name }}</h3>
                        <!-- Foto Profil -->
                        <div class="absolute right-6 md:right-7 w-10 h-10 rounded-full border-2 border-black flex items-center justify-center overflow-hidden bg-gray-300 text-black font-bold">
                            @if(Auth::user()->foto_link)
                                <img src="{{ asset('storage/' . Auth::user()->foto_link) }}" class="w-full h-full object-cover">
                            @else
                                <span class="text-[10px]">FOTO</span>
                            @endif
                        </div>
                        <!-- Icon Arrow -->
                        <svg class="absolute md:hidden w-4 h-4 text-black right-[2vw] ml-1" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"></path></svg>
                    </button>
                    <!-- Dropdown -->
                    <div class="user-dropdown absolute top-[8vh] right-5 md:right-[10vw] mt-2 -ml-4 w-32 h-14 md:w-36 xl:w-44 rounded-xl z-50 hidden">
                        <div class="py-2">
                            <form method="POST" action="{{ route('logout') }}">@csrf
                                <button type="submit" class="flex items-center px-4 py-3 text-xs text-black border-2 border-black rounded-xl shadow-black bg-white hover:bg-red-50 transition-colors w-full">
                                    <svg class="w-4 h-4 mr-3" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 16l4-4m0 0l-4-4m4 4H7m6 4v1a3 3 0 01-3 3H6a3 3 0 01-3-3V7a3 3 0 013-3h4a3 3 0 013 3v1"></path></svg>
                                    Logout
                                </button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>

            <div class="flex flex-row">
                <!-- Sidebar -->
                <div class="w-[15%] sticky top-[15svh] -ml-2 flex flex-col border-r-2 h-screen border-black">
                    <a href="/admin/dashboard" class=" {{ request()->path() == 'admin/dashboard' ? 'bg-gray-300' : '' }} flex items-center px-4 py-3 text-[1vw] text-black hover:bg-gray-100 transition-colors w-full">
                        <img src="/assets/svg/dashboard-icon.svg" alt="Dashboard" class="w-[2vw] h-[2vh] mr-1">Dashboard
                    </a>
                    <a href="/admin/users" class=" {{ request()->path() == 'admin/users' ? 'bg-gray-300' : '' }} flex items-center px-4 py-3 text-[1vw] text-black hover:bg-gray-100 transition-colors w-full">
                        <img src="/assets/svg/userManage-icon.svg" alt="User Management" class="w-[2vw] h-[2vh] mr-1">User Management
                    </a>
                    <a href="/admin/products" class=" {{ request()->path() == 'admin/products' ? 'bg-gray-300' : '' }} flex items-center px-4 py-3 text-[1vw] text-black hover:bg-gray-100 transition-colors w-full">
                        <img src="/assets/svg/product-icon.svg" alt="Produk" class="w-[2vw] h-[2vh] mr-1">Produk
                    </a>
                    <a href="/admin/omzet" class=" {{ request()->path() == 'admin/omzet' ? 'bg-gray-300' : '' }} flex items-center px-4 py-3 text-[1vw] text-black hover:bg-gray-100 transition-colors w-full">
                        <img src="/assets/svg/totalOmzet2-icon.svg" alt="Total Omzet" class="w-[2vw] h-[2vh] mr-1">Total Omzet
                    </a>
                    <a href="/admin/videos" class=" {{ request()->path() == 'admin/videos' ? 'bg-gray-300' : '' }} flex items-center px-4 py-3 text-[1vw] text-black hover:bg-gray-100 transition-colors w-full">
                        <img src="/assets/svg/blackVideo-icon.svg" alt="Video" class="w-[2vw] h-[2vh] mr-1">Video
                    </a>
                    <a href="/admin/ebooks" class=" {{ request()->path() == 'admin/ebooks' ? 'bg-gray-300' : '' }} flex items-center px-4 py-3 text-[1vw] text-black hover:bg-gray-100 transition-colors w-full">
                        <img src="/assets/svg/blackEbook-icon.svg" alt="Ebook" class="w-[2vw] h-[2vh] mr-1">Ebook
                    </a>
                    <a href="/admin/articles" class=" {{ request()->path() == 'admin/articles' ? 'bg-gray-300' : '' }} flex items-center px-4 py-3 text-[1vw] text-black hover:bg-gray-100 transition-colors w-full">
                        <img src="/assets/svg/blackArticle-icon.svg" alt="Artikel" class="w-[2vw] h-[2vh] mr-1">Artikel
                    </a>
                </div>

                <!-- Content -->
                <div class="w-full p-5">
                    <!-- Top Row with Title and Add Button -->
                    <div class="flex flex-row items-center justify-between w-full">
                        <h1 class="text-2xl font-pilcrow font-pilcrow-rounded font-bold text-black">E-Book</h1>
                        <button class="border-2 border-black shadow-black rounded-xl p-4 bg-secondary hover:bg-tertiary transition-colors">
                            <img src="/assets/svg/blackPlus-icon.svg" alt="Tambah">
                        </button>
                    </div>

                    <!-- Hero Banner -->
                    <div class="mt-6">
                        <div class="relative w-full h-40 rounded-xl bg-gradient-to-r from-[#8c58ff] via-[#a27bd9] to-[#c4b0c8] overflow-hidden">
                            <div class="absolute inset-0 bg-black/10"></div>
                            <div class="absolute left-8 top-6">
                                <h2 class="text-white font-pilcrow font-pilcrow-rounded text-2xl">Honkai: Star Rail</h2>
                                <div class="flex gap-3 mt-1">
                                    <span class="text-xs text-white/90 border border-white/50 rounded-md px-2 py-0.5">Action</span>
                                    <span class="text-xs text-white/90 border border-white/50 rounded-md px-2 py-0.5">Strategy</span>
                                </div>
                                <p class="mt-2 w-[60%] text-xs text-white/80 font-quicksand">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Sed euismod, urna sit amet tincidunt consectetur, nisi nisl aliquam nunc, eget euismod massa nisi quis neque.</p>
                                <div class="mt-2 flex items-center text-white/90 text-xs">
                                    <span class="mr-1">⭐</span> 9.4
                                </div>
                            </div>
                            <div class="absolute right-6 bottom-4 flex gap-1 opacity-70">
                                <span class="w-1.5 h-1.5 bg-white/70 rounded-full"></span>
                                <span class="w-1.5 h-1.5 bg-white/40 rounded-full"></span>
                                <span class="w-1.5 h-1.5 bg-white/40 rounded-full"></span>
                            </div>
                        </div>
                    </div>

                    <!-- Khusus Untukmu -->
                    <div class="mt-6">
                        <h1 class="text-xl font-pilcrow font-pilcrow-rounded font-bold text-black">Khusus untukmu</h1>
                        <div class="mt-4 grid grid-cols-2 gap-4">
                            <!-- Card 1 -->
                            <div class="relative flex flex-row border-2 border-black shadow-black rounded-xl gap-3 bg-white p-3">
                                <img width="120" class="rounded-xl object-cover" src="/assets/img/example-img.jpg" alt="">
                                <div class="flex-1">
                                    <div class="absolute right-4 top-3 text-[10px] bg-[#8c58ff] text-white rounded-md px-2 py-0.5">Tips</div>
                                    <h3 class="text-sm font-pilcrow font-pilcrow-bold text-black">Revolusi pembelajaran menuju masa depan</h3>
                                    <p class="text-xs mt-1 font-quicksand text-gray-600">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Lorem ipsum dolor sit amet...</p>
                                    <div class="mt-3 flex items-center justify-between">
                                        <button class="px-3 py-1 text-xs rounded-md bg-secondary border-2 border-black shadow-black">Read</button>
                                        <div class="flex items-center gap-3 text-xs text-gray-700">
                                            <span>⭐ 9.4</span>
                                            <div class="flex gap-2">
                                                <span>🔈</span>
                                                <span>🔗</span>
                                                <span>💬</span>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <!-- Card 2 -->
                            <div class="relative flex flex-row border-2 border-black shadow-black rounded-xl gap-3 bg-white p-3">
                                <img width="120" class="rounded-xl object-cover" src="/assets/img/example-img.jpg" alt="">
                                <div class="flex-1">
                                    <div class="absolute right-4 top-3 text-[10px] bg-[#8c58ff] text-white rounded-md px-2 py-0.5">Tips</div>
                                    <h3 class="text-sm font-pilcrow font-pilcrow-bold text-black">Bagaimana cara menawarkan jasa developer website</h3>
                                    <p class="text-xs mt-1 font-quicksand text-gray-600">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Lorem ipsum dolor sit amet...</p>
                                    <div class="mt-3 flex items-center justify-between">
                                        <button class="px-3 py-1 text-xs rounded-md bg-secondary border-2 border-black shadow-black">Read</button>
                                        <div class="flex items-center gap-3 text-xs text-gray-700">
                                            <span>⭐ 9.4</span>
                                            <div class="flex gap-2">
                                                <span>🔈</span>
                                                <span>🔗</span>
                                                <span>💬</span>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <!-- Card 3 -->
                            <div class="relative flex flex-row border-2 border-black shadow-black rounded-xl gap-3 bg-white p-3">
                                <img width="120" class="rounded-xl object-cover" src="/assets/img/example-img.jpg" alt="">
                                <div class="flex-1">
                                    <div class="absolute right-4 top-3 text-[10px] bg-[#8c58ff] text-white rounded-md px-2 py-0.5">Tips</div>
                                    <h3 class="text-sm font-pilcrow font-pilcrow-bold text-black">Edukasi digital marketing untuk masyarakat</h3>
                                    <p class="text-xs mt-1 font-quicksand text-gray-600">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Lorem ipsum dolor sit amet...</p>
                                    <div class="mt-3 flex items-center justify-between">
                                        <button class="px-3 py-1 text-xs rounded-md bg-secondary border-2 border-black shadow-black">Read</button>
                                        <div class="flex items-center gap-3 text-xs text-gray-700">
                                            <span>⭐ 9.4</span>
                                            <div class="flex gap-2">
                                                <span>🔈</span>
                                                <span>🔗</span>
                                                <span>💬</span>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- Populer -->
                    <div class="mt-8">
                        <h1 class="text-xl font-pilcrow font-pilcrow-rounded font-bold text-black">Populer</h1>
                        <div class="mt-4 grid grid-cols-2 gap-4">
                            <!-- Populer Card 1 -->
                            <div class="flex flex-row border-2 border-black shadow-black rounded-xl gap-3 bg-white p-3">
                                <img width="120" class="rounded-xl object-cover" src="/assets/img/example-img.jpg" alt="">
                                <div class="flex-1">
                                    <div class="flex items-center justify-between">
                                        <span class="text-[10px] bg-[#8c58ff] text-white rounded-md px-2 py-0.5">Tips</span>
                                        <span class="text-xs text-gray-500">Cara Beternak Lele</span>
                                    </div>
                                    <h3 class="text-sm mt-1 font-pilcrow font-pilcrow-bold text-black">Cara Beternak Lele</h3>
                                    <p class="text-xs mt-1 font-quicksand text-gray-600">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Lorem ipsum dolor sit amet...</p>
                                    <div class="mt-3 flex items-center justify-between">
                                        <button class="px-3 py-1 text-xs rounded-md bg-secondary border-2 border-black shadow-black">Read</button>
                                        <div class="flex items-center gap-3 text-xs text-gray-700">
                                            <span>⭐ 9.4</span>
                                            <div class="flex gap-2">
                                                <span>🔈</span>
                                                <span>🔗</span>
                                                <span>💬</span>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <!-- Populer Card 2 -->
                            <div class="flex flex-row border-2 border-black shadow-black rounded-xl gap-3 bg-white p-3">
                                <img width="120" class="rounded-xl object-cover" src="/assets/img/example-img.jpg" alt="">
                                <div class="flex-1">
                                    <div class="flex items-center justify-between">
                                        <span class="text-[10px] bg-[#8c58ff] text-white rounded-md px-2 py-0.5">Tips</span>
                                        <span class="text-xs text-gray-500">Cara Beternak Lele</span>
                                    </div>
                                    <h3 class="text-sm mt-1 font-pilcrow font-pilcrow-bold text-black">Cara Beternak Lele</h3>
                                    <p class="text-xs mt-1 font-quicksand text-gray-600">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Lorem ipsum dolor sit amet...</p>
                                    <div class="mt-3 flex items-center justify-between">
                                        <button class="px-3 py-1 text-xs rounded-md bg-secondary border-2 border-black shadow-black">Read</button>
                                        <div class="flex items-center gap-3 text-xs text-gray-700">
                                            <span>⭐ 9.4</span>
                                            <div class="flex gap-2">
                                                <span>🔈</span>
                                                <span>🔗</span>
                                                <span>💬</span>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Optional simple dropdown script -->
    <script>
        document.addEventListener('DOMContentLoaded', () => {
            const btn = document.querySelector('.user-dropdown-btn');
            const menu = document.querySelector('.user-dropdown');
            if (btn && menu) {
                btn.addEventListener('click', () => {
                    menu.classList.toggle('hidden');
                });
                document.addEventListener('click', (e) => {
                    if (!btn.contains(e.target) && !menu.contains(e.target)) {
                        menu.classList.add('hidden');
                    }
                });
            }
        });
    </script>
</body>
</html>