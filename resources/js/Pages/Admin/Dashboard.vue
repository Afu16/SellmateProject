<script setup>
import { Head } from '@inertiajs/vue3';

defineProps({
    totalOmzet: Number,
    totalUser: Number,
    totalProduct: Number,
    totalVideo: Number,
    totalEbook: Number,
    totalArticle: Number,
    topOmzet: Array,
    history: Array,
});
</script>

<template>
    <Head title="Dashboard Siswa" />
    
    <div class="hidden md:block">
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
        <div class="bg-primary  sticky top-0 z-10 w-full p-5 shadow-sm flex flex-row gap-10 min-h-[15svh]">
            <div class="mt-5 sm:mt-3">
                <h1 class="text-[30px] hidden md:block mt-[1.5vh] sm:text-lg md:text-3xl font-pilcrow font-pilcrow-rounded text-white">Sellmate</h1>  
                <h1 class="text-[15px] md:hidden sm:text-lg md:text-3xl font-pilcrow font-pilcrow-heavy text-white">Hello {{ $page.props.auth.user.name.split(' ')[0] }},</h1>  
                <p class=" text-[10px] md:hidden sm:text-xs md:text-sm font-quicksand font-quicksand-regular text-white mb-4">Ada yang bisa kami bantu?</p>    
            </div>
            <div class="mt-0">
                <button id="userDropdownBtn" class="flex justify-between absolute top-8 right-5 items-center p-2 rounded-xl shadow-secondary bg-secondary border-2 border-black w-32 h-[7vh] md:w-36 md:h-14 xl:w-44 xl:h-16 hover:bg-tertiary transition-colors">
                    <h3 class="text-xs font-pilcrow font-pilcrow-semibold text-black ml-2">
                        {{ $page.props.auth.user.name.split(' ')[0] }}
                    </h3>
            <!-- Avatar Dynamic -->
                <img src="/assets/svg/fluentPersonCircle-icon.svg" class="" alt="Person Icon">
           
                    <svg class="absolute md:hidden w-4 h-4 text-black right-[2vw] ml-1" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"></path>
                    </svg>
                </button>
                
                <!-- Dropdown Menu -->
                <div id="userDropdown" class="absolute top-[11vh] right-6 items-center justify-center md:right-5 mt-2 w-32 h-14 md:w-36 xl:w-44 rounded-xl z-50 hidden">
                    <div class="py-2"> 
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
            <div class="w-[15%] sticky top-[15svh] -ml-2 flex flex-col border-r-2 h-screen border-black">
                <a
                    href="/admin/dashboard"
                    :class="{
                        'bg-gray-300': $page.url === '/admin/dashboard',
                        'flex items-center px-4 py-3 text-[1vw] text-black hover:bg-gray-100 transition-colors w-full': true
                    }"
                >
                    <img src="/assets/svg/dashboard-icon.svg" alt="Dashboard" class="w-[2vw] h-[2vh] mr-1">
                    Dashboard
                </a>
                <a
                    href="/admin/users"
                    :class="{
                        'bg-gray-300': $page.url === '/admin/users',
                        'flex items-center px-4 py-3 text-[1vw] text-black hover:bg-gray-100 transition-colors w-full': true
                    }"
                >
                    <img src="/assets/svg/userManage-icon.svg" alt="User Management" class="w-[2vw] h-[2vh] mr-1">
                    User Management
                </a>
                <a
                    href="/admin/products"
                    :class="{
                        'bg-gray-300': $page.url === '/admin/products',
                        'flex items-center px-4 py-3 text-[1vw] text-black hover:bg-gray-100 transition-colors w-full': true
                    }"
                >
                    <img src="/assets/svg/product-icon.svg" alt="Produk" class="w-[2vw] h-[2vh] mr-1">
                    Produk
                </a>
                <a
                    href="/admin/omzet"
                    :class="{
                        'bg-gray-300': $page.url === '/admin/omzet',
                        'flex items-center px-4 py-3 text-[1vw] text-black hover:bg-gray-100 transition-colors w-full': true
                    }"
                >
                    <img src="/assets/svg/totalOmzet2-icon.svg" alt="Total Omzet" class="w-[2vw] h-[2vh] mr-1">
                    Total Omzet
                </a>
                <a
                    href="/admin/videos"
                    :class="{
                        'bg-gray-300': $page.url === '/admin/videos',
                        'flex items-center px-4 py-3 text-[1vw] text-black hover:bg-gray-100 transition-colors w-full': true
                    }"
                >   
                    <img src="/assets/svg/blackVideo-icon.svg" alt="Video" class="w-[2vw] h-[2vh] mr-1">
                    Video
                </a>
                <a
                    href="/admin/ebooks"
                    :class="{
                        'bg-gray-300': $page.url === '/admin/ebooks',
                        'flex items-center px-4 py-3 text-[1vw] text-black hover:bg-gray-100 transition-colors w-full': true
                    }"
                >
                    <img src="/assets/svg/blackEbook-icon.svg" alt="Ebook" class="w-[2vw] h-[2vh] mr-1">
                    Ebook
                </a>
                <a
                    href="/admin/articles"
                    :class="{
                        'bg-gray-300': $page.url === '/admin/articles',
                        'flex items-center px-4 py-3 text-[1vw] text-black hover:bg-gray-100 transition-colors w-full': true
                    }"
                >
                    <img src="/assets/svg/blackArticle-icon.svg" alt="Artikel" class="w-[2vw] h-[2vh] mr-1">
                    Artikel
                </a>
                </div>
            <div class="w-full p-2">
                <h1 class="text-big font-pilcrow font-pilcrow-rounded font-bold text-black">Dashboard</h1>

                
                <p class="text-xs font-quicksand font-quicksand-regular text-black">
                    Tetap monitoring progres dan update aktivitas pendapatan Tefa
                </p>
               

                <div class="flex flex-row gap-5">
                    <div class="w-1/2 mt-5">
                        <div class="grid-cols-3 text-white items-center justify-center justify-self-center grid gap-4">
                            <div class="bg-secondary w-[13vw] border-2 border-black shadow-black rounded-lg p-2 shadow-sm">
                                <span class="text-[1.2vw] font-pilcrow font-pilcrow-rounded  text-nowrap select-none"><img src="/assets/svg/fluentMoney-icon.svg" alt="chart-icon" class="w-[2vw] h-[2vw] inline"> Total Omzet</span>
                                <p class="text-[1.4vw] font-quicksand font-quicksand-regular">Rp {{ new Intl.NumberFormat('id-ID').format(totalOmzet) }}</p>
                            </div>
                            <div class="bg-secondary w-[13vw] border-2 border-black shadow-black rounded-lg p-2 shadow-sm">
                                <span class="text-[1.2vw] font-pilcrow font-pilcrow-rounded text-nowrap select-none"><img src="/assets/svg/fluentBox-icon.svg" alt="chart-icon" class="w-[2vw] h-[2vw] inline"> Produk Tefa</span>
                                <p class="text-[1.4vw] font-quicksand font-quicksand-regular">{{ totalProduct }} Produk</p>
                            </div>
                            <div class="bg-secondary w-[13vw] border-2 border-black shadow-black rounded-lg p-2 shadow-sm">
                                <span class="text-[1.2vw] font-pilcrow font-pilcrow-rounded  text-nowrap select-none"><img src="/assets/svg/fluentPerson-icon.svg" alt="chart-icon" class="w-[2vw] h-[2vw] inline filter-black"> Total User</span>
                                <p class="text-[1.4vw] font-quicksand font-quicksand-regular">{{ totalUser }} User</p>
                            </div>
                              <div class="bg-secondary w-[13vw] border-2 border-black shadow-black rounded-lg p-2 shadow-sm">
                                <span class="text-[1.2vw] font-pilcrow font-pilcrow-rounded  text-nowrap select-none"><img src="/assets/svg/fluentVideo-icon.svg" alt="chart-icon" class="w-[2vw] h-[2vw] inline filter-black"> Video</span>
                                <p class="text-[1.4vw] font-quicksand font-quicksand-regular">{{ totalVideo }} Video</p>
                            </div>
                            <div class="bg-secondary w-[13vw] border-2 border-black shadow-black rounded-lg p-2 shadow-sm">
                                <span class="text-[1.2vw] font-pilcrow font-pilcrow-rounded  text-nowrap select-none"><img src="/assets/svg/fluentBook-icon.svg" alt="chart-icon" class="w-[2vw] h-[2vw]  inline filter-black"> Ebook</span>
                                <p class="text-[1.4vw] font-quicksand font-quicksand-regular">{{ totalEbook }} Ebook</p>
                            </div>
                            <div class="bg-secondary w-[13vw] border-2 border-black shadow-black rounded-lg p-2 shadow-sm">
                                <span class="text-[1.2vw] font-pilcrow font-pilcrow-rounded  text-nowrap select-none"><img src="/assets/svg/fluentDocument-icon.svg" alt="chart-icon" class="w-[2vw] h-[2vw] inline filter-black"> Artikel</span>
                                <p class="text-[1.4vw] font-quicksand font-quicksand-regular">{{ totalArticle }} Artikel</p>
                            </div>
                        </div>

                        <div class="border-2 border-black shadow-black p-2 mt-5 rounded-lg">
                            <div class="flex items-center justify-between mb-2">
                                <h5 class="text-[2vw] font-pilcrow font-pilcrow-bold text-black text-nowrap select-none">Top Omzet</h5>

                        <div class="flex gap-2">

                       <button class="bg-white w-[3vw] h-[3.5vh] border-2 border-black rounded-md shadow-black py-1 text-[7px]    ">
                            <img src="/assets/svg/newFilter-icon.svg" alt="newFilter-icon" class="justify-self-center" width="10" height="10">
                        </button>

                                <div class="relative bottom-[0.4vh] focus:outline-none focus:ring-2 focus:ring-primary">
                                    <!-- w-[15vw] h-[3.5vh] border-2 border-black rounded-md shadow-black px-3 py-1 pr-8 text-[7px] focus:outline-none focus:ring-2 focus:ring-primary -->
                                       <input
                                           type="search"
                                           name="search"
                                           id="search"
                                           placeholder="Search"
                                           class="w-[15vw] h-[3.5vh] border-2 border-black rounded-md shadow-black px-3 py-1 pr-8 text-[7px] focus:outline-none focus:ring-2 focus:ring-primary"

                                       />
                                       <img src="/assets/svg/fluentSearch-icon.svg" alt="Search icon" class="absolute right-3 top-1/2 -translate-y-1/2 h-3 w-3 text-black cursor-pointer">
                                   </div>


                         <div class="bg-white relative w-[7.5vw] h-[3.5vh] justify-between border-2 border-black rounded-md shadow-black px-2 py-1 text-[7px]">
                                <span class="inline-flex relative top-[0.2vh] text-gray-400 gap-1 text-nowrap">Bulan ini <img src="/assets/svg/fluentCalendar-icon.svg" alt="newCalendar-icon" width="10" height="10"></span>
                        </div>
                                </div>
                               
                            </div>

                            <!-- Table Top Omzet -->
                             <div class="flex justify-between items-center p-1 mb-2 ">
                                    <p class="text-[0.8vw] font-pilcrow font-pilcrow-heavy text-black w-[0.1vw]">No</p>
                                    <p class="text-[0.8vw] font-pilcrow font-pilcrow-heavy text-black w-[10vw]">Nama</p>
                                    <p class="text-[0.8vw] font-pilcrow font-pilcrow-heavy text-black w-[0.9vw]">Jurusan</p>
                                    <p class="text-[0.8vw] font-pilcrow font-pilcrow-heavy text-black w-[0.9vw] text-nowrap">Total Omzet</p>
                                    <p class="text-[0.8vw] font-pilcrow font-pilcrow-heavy text-black w-[1vw] text-center">Nilai</p>
                                </div>
                                <hr class="border-t-2 border-black my-2">

                                <!-- Table Body -->
                                <div
                                    v-for="(item, idx) in topOmzet.slice(0, 10)"
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

                                <div class="flex gap-5 relative">
                                    <div class="w-1/2"></div>
                                    <a href="/admin/omzet" class="text-[0.8vw] underline font-quicksand font-quicksand-regular w-[1vw] relative left-20">
                                        Selengkapnya
                                    </a>
                                </div>
                            </div>
                        </div>
                        <div class="">
                    <div class="flex mt-5 gap-2 w-[12w] h-[4.5vh]">

                        <button class="bg-white w-[3vw] h-[3.5vh] border-2 border-black rounded-md shadow-black py-1 text-[7px]    ">
                            <img src="/assets/svg/newFilter-icon.svg" alt="newFilter-icon" class="justify-self-center" width="10" height="10">
                        </button>

                                <div class="relative bottom-[0.4vh] focus:outline-none focus:ring-2 focus:ring-primary">
                                    <!-- w-[15vw] h-[3.5vh] border-2 border-black rounded-md shadow-black px-3 py-1 pr-8 text-[7px] focus:outline-none focus:ring-2 focus:ring-primary -->
                                       <input
                                           type="search"
                                           name="search"
                                           id="search"
                                           placeholder="Search"
                                           class="w-[15vw] h-[3.5vh] border-2 border-black rounded-md shadow-black px-3 py-1 pr-8 text-[7px] focus:outline-none focus:ring-2 focus:ring-primary"

                                       />
                                       <img src="/assets/svg/fluentSearch-icon.svg" alt="Search icon" class="absolute right-3 top-1/2 -translate-y-1/2 h-3 w-3 text-black cursor-pointer">
                                   </div>


                         <div class="bg-white relative w-[11vw] h-[3.5vh] border-2 border-black rounded-md shadow-black px-3 py-1 text-[7px]">
                                <span class="inline-flex text-gray-400 gap-1 text-nowrap"> <span class="relative top-[0.2vh]">Agustus 2025</span> <img class="relative top-[0.2vh]" src="/assets/svg/fluentCalendar-icon.svg" alt="newCalendar-icon" width="10" height="10"></span>
                        </div>


                        <div class="bg-secondary relative w-[8vw] h-[3.5vh] border-2 border-black rounded-md shadow-black px-2 py-1 text-[7px]">
                                <span class="text-white gap-1 relative top-[0.2vh] inline-flex">Download <img src="/assets/svg/newWhiteArrow-icon.svg" alt="Arrow Icon" width="10" height="10"></span>
                            </div>

                        </div>
                        <div class="w-full mt-2 border-2 border-black shadow-black rounded-lg p-2">                            
                            <h1 class="text-[1.5vw] font-pilcrow font-pilcrow-heavy mt-1">Histori Transaksi Omzet</h1>

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
                            v-for="(item, idx) in history"
                            :key="item.id"
                            class="flex justify-between items-center p-1 mb-[1.1vh]"
                        >
                            <p class="text-[0.8vw] font-pilcrow text-black w-[3vw] text-center">{{ new Date(item.date).toLocaleDateString('id-ID') }}</p>
                            <p class="text-[0.8vw] font-pilcrow text-black w-[10vw] truncate">{{ item.user.name }}</p>
                            <p class="text-[0.8vw] font-pilcrow text-black w-[3vw] truncate">{{ item.user.major }}</p>
                            <p class="text-[0.8vw] font-pilcrow text-black w-[5vw] text-nowrap pr-2">
                                Rp {{ new Intl.NumberFormat('id-ID').format(item.total_omzets) }}
                            </p>
                        </div>

                         <div class="flex gap-5 mb-[0.3vh] relative">
                                    <div class="w-1/2"></div>
                                    <a href="/admin/" class="text-[0.8vw] underline font-quicksand font-quicksand-regular w-[1vw] relative left-20">
                                        Selengkapnya
                                    </a>
                                </div>
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