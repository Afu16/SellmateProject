@extends('layouts.admin')
@section('title', 'Manajemen Pengguna')
@section('content')
    
<div class="w-full p-5">
    <h1 class="text-2xl font-pilcrow font-pilcrow-rounded font-bold text-black">Manajemen Pengguna</h1>
                <p class="text-xs font-quicksand font-quicksand-regular text-black mb-5">Kelola anggota tim Anda dan izin akun mereka di sini</p>

                <div class="flex items-center gap-3">
                    <h1 class="text-xl font-pilcrow font-pilcrow-rounded font-bold text-black">Semua pengguna</h1>
                    <h1 class="text-xl font-pilcrow font-pilcrow-rounded font-bold text-black">{{ $users->total() }}</h1>
                    <div class="flex items-center gap-3 ml-auto">
                        <button class="flex items-center gap-2 px-4 h-[4.2vh] border-2 border-black shadow-black rounded-md text-[10px] bg-white">
                            <img width="10" src="/assets/svg/newFilter-icon.svg" alt="filter-icon">
                        </button>                       
                        <div class="relative">
                            <input type="search" name="search" id="search" placeholder="Search" class="w-[18vw] h-[4.2vh] border-2 border-black shadow-black rounded-md px-3 py-1 pr-8 text-[10px] focus:outline-none focus:ring-2 focus:ring-primary" />
                            <svg xmlns="http://www.w3.org/2000/svg" class="absolute right-3 top-1/2 -translate-y-1/2 h-3 w-3 text-black cursor-pointer" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z" />
                            </svg>
                        </div>
                    </div>
                </div>

                <div class="w-full mt-5">
                    <div class="grid grid-cols-[40px,1fr,120px,140px,140px,40px] items-center bg-gray-300 rounded-xl px-4 py-2 text-black border-2 border-black">
                        <div>
                            <input class="rounded-md" type="checkbox" />
                        </div>
                        <div>Username</div>
                        <div class="text-center">Status</div>
                        <div class="text-center">Terakhir aktif</div>
                        <div class="text-center">Dibuat pada</div>
                        <div></div>
                    </div>
                    @foreach ($users as $user)
                        <div class="mt-3 grid grid-cols-[40px,1fr,120px,140px,140px,40px] items-center bg-white rounded-xl border-2 border-black px-4 py-3 shadow-black relative"
                            x-data="{open:false}" @keydown.escape.window="open=false">

                            <div>
                                <input type="checkbox" class="rounded-md">
                            </div>

                            <div class="flex items-center gap-3">
                                <img width="40" height="40"
                                    src="{{ $user->foto_link ? asset('storage/'.$user->foto_link) : '/assets/img/default-avatar.png' }}"
                                    alt="avatar"
                                    class="w-10 h-10 rounded-full border-2 border-black object-cover">

                                <p  class="font-pilcrow font-pilcrow-rounded text-black ">
                                    {{ $user->name }}
                                </p>
                            </div>

                            <div class="text-center">
                                {{ $user->status ?? 'Active' }}
                            </div>

                            <div class="text-center">
                    {{ optional($user->updated_at)->format('M d, Y') ?? '-' }}
                            </div>

                            <div class="text-center">
                    {{ optional($user->created_at)->format('M d, Y') ?? '-' }}
                            </div>

                            <div class="text-right text-xl">
                    <button type="button" class="focus:outline-none inline-flex items-center justify-center w-6 h-6"
                            @click.stop="open = !open">
                        <img src="/assets/svg/other-icon.svg" alt="other icon" width="2" height="2">
                    </button>
                            </div>
                <div x-show="open" x-transition.opacity @click.outside="open=false"
                    class="absolute right-7 top-8 rounded-md flex flex-col gap-1 justify-between bg-white border-2 border-black p-2 w-[12vw] z-10">
                    
                    <div @click="open=false"
                        class="absolute w-5 h-5 top-[-1vh] right-[-1vh] text-black text-xs rounded-full bg-red-600 flex items-center justify-center">
                        X
                    </div>

                    <a href="#"
                    class="text-xs w-1/2 items-center flex flex-col text-center text-black">
                        Aktif
                    </a>
                    <a href="#"
                    class="text-xs w-1/2 items-center flex flex-col text-center text-black">
                        Tidak Aktif
                    </a>
                <form action="#"
                    method="POST"
                    onsubmit="return confirm('Yakin hapus video ini?')"
                    class="w-1/2">

                    @csrf
                    @method('DELETE')

                    <button type="submit"
                        class="text-xs w-full items-center flex flex-col text-center text-black">
                        Hapus
                    </button>
                </form>
                </div>

                        </div>
                    @endforeach
                     <!-- Pagination -->
                    <div class="flex justify-center items-center space-x-2 mt-6">
                        @php
                            $current = $users->currentPage();
                            $last = $users->lastPage();
                            $start = max($current - 2, 1);
                            $end = min($start + 4, $last);

                            if ($end - $start < 4) {
                                $start = max($end - 4, 1);
                            }
                        @endphp

                        {{-- Previous --}}
                        @if ($current > 1)
                            <a href="{{ $users->appends(request()->query())->url($current - 1) }}"
                            class="px-3 py-2 bg-white border border-gray-300 text-black rounded-md hover:bg-gray-200">&lt;</a>
                        @endif

                        {{-- Page Numbers --}}
                        @for ($page = $start; $page <= $end; $page++)
                            @if ($page == $current)
                                <span class="px-3 py-2 bg-orange-500 text-white rounded-md font-bold">{{ $page }}</span>
                            @else
                                <a href="{{ $users->appends(request()->query())->url($page) }}"
                                class="px-3 py-2 bg-white border border-gray-300 text-black rounded-md hover:bg-gray-200">{{ $page }}</a>
                            @endif
                        @endfor

                        {{-- Next --}}
                        @if ($current < $last)
                            <a href="{{ $users->appends(request()->query())->url($current + 1) }}"
                            class="px-3 py-2 bg-white border border-gray-300 text-black rounded-md hover:bg-gray-200">&gt;</a>
                        @endif
                    </div>
                </div>
            </div>
        </div>
    </div>
    </div>  
    <script>
    document.addEventListener('DOMContentLoaded', function () {
        const buttons = document.querySelectorAll('.user-dropdown-btn');

        buttons.forEach(btn => {
            btn.addEventListener('click', function (e) {
                e.stopPropagation();
                const dropdown = this.parentElement.querySelector('.user-dropdown');
                dropdown.classList.toggle('hidden');
            });
        });

        // Klik di luar => tutup semua dropdown
        document.addEventListener('click', function () {
            document.querySelectorAll('.user-dropdown').forEach(drop => drop.classList.add('hidden'));
        });
    });
    </script>
@endsection