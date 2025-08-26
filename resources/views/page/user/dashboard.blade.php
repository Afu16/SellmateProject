@if(session('success'))
    <div id="notif" class="absolute top-5 right-5 z-10 mb-4 p-4 rounded-lg bg-green-100 border border-green-400 text-green-800 shadow-lg">
        {{ session('success') }}
    </div>

    <script>
        setTimeout(() => {
            const notif = document.getElementById('notif');
            if (notif) {
                notif.style.transition = "opacity 0.5s ease";
                notif.style.opacity = 0;
                setTimeout(() => notif.remove(), 500); // hapus setelah fade out
            }
        }, 3000); // 3 detik
    </script>
@endif
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sales Dashboard Siska</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <style>
        @import url('https://fonts.googleapis.com/css2?family=Poppins:wght@400;500;600;700&display=swap');
        body {
            font-family: 'Poppins', sans-serif;
        }
    </style>
    @vite('resources/js/app.js', 'resources/css/app.css')
</head>
<body class="bg-[#f5f7fa]">
    <div class="">
        <!-- Header with greeting -->
        <div class="bg-primary border-b-10 border-black rounded-b-2xl p-5 shadow-sm mb-2 flex flex-row gap-10 min-h-[118px]">
            <div class="mt-3">
                <h1 class="text-3xl font-pilcrow font-pilcrow-heavy text-white">Hello Siska,</h1>  
                <p class="text-sm font-quicksand font-quicksand-regular text-white mb-4">Ada yang bisa kami bantu?</p>    
            </div>
            <div class="mt-3 flex gap-3 items-center p-4 rounded-xl shadow-secondary bg-secondary border-2 border-black w-32 h-14">
                <h3 class="text-l font-pilcrow font-pilcrow-semibold text-black mr-4">Siska</h3>
                <img class="w-10 h-10 rounded-full object-cover border-2 border-black" src="{{ asset('assets/img/profile/photo.png') }}" alt="Profile Photo of Siska">
            </div>
        </div>

        <!-- Target Omset Card -->
        <div class=" p-5">
            <div class="bg-white shadow-black border-2 border-black rounded-2xl">
                <div class="bg-white border-2 rounded-t-2xl p-5 shadow-sm">
                    <div class="flex justify-between items-center mb-3">
                        <div class="">
                            <h2 class="text-lg font-pilcrow font-pilcrow-heavy text-black">Total Omzet</h2>
                            <p class="text-3xl font-quicksand font-quicksand-regular text-black mb-4">
                                Rp {{ number_format($totalOmzet, 0, ',', '.') }}
                            </p>                                       
                        </div>
                        {{-- <a href="{{ route('products') }}" class="flex flex-col items-center focus:outline-none">
                        <div class="-mt-2 w-14 h-14 shadow-black bg-primary rounded-xl flex items-center justify-center">
                            <img width="50" height="50" src="{{ asset('assets/svg/plus-icon.svg') }}" alt="Target Icon">
                </div>
            </a> --}}
        </div>
            
            <!-- Progress section -->
            <div>
                <div class="flex justify-between font-quicksand font-quicksand-regular text-xs text-gray-600 mb-2">
                    <span>On Progress</span>
                    <span>80%</span>
                </div>
                <div class="w-full bg-gray-200 rounded-full border-2 border-black h-4 mb-3">
                    <div class="bg-[#DD661D] h-3 rounded-full" style="width: 80%"></div>
                </div>
                <div class="flex justify-between text-sm">
                    <span class="font-pilcrow font-pilcrow-medium text-black">Rp 8.480.000</span>
                    <span class="font-pilcrow font-pilcrow-medium text-black">Rp 10.000.000</span>
                </div>
            </div>
            <!-- Rata-Rata Omset Card -->
        </div>
        <div class="bg-white rounded-b-2xl">

                <div class="bg-[#DD661D] border-2 border-black rounded-2xl p-5 shadow-sm">
                    <h2 class="text-sm font-quicksand font-quicksand-regular text-white mb-1">Rata - Rata Omset</h2>
                    <p class="text-2xl font-pilcrow font-pilcrow-bold text-white">Rp 1.600.000</p>
                </div>
            </div>
        </div>
    </div>

        <!-- Navigation Icons Grid - 2 rows x 4 columns -->
        <div class="grid grid-cols-4 gap-8 p-7">
            <!-- Catat Omzet -->
            <a href="{{ route('products') }}" class="flex flex-col items-center focus:outline-none">
                <div class="bg-[#3C096C] rounded-full w-[65px] h-[65px] p-3 shadow-nav-icon flex items-center justify-center mb-2">
                    <img class="w-8 h-8" src="{{ asset('assets/svg/plus-icon.svg') }}" alt="Catat Omzet Icon">
                </div>
                <p class="text-xs font-pilcrow font-pilcrow-heavy text-black text-center">Catat Omzet</p>
            </a>

            <!-- Tambah Target -->
            <a href="{{ route('addOmzet') }}" class="flex flex-col items-center focus:outline-none">
                <div class="bg-[#3C096C] rounded-full w-[65px] h-[65px] p-3 shadow-nav-icon flex items-center justify-center mb-2">
                    <img class="w-8 h-8" src="{{ asset('assets/svg/targetAdd-icon.svg') }}" alt="Tambah Target Icon">
                </div>
                <p class="text-xs font-pilcrow font-pilcrow-heavy text-black text-center">Tambah Target</p>
            </a>
            
            <!-- Total Omzet -->
            <a href="{{ route('omzet') }}" class="flex flex-col items-center focus:outline-none">
            <div class="flex flex-col items-center">
                <div class="bg-[#3C096C] rounded-full w-[65px] h-[65px] p-3 shadow-nav-icon flex items-center justify-center mb-2">
                    <img class="w-8 h-8" src="{{ asset('assets/svg/totalOmzet-icon.svg') }}" alt="Total Omzet Icon">
                </div>
                <p class="text-xs font-pilcrow font-pilcrow-heavy text-black text-center">Total Omzet</p>
            </div>
            </a>
            
            <!-- Total Komisi -->
            <a href="{{ route('comission') }}" class="flex flex-col items-center focus:outline-none">
            <div class="flex flex-col items-center">
                <div class="bg-[#3C096C] rounded-full w-[65px] h-[65px] p-3 shadow-nav-icon flex items-center justify-center mb-2">
                    <img class="w-9 h-9" src="{{ asset('assets/svg/newTotalKomisi-icon.svg') }}" alt="Total Komisi Icon">
                </div>
                <p class="text-xs font-pilcrow font-pilcrow-heavy text-black text-center">Total Komisi</p>
            </div>
            </a>
            
            <!-- Riwayat Target -->
            <a href="{{ route('targetOmzet') }}" class="flex flex-col items-center focus:outline-none">
                <div class="bg-[#3C096C] rounded-full w-[65px] h-[65px] p-3 shadow-nav-icon flex items-center justify-center mb-2">
                    <img class="w-8 h-8" src="{{ asset('assets/svg/history-icon.svg') }}" alt="Riwayat Target Icon">
                </div>
                <p class="text-xs font-pilcrow font-pilcrow-heavy text-black text-center">Riwayat Target</p>
            </a>
            
            <!-- Ebook -->
            <a href="{{ route('ebook') }}" class="flex flex-col items-center focus:outline-none">
                <div class="bg-[#3C096C] rounded-full w-[65px] h-[65px] p-3 shadow-nav-icon flex items-center justify-center mb-2">
                    <img class="w-8 h-8" src="{{ asset('assets/svg/newEbook-icon.svg') }}" alt="Ebook Icon">
                </div>
                <p class="text-xs font-pilcrow font-pilcrow-heavy text-black text-center">Ebook</p>
            </a>
            
            <!-- Artikel -->
            <a href="{{ route('articles') }}" class="flex flex-col items-center focus:outline-none">
                <div class="bg-[#3C096C] rounded-full w-[65px] h-[65px] p-3 shadow-nav-icon flex items-center justify-center mb-2 hover:opacity-90 transition">
                    <img class="w-8 h-8" src="{{ asset('assets/svg/newArticle-icon.svg') }}" alt="Artikel Icon">
                </div>
                <p class="text-xs font-pilcrow font-pilcrow-heavy text-black text-center">Artikel</p>
            </a>
            
            <!-- Video -->
            <a href="{{ route('video') }}" class="flex flex-col items-center focus:outline-none">
                <div class="bg-[#3C096C] rounded-full w-[65px] h-[65px] p-3 shadow-nav-icon flex items-center justify-center mb-2">
                    <img class="w-8 h-8" src="{{ asset('assets/svg/newVideo-icon.svg') }}" alt="Video Icon">
                </div>
                <p class="text-xs font-pilcrow font-pilcrow-heavy text-black text-center">Video</p>
            </a>
        </div>

        <!-- Top Omset Card -->
        <div class="p-5">
            <div class="bg-white border-2 border-black shadow-black rounded-2xl p-5 shadow-sm">
                <div class="flex justify-between items-center mb-4">
                    <h2 class="text-lg font-pilcrow font-pilcrow-bold text-black">Top Omset</h2>
                    <button class="bg-secondary shadow-black border-2 border-black text-black px-3 py-2 rounded-xl text-xs font-quicksand font-quicksand-medium flex items-center">
                        Bulan Ini
                        <svg class="w-3 h-3 ml-1" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"></path>
                        </svg>
                    </button>
                </div>
                
                <!-- Top Performer 1 -->
                <div class="flex items-center mb-4 pb-4 border-b border-gray-200">
                    <img class="w-10 h-10 rounded-full object-cover mr-3" src="{{ asset('assets/img/profile/photo.png') }}" alt="Profile Photo">
                    <div class="flex-1">
                        <p class="font-pilcrow font-pilcrow-bold text-black">Siska</p>
                        <p class="text-xs font-quicksand font-quicksand-regular text-gray-600">Pemasaran</p>
                    </div>
                    <div>
                        <p class="font-pilcrow font-pilcrow-bold text-black">Rp 20.650.000</p>
                    </div>
                </div>
                
                <!-- Top Performer 2 -->
                <div class="flex items-center">
                    <img class="w-10 h-10 rounded-full object-cover mr-3" src="{{ asset('assets/img/profile/photo.png') }}" alt="Profile Photo">
                    <div class="flex-1">
                        <p class="font-pilcrow font-pilcrow-bold text-black">Siska</p>
                        <p class="text-xs font-quicksand font-quicksand-regular text-gray-600">Pemasaran</p>
                    </div>
                    <div>
                        <p class="font-pilcrow font-pilcrow-bold text-black">Rp 20.650.000</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</body>
</html>