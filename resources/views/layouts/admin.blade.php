<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>@yield('title') - Admin</title>
    @vite('resources/js/app.js', 'resources/css/app.css')
    <script defer src="https://cdn.jsdelivr.net/npm/alpinejs@3.x.x/dist/cdn.min.js"></script>
</head>
<body>
    {{-- <div id="loading-screen">
        <span class="loader"></span>
    </div> --}}
    <div class="bg-[#f5f7fa] min-h-screen">
        <div class="bg-primary sticky top-0 z-10 w-full p-5 shadow-sm flex flex-row gap-10 min-h-[15svh]">
            <div class="mt-5 sm:mt-3">
                <h1 class="text-[30px] hidden md:block mt-[1.5vh] sm:text-lg md:text-3xl font-pilcrow font-pilcrow-rounded text-white">SellMate</h1>
            </div>
             <div class="mt-0 ml-auto relative" x-data="{open:false}" @keydown.escape.window="open=false">
                <button @click="open = !open" class="flex justify-between absolute top-3 right-0  items-center p-2 rounded-xl shadow-secondary bg-secondary border-2 border-black w-32 h-[7vh] md:w-36 md:h-14 xl:w-44 xl:h-16 hover:bg-tertiary transition-colors">
                    <h3 class="text-xs font-pilcrow font-pilcrow-semibold text-black ml-2">{{ explode(' ', Auth::user()->name)[0] }}</h3>
                    <img src="/assets/svg/fluentPersonCircle-icon.svg" alt="Person Icon">
                    <svg class="absolute md:hidden w-4 h-4 text-black right-[2vw] ml-1" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"></path>
                    </svg>
                </button>
                <div x-show="open" x-transition @click.outside="open=false" class="absolute top-[8.5vh] right-0 items-center justify-center mt-2 w-32 h-14 md:w-36 xl:w-44 rounded-xl z-50">
                    <div class="py-2">
                        <form method="POST" action="{{route('logout')}}" class="w-full">
                            @csrf
                            <button type="submit" class="flex items-center px-4 py-3 text-xs text-black border-2 border-black rounded-xl shadow-black bg-white hover:bg-red-50 transition-colors w-full">
                                <svg class="w-4 h-4 mr-3" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 16l4-4m0 0l-4-4m4 4H7m6 4v1a3 3 0 01-3 3H6a3 3 0 01-3-3V7a3 3 0 013-3h4a3 3 0 013 3v1"></path>
                                </svg>
                                Logout
                            </button>
                        </form>
                    </div>
                </div>
            </div>
        </div>

        <div class="flex flex-row">
            <div class="w-[15%] sticky top-[15svh] -ml-2 flex flex-col border-r-2 h-screen border-black">
                <a href="/admin/dashboard" class="{{ request()->path() == 'admin/dashboard' ? 'bg-gray-300' : '' }} flex items-center px-4 py-3 text-[1vw] text-black hover:bg-gray-100 transition-colors w-full">
                    <img src="/assets/svg/dashboard-icon.svg" alt="Dashboard" class="w-[2vw] h-[2vh] mr-1">Dashboard
                </a>
                <a href="/admin/users" class="{{ request()->path() == 'admin/users' ? 'bg-gray-300' : '' }} flex items-center px-4 py-3 text-[1vw] text-black hover:bg-gray-100 transition-colors w-full">
                    <img src="/assets/svg/userManage-icon.svg" alt="User Management" class="w-[2vw] h-[2vh] mr-1">User Management
                </a>
                <a href="/admin/products" class="{{ request()->path() == 'admin/products' ? 'bg-gray-300' : '' }} flex items-center px-4 py-3 text-[1vw] text-black hover:bg-gray-100 transition-colors w-full">
                    <img src="/assets/svg/product-icon.svg" alt="Produk" class="w-[2vw] h-[2vh] mr-1">Produk
                </a>
                <a href="/admin/histori-omzet" class="{{ request()->path() == 'admin/history-omzet' ? 'bg-gray-300' : '' }} flex items-center px-4 py-3 text-[1vw] text-black hover:bg-gray-100 transition-colors w-full">
                    <img src="/assets/svg/totalOmzet2-icon.svg" alt="Total Omzet" class="w-[2vw] h-[2vh] mr-1">History Omzet
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
            <div class="w-full overflow-auto">
                @yield('content')
            </div>
        </div>
    </div>
    @yield('scripts')
    <script>
        document.addEventListener('DOMContentLoaded', function () {
            setTimeout(() => {
                const notif = document.getElementById('notif');
                if (notif) {
                    notif.style.transition = "opacity 0.5s ease, transform 0.5s ease";
                    notif.style.opacity = 0;
                    notif.style.transform = "translateX(100%)";
                    setTimeout(() => notif.remove(), 500);
                }
            }, 3000);
        });

        function closeNotification() {
            const notif = document.getElementById('notif');
            if (notif) {
                notif.remove();
            }
        }

document.addEventListener("DOMContentLoaded", function () {
    const loader = document.getElementById("loading-screen");

    function showLoader() {
        loader.style.display = "flex";
        setTimeout(() => loader.style.opacity = 1, 10);
    }

    function hideLoader() {
        setTimeout(() => {
            loader.style.opacity = 0;
            setTimeout(() => loader.style.display = "none", 400);
        }, 5000); // ⬅️ delay 7 detik
    }

    // TAMPILKAN LOADER SAAT KLIK LINK
    document.querySelectorAll("a").forEach(link => {
        link.addEventListener("click", function (e) {
            const href = this.getAttribute("href");

            if (!href || href.startsWith("#") || this.target === "_blank") return;

            showLoader();
        });
    });

    // TAMPILKAN LOADER SAAT SUBMIT FORM
    document.querySelectorAll("form").forEach(form => {
        form.addEventListener("submit", () => {
            showLoader();
        });
    });

    // SEMUA HALAMAN, ON LOAD → TUNGGU 7 DETIK BARU HIDE
    showLoader(); // tampilkan di awal halaman
    hideLoader(); // hilangkan setelah 7 detik
});

    </script>
</body>
</html>
