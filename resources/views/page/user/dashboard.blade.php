@if(session('success'))
<div id="notif" 
     class="fixed top-5 right-5 z-50 mb-4 px-5 py-4 rounded-xl bg-gradient-to-r from-green-500 to-emerald-600 text-white shadow-xl w-80 animate-slide-in">
    <div class="flex items-center justify-between">
        <div class="flex items-center gap-2">
            <!-- Icon -->
            <span class="text-xl">✅</span>
            <p class="text-sm font-medium">{{ session('success') }}</p>
        </div>
        <!-- Close Button -->
        <button onclick="document.getElementById('notif').remove()" 
                class="ml-3 text-white hover:text-gray-200 font-bold text-lg">
            ×
        </button>
    </div>
</div>

<script>
    setTimeout(() => {
        const notif = document.getElementById('notif');
        if (notif) {
            notif.style.transition = "opacity 0.5s ease, transform 0.5s ease";
            notif.style.opacity = 0;
            notif.style.transform = "translateX(100%)";
            setTimeout(() => notif.remove(), 500);
        }
    }, 3000);
</script>

<style>
@keyframes slide-in {
    from { opacity: 0; transform: translateX(100%); }
    to   { opacity: 1; transform: translateX(0); }
}
.animate-slide-in {
    animation: slide-in 0.4s ease-out;
}
</style>
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
            <div class="mt-3 relative">
                <button id="userDropdownBtn" class="flex gap-3 items-center p-4 rounded-xl shadow-secondary bg-secondary border-2 border-black w-32 h-14 hover:bg-tertiary transition-colors">
                    <h3 class="text-l font-pilcrow font-pilcrow-semibold text-black mr-4">Siska</h3>
                    <img class="w-10 h-10 rounded-full object-cover border-2 border-black" src="{{ asset('assets/img/profile/photo.png') }}" alt="Profile Photo of Siska">
                    <svg class="w-4 h-4 text-black ml-1" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"></path>
                    </svg>
                </button>
                
                <!-- Dropdown Menu -->
                <div id="userDropdown" class="absolute right-0 mt-2 w-32 h-14 rounded-xl z-50 hidden">
                    <div class="py-2">
                        <a href="{{ route('setting') }}" class="flex items-center px-4 py-3 text-xs text-black border-2 border-black rounded-xl shadow-secondary bg-secondary hover:bg-gray-100 transition-colors">
                            <svg class="w-4 h-4 mr-3" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z"></path>
                            </svg>
                            Edit Profile
                        </a>
                        <hr class="border-gray-200">
                        <form method="POST" action="{{ route('logout') }}" class="w-full">
                            @csrf
                            <button type="submit" class="flex items-center px-4 py-3 text-xs text-red-600 border-2 border-black rounded-xl shadow-secondary bg-secondary hover:bg-red-50 transition-colors w-full">
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

        <!-- Target Omzet Card -->
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
                <span>{{ round($progress) }}%</span>
            </div>
            <div class="w-full bg-gray-200 rounded-full border-2 border-black h-4 mb-3">
                <div class="bg-[#DD661D] h-3 rounded-full" style="width: {{ $progress }}%"></div>
            </div>
            <div class="flex justify-between text-sm">
                <span class="font-pilcrow font-pilcrow-medium text-black">
                    Rp {{ number_format($totalOmzet, 0, ',', '.') }}
                </span>
                <span class="font-pilcrow font-pilcrow-medium text-black">
                    Rp {{ number_format($targetValue, 0, ',', '.') }}
                </span>
            </div>
        </div>

            <!-- Rata-Rata Omzet Card -->
        </div>
        <div class="bg-white rounded-b-2xl">

                <div class="bg-[#DD661D] border-2 border-black rounded-2xl p-5 shadow-sm">
                    <h2 class="text-sm font-quicksand font-quicksand-regular text-white mb-1">Rata - Rata Omzet</h2>
                    <p class="text-2xl font-pilcrow font-pilcrow-bold text-white">Rp {{ number_format($rataOmzet, 0, ',', '.') }}</p>
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

        <!-- Top Omzet Card -->
        <div class="p-5">
            <div class="bg-white border-2 border-black shadow-black rounded-2xl p-5 shadow-sm">
                <div class="flex justify-between items-center mb-4">
                    <h2 class="text-lg font-pilcrow font-pilcrow-bold text-black">Top Omzet</h2>
                    <button class="bg-secondary shadow-black border-2 border-black text-black px-3 py-2 rounded-xl text-xs font-quicksand font-quicksand-medium flex items-center">
                        Bulan Ini
                        <svg class="w-3 h-3 ml-1" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"></path>
                        </svg>
                    </button>
                </div>
                
                <!-- Top Performer 1 -->
                @foreach ($topOmzet as $item)
                    <div class="flex items-center mb-4 pb-4 border-b border-gray-200">
                        <div class="w-10 h-10 -ml-4  mr-2 flex items-center justify-center">
                            <p class="text-black font-pilcrow font-pilcrow-bold text-center">{{ $loop->iteration }}.</p>
                        </div>
                        <img class="w-10 h-10 rounded-full object-cover mr-3" src="{{ asset('assets/img/profile/photo.png') }}" alt="Profile Photo">
                        <div class="flex-1">
                            <p class="text-sm font-pilcrow font-pilcrow-bold text-black">{{ $item->name }}</p>
                            <p class="text-xs font-quicksand font-quicksand-regular text-gray-600">Pemasaran</p>
                        </div>
                        <div>
                            <p class="text-sm font-pilcrow font-pilcrow-bold text-black">
                                Rp {{ number_format($item->omzets_sum_total_omzets ?? 0, 0, ',', '.') }}
                            </p>
                        </div>
                    </div>
                @endforeach
                
                <a  href="{{ route('topRating') }}" class="bg-secondary text-center justify-self-center shadow-black border-2 mt-5 border-black text-nowrap text-black px-24 py-2 rounded-xl text-xs font-quicksand font-quicksand-medium flex items-center">
                        Lihat Semua
                    </a>
            </div>
        </div>
    </div>

    <!-- Dropdown JavaScript -->
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            const dropdownBtn = document.getElementById('userDropdownBtn');
            const dropdown = document.getElementById('userDropdown');
            
            // Toggle dropdown when button is clicked
            dropdownBtn.addEventListener('click', function(e) {
                e.stopPropagation();
                dropdown.classList.toggle('hidden');
            });
            
            // Close dropdown when clicking outside
            document.addEventListener('click', function(e) {
                if (!dropdownBtn.contains(e.target) && !dropdown.contains(e.target)) {
                    dropdown.classList.add('hidden');
                }
            });
            
            // Close dropdown when pressing Escape key
            document.addEventListener('keydown', function(e) {
                if (e.key === 'Escape') {
                    dropdown.classList.add('hidden');
                }
            });
        });
    </script>
</body>
</html>