<script setup>
import { Head } from '@inertiajs/vue3';

defineProps({
    totalOmzet: Number,
    topOmzet: Array,
    rataOmzet: Number,
    progress: Number,
    targetValue: Number,
});
</script>

<template>
    <Head title="Dashboard Siswa" />
    
    <div class="">
        <!-- Success Notification -->
        <div
            v-if="$page.props.flash?.success"
            id="notif"
            class="fixed top-5 right-5 z-50 mb-4 px-5 py-4 rounded-xl bg-gradient-to-r from-green-500 to-emerald-600 text-white shadow-xl w-80 animate-slide-in"
        >
            <div class="flex items-center justify-between">
                <div class="flex items-center gap-2">
                    <!-- Icon -->
                    <span class="text-xl">✅</span>
                    <p class="text-sm font-medium">{{ $page.props.flash.success }}</p>
                </div>
                <!-- Close Button -->
                <button
                    @click="document.getElementById('notif').style.display = 'none'"
                    class="ml-3 text-white hover:text-gray-200 font-bold text-lg"
                    aria-label="Close notification"
                >
                    ×
                </button>
            </div>
        </div>
        
        <div class="bg-[#f5f7fa] min-h-screen">
        <!-- Header with greeting -->
        <div class="bg-primary w-full p-5 shadow-sm mb-2 flex flex-row gap-10 min-h-[15svh]">
            <div class="mt-5 sm:mt-3">
                <h1 class="text-[30px] hidden md:block mt-[1.5vh] sm:text-lg md:text-3xl font-pilcrow font-pilcrow-rounded text-white">Sellmate</h1>  
                <h1 class="text-[15px] md:hidden sm:text-lg md:text-3xl font-pilcrow font-pilcrow-heavy text-white">Hello {{ $page.props.auth.user.name.split(' ')[0] }},</h1>  
                <p class=" text-[10px] md:hidden sm:text-xs md:text-sm font-quicksand font-quicksand-regular text-white mb-4">Ada yang bisa kami bantu?</p>    
            </div>
            <div class="mt-0">
                <button id="userDropdownBtn" class="flex absolute top-8 right-5 items-center p-2 rounded-xl shadow-secondary bg-secondary border-2 border-black w-32 h-[7vh] md:w-36 md:h-14 xl:w-44 xl:h-16 hover:bg-tertiary transition-colors">
                    <h3 class="text-xs font-pilcrow font-pilcrow-semibold text-black ml-2">
                        {{ $page.props.auth.user.name.split(' ')[0] }}
                    </h3>
            <!-- Avatar Dynamic -->
            <div
                class="absolute right-6 md:right-7 w-10 h-10 rounded-full border-2 border-black flex items-center justify-center bg-gray-300 text-black font-bold overflow-hidden"
            >
            <img
                v-if="$page.props.auth.user.foto_link"
                :src="`/storage/${$page.props.auth.user.foto_link}`"
                alt="Profile Photo"
                class=" w-[10vw] h-10 object-cover"
            />
            <span v-else>
                {{ $page.props.auth.user.name.charAt(0).toUpperCase() }}
            </span>
            </div>
                    <svg class="absolute md:hidden w-4 h-4 text-black right-[2vw] ml-1" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"></path>
                    </svg>
                </button>
                
                <!-- Dropdown Menu -->
                <div id="userDropdown" class="absolute top-[8vh] right-5 md:right-[10vw] mt-2 -ml-4 w-32 h-14 md:w-36 xl:w-44 rounded-xl z-50 hidden">
                    <div class="py-2">
                        <a href="/settings" class="flex mb-2 mt-5 items-center px-4 py-3 text-xs text-black border-2 border-black rounded-xl shadow-black bg-white hover:bg-gray-100 transition-colors">
                            <svg class="w-4 h-4 mr-3" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z"></path>
                            </svg>
                            Edit Profile
                        </a> 
                        <form method="POST" :action="route('logout')" class="w-full" @submit.prevent="$inertia.post(route('logout'))">
                            <input type="hidden" name="_token" :value="$page.props.jetstream?.csrf_token ?? $page.props.csrf_token" />
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
            <div class="w-[15%] -ml-2 flex flex-col border-r-2 h-screen border-black">
                <a href="/admin/dashboard" class="flex items-center px-4 py-3 text-[1vw] text-black hover:bg-gray-100 transition-colors w-full">
                    <img src="/assets/svg/dashboard-icon.svg" alt="Dashboard" class="w-[2vw] h-[2vh] mr-1">
                    Dashboard
                </a>
                <a href="/admin/dashboard" class="flex items-center px-4 py-3 text-[1vw] text-black hover:bg-gray-100 transition-colors w-full">
                    <img src="/assets/svg/userManage-icon.svg" alt="Dashboard" class="w-[2vw] h-[2vh] mr-1">
                    User Management
                </a>
                <a href="/admin/dashboard" class="flex items-center px-4 py-3 text-[1vw] text-black hover:bg-gray-100 transition-colors w-full">
                    <img src="/assets/svg/product-icon.svg" alt="Dashboard" class="w-[2vw] h-[2vh] mr-1">
                    Produk
                </a>
                <a href="/admin/dashboard" class="flex items-center px-4 py-3 text-[1vw] text-black hover:bg-gray-100 transition-colors w-full">
                    <img src="/assets/svg/totalOmzet2-icon.svg" alt="Dashboard" class="w-[2vw] h-[2vh] mr-1">
                    Total Omzet
                </a>
                <a href="/admin/dashboard" class="flex items-center px-4 py-3 text-[1vw] text-black hover:bg-gray-100 transition-colors w-full">
                    <img src="/assets/svg/blackVideo-icon.svg" alt="Dashboard" class="w-[2vw] h-[2vh] mr-1">
                    Video
                </a>
                <a href="/admin/dashboard" class="flex items-center px-4 py-3 text-[1vw] text-black hover:bg-gray-100 transition-colors w-full">
                    <img src="/assets/svg/blackEbook-icon.svg" alt="Dashboard" class="w-[2vw] h-[2vh] mr-1">
                    Ebook
                </a>
                <a href="/admin/dashboard" class="flex items-center px-4 py-3 text-[1vw] text-black hover:bg-gray-100 transition-colors w-full">
                    <img src="/assets/svg/blackArticle-icon.svg" alt="Dashboard" class="w-[2vw] h-[2vh] mr-1">
                    Artikel
                </a>
                <a href="/admin/dashboard" class="flex items-center px-4 py-3 text-[1vw] text-black hover:bg-gray-100 transition-colors w-full">
                    <img src="/assets/svg/blackHistory-icon.svg" alt="Dashboard" class="w-[1.5vw] h-[1.5vh] mr-1">
                    Histori
                </a>
            </div>
            <div class="w-full p-2">
                <h1 class="text-big font-pilcrow font-pilcrow-rounded font-bold text-black">Dashboard</h1>
                <div class="absolute w-[12w] h-[4.5vh] bg-white text-gray-300 text-[9px] font-pilcrow font-pilcrow-rounded border-2 border-black shadow-black top-[23vh] right-[3vh] rounded-xl p-2">
                    <span>Export <img src="/assets/svg/download-icon.svg" alt="download-icon" class="w-[2vw] h-4 inline ml-1"></span>
                </div>
                <div class="absolute w-[12w] h-[4.5vh] bg-white text-gray-300 text-[9px] font-pilcrow font-pilcrow-rounded border-2 border-black shadow-black top-[23vh] right-[14vh] rounded-xl p-2">
                    <span>Agustus 2025 <img src="/assets/svg/calendar-icon.svg" alt="download-icon" class="w-[2vw] h-4 inline ml-1"></span>
                </div>
                <p class="text-xs font-quicksand font-quicksand-regular text-black">
                    Tetap monitoring progres dan update aktivitas pendapatan Tefa
                </p>
                <div class="flex flex-row gap-5">
                    <div class="w-1/2 mt-5">
                        <div class="grid-cols-3 items-center justify-center justify-self-center grid gap-4">
                            <div class="bg-secondary w-[13vw] border-2 border-black shadow-black rounded-2xl p-2 shadow-sm">
                                <span class="text-[1.2vw] font-pilcrow font-pilcrow-bold text-black text-nowrap select-none"><img src="/assets/svg/totalOmzet2-icon.svg" alt="chart-icon" class="w-[2vw] h-[2vw] inline"> Total Omzet</span>
                                <p class="text-[0.8vw] font-quicksand font-quicksand-bold text-black text-nowrap select-none">Rp 1.000.000</p>
                            </div>
                            <div class="bg-secondary w-[13vw] border-2 border-black shadow-black rounded-2xl p-2 shadow-sm">
                                <span class="text-[1.2vw] font-pilcrow font-pilcrow-bold text-black text-nowrap select-none"><img src="/assets/svg/productTefa-icon.svg" alt="chart-icon" class="w-[2vw] h-[2vw] inline"> Produk Tefa</span>
                                <p class="text-[0.8vw] font-quicksand font-quicksand-bold text-black text-nowrap select-none">4 Produk</p>
                            </div>
                            <div class="bg-secondary w-[13vw] border-2 border-black shadow-black rounded-2xl p-2 shadow-sm">
                                <span class="text-[1.2vw] font-pilcrow font-pilcrow-bold text-black text-nowrap select-none"><img src="/assets/svg/totalUser-icon.svg" alt="chart-icon" class="w-[2vw] h-[2vw] inline filter-black"> Total User</span>
                                <p class="text-[0.8vw] font-quicksand font-quicksand-bold text-black text-nowrap select-none">20 User</p>
                            </div>
                              <div class="bg-secondary w-[13vw] border-2 border-black shadow-black rounded-2xl p-2 shadow-sm">
                                <span class="text-[1.2vw] font-pilcrow font-pilcrow-bold text-black text-nowrap select-none"><img src="/assets/svg/blackVideo-icon.svg" alt="chart-icon" class="w-[2vw] h-[2vw] inline filter-black"> Inspirasi, Tips</span>
                                <p class="text-[0.8vw] font-quicksand font-quicksand-bold text-black text-nowrap select-none">9 Video</p>
                            </div>
                            <div class="bg-secondary w-[13vw] border-2 border-black shadow-black rounded-2xl p-2 shadow-sm">
                                <span class="text-[1.2vw] font-pilcrow font-pilcrow-bold text-black text-nowrap select-none"><img src="/assets/svg/blackEbook-icon.svg" alt="chart-icon" class="w-[2vw] h-[2vw] text-black inline filter-black"> Edukasi</span>
                                <p class="text-[0.8vw] font-quicksand font-quicksand-bold text-black text-nowrap select-none">4 Ebook</p>
                            </div>
                            <div class="bg-secondary w-[13vw] border-2 border-black shadow-black rounded-2xl p-2 shadow-sm">
                                <span class="text-[1.2vw] font-pilcrow font-pilcrow-bold text-black text-nowrap select-none"><img src="/assets/svg/blackArticle-icon.svg" alt="chart-icon" class="w-[2vw] h-[2vw] inline filter-black"> Artikel</span>
                                <p class="text-[0.8vw] font-quicksand font-quicksand-bold text-black text-nowrap select-none">6 Artikel</p>
                            </div>
                        </div>

                        <div class="border-2 border-black shadow-black p-2 mt-5 rounded-lg">
                            <div class="flex items-center justify-between">
                                <h5 class="text-[2vw] font-pilcrow font-pilcrow-bold text-black text-nowrap select-none">Top Omzet</h5>
                                <div class="flex items-center gap-2">
                                    <div class="relative">
                                        <input
                                            type="search"
                                            name="search"
                                            id="search"
                                            placeholder="Search"
                                            class="w-[15vw] h-[3.5vh] border-2 border-black rounded-xl px-3 py-1 pr-8 text-[7px] focus:outline-none focus:ring-2 focus:ring-primary"
                                        />
                                        <svg
                                            xmlns="http://www.w3.org/2000/svg"
                                            class="absolute right-3 top-1/2 -translate-y-1/2 h-3 w-3 text-black cursor-pointer"
                                            fill="none"
                                            viewBox="0 0 24 24"
                                            stroke="currentColor"
                                        >
                                            <path
                                                stroke-linecap="round"
                                                stroke-linejoin="round"
                                                stroke-width="2"
                                                d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z"
                                            />
                                        </svg>
                                    </div>
                                </div>
                            </div>

                            <!-- Table Top Omzet -->
                             <div class="flex justify-between items-center p-1 mb-2 mt-2">
                                    <p class="text-[0.8vw] font-pilcrow font-pilcrow-heavy text-black w-[0.1vw]">No</p>
                                    <p class="text-[0.8vw] font-pilcrow font-pilcrow-heavy text-black w-[10vw]">Nama</p>
                                    <p class="text-[0.8vw] font-pilcrow font-pilcrow-heavy text-black w-[0.9vw]">Jurusan</p>
                                    <p class="text-[0.8vw] font-pilcrow font-pilcrow-heavy text-black w-[0.9vw] text-nowrap">Total Omzet</p>
                                    <p class="text-[0.8vw] font-pilcrow font-pilcrow-heavy text-black w-[1vw] text-center">Nilai</p>
                                </div>
                                <hr class="border-t-2 border-black my-2">

                                <!-- Table Body -->
                                <div
                                    v-for="(item, idx) in topOmzet.slice(0, 5)"
                                    :key="item.id"
                                    class="flex justify-between items-center p-1 mb-2"
                                >
                                    <p class="text-[0.8vw] font-pilcrow text-black w-[0.1vw]">{{ idx + 1 }}</p>
                                    <p class="text-[0.8vw] font-pilcrow text-black w-[10vw] text-nowrap">{{ item.name }}</p>
                                    <p class="text-[0.8vw] font-pilcrow text-black w-[0.9vw]">{{ item.major }}</p>
                                    <p class="text-[0.8vw] font-pilcrow text-black w-[0.9vw] text-nowrap">
                                        Rp {{ new Intl.NumberFormat('id-ID').format(item.omzets_sum_total_omzets || 0) }}
                                    </p>
                                    <p class="text-[0.8vw] font-pilcrow text-black w-[1vw] text-center">
                                        {{ item.score ?? '-' }}
                                    </p>    
                                </div>
                        </div>
                    </div>
                    <div class="w-1/2 mt-5 border-2 border-black shadow-black rounded-lg p-2">
                        <div class="flex justify-between items-center">
                            <h1 class="text-[1.5vw] font-pilcrow font-pilcrow-heavy mt-1">Histori Transaksi Omzet</h1>
                             <div class="flex items-center gap-2">
                                        <div class="relative">
                                            <input
                                                type="search"
                                                name="search"
                                                id="search"
                                                placeholder="Search"
                                                class="w-[15vw] h-[3.5vh] border-2 border-black rounded-xl px-3 py-1 pr-8 text-[7px] focus:outline-none focus:ring-2 focus:ring-primary"
                                            />
                                            <svg
                                                xmlns="http://www.w3.org/2000/svg"
                                                class="absolute right-3 top-1/2 -translate-y-1/2 h-3 w-3 text-black cursor-pointer"
                                                fill="none"
                                                viewBox="0 0 24 24"
                                                stroke="currentColor"
                                            >
                                                <path
                                                    stroke-linecap="round"
                                                    stroke-linejoin="round"
                                                    stroke-width="2"
                                                    d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z"
                                                />
                                            </svg>
                                        </div>
                                    </div>
                                    <button class="w-[3.5vh] h-[3.5vh] rounded-xl">
                                        <img src="/assets/svg/filter-icon.svg" alt="filter-icon" class="    justify-self-center">
                                    </button>
                        </div>

                        <!-- Table History Omzet -->
                        <!-- Table Header History Omzet -->
                        <div class="flex justify-between items-center p-1 mb-2">
                            <p class="text-[0.8vw] font-pilcrow font-pilcrow-heavy text-black w-[3vw] text-center">Tanggal</p>
                            <p class="text-[0.8vw] font-pilcrow font-pilcrow-heavy text-black w-[10vw]">Nama</p>
                            <p class="text-[0.8vw] font-pilcrow font-pilcrow-heavy text-black w-[3vw]">Jurusan</p>
                            <p class="text-[0.8vw] font-pilcrow font-pilcrow-heavy text-black w-[4vw] text-right">Omzet</p>
                        </div>

                        <hr class="border-t-2 border-black my-2">

                        <!-- Table Body History Omzet -->
                        <div
                            v-for="(item, idx) in topOmzet.slice(0, 5)"
                            :key="item.id"
                            class="flex justify-between items-center p-1 mb-2"
                        >
                            <p class="text-[0.8vw] font-pilcrow text-black w-[3vw] text-center">{{ item.created_at ? new Date(item.created_at).toLocaleDateString('id-ID') : '-' }}</p>
                            <p class="text-[0.8vw] font-pilcrow text-black w-[10vw] truncate">{{ item.name }}</p>
                            <p class="text-[0.8vw] font-pilcrow text-black w-[3vw] truncate">{{ item.major }}</p>
                            <p class="text-[0.8vw] font-pilcrow text-black w-[4vw] text-right">
                                Rp {{ new Intl.NumberFormat('id-ID').format(item.omzets_sum_total_omzets || 0) }}
                            </p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        </div>
    </div>
</template>

<style>
@import url('https://fonts.googleapis.com/css2?family=Poppins:wght@400;500;600;700&display=swap');

body {
    font-family: 'Poppins', sans-serif;
}

.text-big {
    font-size: 5vh;
}

.border-r-2 {
    border-right-width: 5px;
}

.font-pilcrow {
    font-family: 'Poppins', sans-serif;
}

.font-pilcrow-heavy {
    font-weight: 700;
}

.font-pilcrow-bold {
    font-weight: 600;
}

.font-pilcrow-semibold {
    font-weight: 500;
}

.font-pilcrow-medium {
    font-weight: 500;
}

.font-quicksand {
    font-family: 'Poppins', sans-serif;
}

.font-quicksand-regular {
    font-weight: 400;
}

.font-quicksand-medium {
    font-weight: 500;
}

.bg-primary {
    background-color: #3C096C;
}

@keyframes gradient {
    0% {
        background-position: 0% 50%;
    }
    100% {
        background-position: 100% 50%;
    }
}

.shadow-secondary {
    box-shadow: 1 4px 6px 1px #DD661D;
}

.shadow-nav-icon {
    box-shadow: 0 4px 6px -1px rgba(0, 0, 0, 0.1);
}

.shadow-black {
    box-shadow: 2px 2px 0px 1px #000000;
}

.border-b-10 {
    border-bottom-width: 10px;
}

@keyframes slide-in {
    from { opacity: 0; transform: translateX(100%); }
    to   { opacity: 1; transform: translateX(0); }
}

.animate-slide-in {
    animation: slide-in 0.4s ease-out;
}
</style>

<script>
export default {
    methods: {
        closeNotification() {
            const notif = document.getElementById('notif');
            if (notif) {
                notif.remove();
            }
        }
    },
    mounted() {
        // Auto-hide notification after 3 seconds
        setTimeout(() => {
            const notif = document.getElementById('notif');
            if (notif) {
                notif.style.transition = "opacity 0.5s ease, transform 0.5s ease";
                notif.style.opacity = 0;
                notif.style.transform = "translateX(100%)";
                setTimeout(() => notif.remove(), 500);
            }
        }, 3000);

        // Dropdown JavaScript
        const dropdownBtn = document.getElementById('userDropdownBtn');
        const dropdown = document.getElementById('userDropdown');
        
        if (dropdownBtn && dropdown) {
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
        }
    }
}
</script>