@extends('layouts.admin')
@section('title', 'Katalog Ebook')
@section('content')
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
@endsection