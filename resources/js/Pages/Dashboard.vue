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
    
    <div class="block md:hidden">
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
        <div class="bg-primary w-full border-b-10 border-black rounded-b-2xl p-5 shadow-sm mb-2 flex flex-row gap-10 min-h-[15svh]">
            <div class="mt-5 sm:mt-3">
                <h1 class="text-[15px] sm:text-lg md:text-3xl font-pilcrow font-pilcrow-heavy text-white">Hello {{ $page.props.auth.user.name.split(' ')[0] }},</h1>  
                <p class=" text-[10px] sm:text-xs md:text-sm font-quicksand font-quicksand-regular text-white mb-4">Ada yang bisa kami bantu?</p>    
            </div>
            <div class="mt-0">
                <button id="userDropdownBtn" class="flex absolute top-8 right-5 gap-[2vw] items-center p-2 rounded-xl shadow-secondary bg-secondary border-2 border-black w-32 h-[7vh] md:w-36 md:h-14 xl:w-44 xl:h-16 hover:bg-tertiary transition-colors">
                    <h3 class="text-xs font-pilcrow font-pilcrow-semibold text-black mr-[1vw]">
                        {{ $page.props.auth.user.name.split(' ')[0] }}
                    </h3>
            <!-- Avatar Dynamic -->
            <div
                class="w-10 h-10 rounded-full border-2 border-black flex items-center justify-center bg-gray-300 text-black font-bold overflow-hidden"
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
                    <svg class="absolute w-4 h-4 text-black right-[2vw] ml-1" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"></path>
                    </svg>
                </button>
                
                <!-- Dropdown Menu -->
                <div id="userDropdown" class="absolute top-[8vh] right-5 mt-2 -ml-4 w-32 h-14 rounded-xl z-50 hidden">
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
            <!-- Target Omset Card -->
            <div class="p-5">
                <div class="bg-white shadow-black border-2 border-black rounded-2xl">
                    <div class="bg-white border-2 rounded-t-2xl p-5 shadow-sm">
                        <div class="flex justify-between items-center mb-3">
                            <div class="">
                                <h2 class="text-lg font-pilcrow font-pilcrow-heavy text-black">Total Omzet</h2>
                                <p class="text-3xl font-quicksand font-quicksand-regular text-black mb-4">
                                    Rp {{ new Intl.NumberFormat('id-ID').format(totalOmzet) }}
                                </p>                                       
                            </div>
                        </div>
                        
                        <!-- Progress section -->
                        <div>
                            <div class="flex justify-between font-quicksand font-quicksand-regular text-xs text-gray-600 mb-2">
                                <span>On Progress</span>
                                <span>{{ Math.round(progress) }}%</span>
                            </div>
                            <div class="w-full bg-gray-200 rounded-full border-2 border-black h-4 mb-3">
                                <div class="bg-[#DD661D] h-3 rounded-full" :style="`width: ${progress}%`"></div>
                            </div>
                            <div class="flex justify-between text-sm">
                                <span class="font-pilcrow font-pilcrow-medium text-black">
                                    Rp {{ new Intl.NumberFormat('id-ID').format(totalOmzet) }}
                                </span>
                                <span class="font-pilcrow font-pilcrow-medium text-black">
                                    Rp {{ new Intl.NumberFormat('id-ID').format(targetValue) }}
                                </span>
                            </div>
                        </div>

                        <!-- Rata-Rata Omset Card -->
                    </div>
                    <div class="bg-white rounded-b-2xl">
                        <div class="bg-[#DD661D] border-2 border-black rounded-2xl p-5 shadow-sm">
                            <h2 class="text-sm font-quicksand font-quicksand-regular text-white mb-1">Rata - Rata Omset</h2>
                            <p class="text-2xl font-pilcrow font-pilcrow-bold text-white">Rp {{ new Intl.NumberFormat('id-ID').format(rataOmzet) }}</p>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Navigation Icons Grid - 2 rows x 4 columns -->
            <div class="grid grid-cols-4 gap-8 p-7">
                <!-- Catat Omzet -->
                <a href="/products" class="flex flex-col items-center focus:outline-none">
                    <div class="bg-[#3C096C] border-2 border-black shadow-black rounded-full w-[65px] h-[65px] p-3 shadow-nav-icon flex items-center justify-center mb-2">
                        <img class="w-8 h-8" src="/assets/svg/plus-icon.svg" alt="Catat Omzet Icon">
                    </div>
                    <p class="text-xs font-pilcrow font-pilcrow-heavy text-black text-center">Catat Omzet</p>
                </a>

                <!-- Tambah Target -->
                <a href="/add/omzet" class="flex flex-col items-center focus:outline-none">
                    <div class="bg-[#3C096C] border-2 border-black shadow-black rounded-full w-[65px] h-[65px] p-3 shadow-nav-icon flex items-center justify-center mb-2">
                        <img class="w-8 h-8" src="/assets/svg/targetAdd-icon.svg" alt="Tambah Target Icon">
                    </div>
                    <p class="text-xs font-pilcrow font-pilcrow-heavy text-black text-center">Tambah Target</p>
                </a>
                
                <!-- Total Omzet -->
                <a href="/omzet" class="flex flex-col items-center focus:outline-none">
                <div class="flex flex-col items-center">
                    <div class="bg-[#3C096C] border-2 border-black shadow-black rounded-full w-[65px] h-[65px] p-3 shadow-nav-icon flex items-center justify-center mb-2">
                        <img class="w-8 h-8" src="/assets/svg/totalOmzet-icon.svg" alt="Total Omzet Icon">
                    </div>
                    <p class="text-xs font-pilcrow font-pilcrow-heavy text-black text-center">Total Omzet</p>
                </div>
                </a>
                
                <!-- Total Komisi -->
                <a href="/comission" class="flex flex-col items-center focus:outline-none">
                <div class="flex flex-col items-center">
                    <div class="bg-[#3C096C] border-2 border-black shadow-black rounded-full w-[65px] h-[65px] p-3 shadow-nav-icon flex items-center justify-center mb-2">
                        <img class="w-9 h-9" src="/assets/svg/newTotalKomisi-icon.svg" alt="Total Komisi Icon">
                    </div>
                    <p class="text-xs font-pilcrow font-pilcrow-heavy text-black text-center">Total Komisi</p>
                </div>
                </a>
                
                <!-- Riwayat Target -->
                <a href="/target" class="flex flex-col items-center focus:outline-none">
                    <div class="bg-[#3C096C] border-2 border-black shadow-black rounded-full w-[65px] h-[65px] p-3 shadow-nav-icon flex items-center justify-center mb-2">
                        <img class="w-8 h-8" src="/assets/svg/history-icon.svg" alt="Riwayat Target Icon">
                    </div>
                    <p class="text-xs font-pilcrow font-pilcrow-heavy text-black text-center">Riwayat Target</p>
                </a>
                
                <!-- Ebook -->
                <a href="/ebook" class="flex flex-col items-center focus:outline-none">
                    <div class="bg-[#3C096C] border-2 border-black shadow-black rounded-full w-[65px] h-[65px] p-3 shadow-nav-icon flex items-center justify-center mb-2">
                        <img class="w-8 h-8" src="/assets/svg/newEbook-icon.svg" alt="Ebook Icon">
                    </div>
                    <p class="text-xs font-pilcrow font-pilcrow-heavy text-black text-center">Ebook</p>
                </a>
                
                <!-- Artikel -->
                <a href="/articles" class="flex flex-col items-center focus:outline-none">
                    <div class="bg-[#3C096C] border-2 border-black shadow-black rounded-full w-[65px] h-[65px] p-3 shadow-nav-icon flex items-center justify-center mb-2">
                        <img class="w-8 h-8" src="/assets/svg/newArticle-icon.svg" alt="Artikel Icon">
                    </div>
                    <p class="text-xs font-pilcrow font-pilcrow-heavy text-black text-center">Artikel</p>
                </a>
                
                <!-- Video -->
                <a href="/video" class="flex flex-col items-center focus:outline-none">
                    <div class="bg-[#3C096C] border-2 border-black shadow-black rounded-full w-[65px] h-[65px] p-3 shadow-nav-icon flex items-center justify-center mb-2">
                        <img class="w-8 h-8" src="/assets/svg/newVideo-icon.svg" alt="Video Icon">
                    </div>
                    <p class="text-xs font-pilcrow font-pilcrow-heavy text-black text-center">Video</p>
                </a>
            </div>

            <!-- Top Omset Card -->
            <template v-if="topOmzet && topOmzet.length > 0">
            <div class="p-5">
                <div class="bg-white border-2 border-black shadow-black rounded-2xl p-5 shadow-sm">
                    <div class="flex justify-between items-center mb-4">
                        <h2 class="text-lg font-pilcrow font-pilcrow-bold text-black text-nowrap select-none">Top Omset</h2>
                        <button class="bg-secondary text-nowrap select-none shadow-black border-2 border-black text-black px-3 py-2 rounded-xl text-xs font-quicksand font-quicksand-medium flex items-center">
                            Bulan Ini
                            <svg class="w-3 h-3 ml-1" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"></path>
                            </svg>
                        </button>
                    </div>
                    
                    <!-- Top Performer -->
                        <div
                            v-for="(item, index) in topOmzet"
                            :key="index"
                            :style="index === 0
                                ? 'background: linear-gradient(135deg, #240046, #c04aff, #240046, #c04aff);background-size: 400% 400%;animation: gradient 5s linear infinite;'
                                : index === 1
                                    ? 'background: linear-gradient(135deg, #ff7300, #dd661d, #ff7300);background-size: 400% 400%;animation: gradient 5s ease infinite;'
                                    : index === 2
                                        ? 'background: linear-gradient(135deg, #b0b0b0 0%, #4a4a4a 100%);'
                                        : 'background: #fff;'"
                            class="flex items-center p-4 mb-4 pb-4 border-b border-gray-500 rounded-xl"
                        >
                            <div class="w-10 h-10 -ml-4 mr-2 flex items-center justify-center">
                                <span
                                    v-if="index === 0"
                                    class="w-8 h-8 flex items-center justify-center rounded-full font-pilcrow font-pilcrow-bold text-white text-center select-none animate-gradient-move"
                                    style="background: linear-gradient(135deg, #a103fc, #5A189A, #240046, #5A189A); background-size: 200% 200%; box-shadow: 0 0 8px #a947ff, 0 0 16px #5A189A;"
                                    title="Juara 1"
                                >
                                    {{ index + 1 }}
                                </span>
                                <span
                                    v-else-if="index === 1"
                                    class="w-8 h-8 flex items-center justify-center rounded-full font-pilcrow font-pilcrow-bold text-white text-center select-none animate-gradient-move"
                                    style="background: linear-gradient(135deg, #ff6000, #dd661d, #994817, #dd661d); background-size: 200% 200%; box-shadow: 0 0 8px #ffa973, 0 0 16px #dd661d;"
                                    title="Juara 2"
                                >
                                    {{ index + 1 }}
                                </span>
                                <span
                                    v-else-if="index === 2"
                                    class="w-8 h-8 flex items-center justify-center rounded-full font-pilcrow font-pilcrow-bold text-white text-center select-none animate-gradient-move"
                                    style="background: linear-gradient(135deg, #949494, #b0b0b0, #525252, #b0b0b0); background-size: 200% 200%; box-shadow: 0 0 8px #525252, 0 0 16px #b0b0b0;"
                                    title="Juara 3"
                                >
                                    {{ index + 1 }}
                                </span>
                                <p
                                    v-else
                                    class="text-black font-pilcrow font-pilcrow-bold text-center select-none"
                                >
                                    {{ index + 1 }}.
                                </p>
                            </div>
                                <div class="w-10 h-10 rounded-full flex items-center justify-center font-bold overflow-hidden mr-3 border-2 border-black">
                                <img
                                    v-if="item.foto_link"
                                    :src="item.foto_link.startsWith('http') ? item.foto_link : '/storage/' + item.foto_link"
                                    :alt="item.name"
                                    class="w-full h-full object-cover"
                                />
                                <span
                                    v-else
                                    class="w-full h-full flex items-center justify-center bg-primary text-white"
                                >
                                    {{ item.name.charAt(0).toUpperCase() }}
                                </span>
                                </div>
                            <div class="flex-1">
                                <span>
                                    <div class="flex items-center gap-2">
                                        <p
                                            class="text-[10px]   font-pilcrow font-pilcrow-bold select-none"
                                            :class="index < 3 ? 'text-white' : 'text-black'"
                                        >{{ item.name }}</p>
                                        <!-- <span v-if="index === 0">
                                            <img src="/assets/img/obsidian-medal.png" alt="Obsidian Medal" class="w-5 h-5 object-cover" title="Juara 1 (Obsidian Medal)">
                                        </span>
                                        <span v-else-if="index === 1">
                                            <img src="/assets/img/gold-medal.png" alt="Gold Medal" class="w-5 h-5 object-cover" title="Juara 2 (Gold Medal)">
                                        </span>
                                        <span v-else-if="index === 2">
                                            <img src="/assets/img/silver-medal.png" alt="Silver Medal" class="w-5 h-5 object-cover" title="Juara 3 (Silver Medal)">
                                        </span> -->
                                    </div>
                                </span>
                                <p
                                    class="text-[9px] font-quicksand font-quicksand-regular select-none"
                                    :class="index < 3 ? 'text-white/80' : 'text-gray-600'"
                                >{{ item.major }}</p>
                            </div>
                            <div>
                                <p
                                    class="text-[7px] text-nowrap font-pilcrow font-pilcrow-bold select-none"
                                    :class="index < 3 ? 'text-white' : 'text-black'"
                                >
                                    Rp {{ new Intl.NumberFormat('id-ID').format(item.omzets_sum_total_omzets || 0) }}
                                </p>
                            </div>
                        </div>
                        
                        <a href="/top" class="bg-secondary text-center justify-self-center shadow-black border-2 mt-5 border-black text-nowrap text-black px-24 py-2 rounded-xl text-xs font-quicksand font-quicksand-medium flex items-center">
                            Lihat Semua
                        </a>
                    </div>
                </div>
            </template>
        </div>
    </div>
</template>

<style>
@import url('https://fonts.googleapis.com/css2?family=Poppins:wght@400;500;600;700&display=swap');

body {
    font-family: 'Poppins', sans-serif;
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