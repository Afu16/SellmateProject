<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Tambah Artikel</title>
    @vite('resources/js/app.js', 'resources/css/app.css')
</head>
<body>
    <div class="hidden md:block">
        <div class="bg-[#f5f7fa] min-h-screen">
            <!-- Header -->
            <div class="bg-primary sticky top-0 z-10 w-full p-5 shadow-sm flex flex-row gap-10 min-h-[15svh]">
                <div class="mt-5 sm:mt-3">
                    <h1 class="text-[30px] hidden md:block mt-[1.5vh] sm:text-lg md:text-3xl font-pilcrow font-pilcrow-rounded text-white">Sellmate</h1>
                    <p class="text-[10px] md:hidden sm:text-xs md:text-sm font-quicksand font-quicksand-regular text-white mb-4">Ada yang bisa kami bantu?</p>
                </div>
                <div class="mt-0">
                    <button class="user-dropdown-btn flex absolute top-8 right-5 items-center p-2 rounded-xl shadow-secondary bg-secondary border-2 border-black w-32 h-[7vh] md:w-36 md:h-14 xl:w-44 xl:h-16 hover:bg-tertiary transition-colors">
                        <h3 class="text-xs font-pilcrow font-pilcrow-semibold text-black ml-2">{{ Auth::user()->name }}</h3>
                        <div class="absolute right-6 md:right-7 w-10 h-10 rounded-full border-2 border-black flex items-center justify-center overflow-hidden bg-gray-300 text-black font-bold">
                            @if(Auth::user()->foto_link)
                                <img src="{{ asset('storage/' . Auth::user()->foto_link) }}" class="w-full h-full object-cover">
                            @else
                                <span class="text-[10px]">FOTO</span>
                            @endif
                        </div>
                    </button>
                    <div class="user-dropdown absolute top-[8vh] right-5 md:right-[10vw] mt-2 -ml-4 w-32 h-14 md:w-36 xl:w-44 rounded-xl z-50 hidden">
                        <div class="py-2">
                            <form method="POST" action="{{ route('logout') }}">
                                @csrf
                                <button type="submit" class="flex items-center px-4 py-3 text-xs text-black border-2 border-black rounded-xl shadow-black bg-white hover:bg-red-50 transition-colors w-full">Logout</button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>

            <div class="flex flex-row">
                <!-- Sidebar -->
                <div class="w-[15%] sticky top-[15svh] -ml-2 flex flex-col border-r-2 h-screen border-black">
                    <a href="/admin/dashboard" class="{{ request()->path() == 'admin/dashboard' ? 'bg-gray-300' : '' }} flex items-center px-4 py-3 text-[1vw] text-black hover:bg-gray-100 transition-colors w-full"><img src="/assets/svg/dashboard-icon.svg" class="w-[2vw] h-[2vh] mr-1">Dashboard</a>
                    <a href="/admin/users" class="{{ request()->path() == 'admin/users' ? 'bg-gray-300' : '' }} flex items-center px-4 py-3 text-[1vw] text-black hover:bg-gray-100 transition-colors w-full"><img src="/assets/svg/userManage-icon.svg" class="w-[2vw] h-[2vh] mr-1">User Management</a>
                    <a href="/admin/products" class="{{ request()->path() == 'admin/products' ? 'bg-gray-300' : '' }} flex items-center px-4 py-3 text-[1vw] text-black hover:bg-gray-100 transition-colors w-full"><img src="/assets/svg/product-icon.svg" class="w-[2vw] h-[2vh] mr-1">Produk</a>
                    <a href="/admin/omzet" class="{{ request()->path() == 'admin/omzet' ? 'bg-gray-300' : '' }} flex items-center px-4 py-3 text-[1vw] text-black hover:bg-gray-100 transition-colors w-full"><img src="/assets/svg/totalOmzet2-icon.svg" class="w-[2vw] h-[2vh] mr-1">Total Omzet</a>
                    <a href="/admin/videos" class="{{ request()->path() == 'admin/videos' ? 'bg-gray-300' : '' }} flex items-center px-4 py-3 text-[1vw] text-black hover:bg-gray-100 transition-colors w-full"><img src="/assets/svg/blackVideo-icon.svg" class="w-[2vw] h-[2vh] mr-1">Video</a>
                    <a href="/admin/ebooks" class="{{ request()->path() == 'admin/ebooks' ? 'bg-gray-300' : '' }} flex items-center px-4 py-3 text-[1vw] text-black hover:bg-gray-100 transition-colors w-full"><img src="/assets/svg/blackEbook-icon.svg" class="w-[2vw] h-[2vh] mr-1">Ebook</a>
                    <a href="/admin/articles" class="{{ request()->path() == 'admin/articles' ? 'bg-gray-300' : '' }} flex items-center px-4 py-3 text-[1vw] text-black hover:bg-gray-100 transition-colors w-full"><img src="/assets/svg/blackArticle-icon.svg" class="w-[2vw] h-[2vh] mr-1">Artikel</a>
                </div>

                <!-- Content -->
                <div class="w-full p-5">
                    <h1 class="text-2xl font-pilcrow font-pilcrow-rounded font-bold text-black mb-2">Tambah Artikel</h1>
                    <p class="text-xs font-quicksand font-quicksand-regular text-black mb-5">Lengkapi informasi artikel sesuai kolom data.</p>

                    <form action="#" method="POST" enctype="multipart/form-data" class="grid grid-cols-2 gap-4 border-2 border-black shadow-black rounded-xl p-4 bg-white">
                        @csrf
                        <!-- Informasi Artikel -->
                        <div class="flex flex-col gap-3">
                            <h3 class="text-sm font-pilcrow font-pilcrow-medium">Informasi Artikel</h3>
                            <div>
                                <label class="text-[10px]">Judul</label>
                                <input type="text" name="title" placeholder="Judul artikel" class="w-full h-[4.5vh] border-2 border-black shadow-black rounded-md px-3 py-1 text-xs" required>
                            </div>
                            <div>
                                <label class="text-[10px]">Konten</label>
                                <textarea name="content" placeholder="Isi artikel" class="w-full min-h-[12vh] border-2 border-black shadow-black rounded-md px-3 py-1 text-xs" required></textarea>
                            </div>
                            <div>
                                <label class="text-[10px]">Kategori</label>
                                <input type="text" name="category" placeholder="Kategori" class="w-full h-[4.5vh] border-2 border-black shadow-black rounded-md px-3 py-1 text-xs">
                            </div>
                        </div>

                        <!-- Thumbnail -->
                        <div class="flex flex-col gap-3">
                            <h3 class="text-sm font-pilcrow font-pilcrow-medium">Thumbnail</h3>
                            <div class="border-2 border-black rounded-xl h-[30vh] flex items-center justify-center bg-gray-50">
                                <input type="file" name="thumbnail" accept="image/*" class="text-xs">
                            </div>
                        </div>

                        <div class="col-span-2 flex justify-end">
                            <button type="submit" class="bg-secondary px-5 py-2 text-nowrap text-xs rounded-xl border-2 border-black shadow-black">Simpan</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <script>
        document.addEventListener('DOMContentLoaded', function () {
            const btn = document.querySelector('.user-dropdown-btn');
            const dropdown = document.querySelector('.user-dropdown');
            btn && btn.addEventListener('click', function(e){ e.stopPropagation(); dropdown.classList.toggle('hidden'); });
            document.addEventListener('click', function(){ dropdown && dropdown.classList.add('hidden'); });
        });
    </script>
</body>
</html>