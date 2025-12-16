@extends('layouts.admin')
@section('title', 'Katalog Ebook')
@section('content')
                <div class="w-full p-5">
                    <div class="flex flex-col mb-3 w-full">
                        <h1 class="text-2xl font-pilcrow font-pilcrow-rounded font-bold text-black">E-Book</h1>
                       <div class="ml-auto flex gap-2">
                          <button  class="bg-white inline-flex relative w-[5.3vw] gap-1 h-[3.5vh] justify-between border-2 border-secondary text-black rounded-md shadow-secondary px-2 py-1 text-center text-[7px]">
                             <span class="relative top-[0.2vh] gap-1 text-nowrap">Semua</span>
                         </button>
                        <button  class="bg-white inline-flex relative w-[4.3vw] gap-1 h-[3.5vh] justify-between border-2 border-black text-black rounded-md shadow-black px-2 py-1 text-center text-[7px]">
                             <span class="relative top-[0.2vh] gap-1 text-nowrap">Tips</span>
                         </button>
                        <button  class="bg-white inline-flex relative w-[5.8vw] gap-1 h-[3.5vh] justify-between border-2 border-black text-black rounded-md shadow-black px-2 py-1 text-center text-[7px]">
                             <span class="relative top-[0.2vh] gap-1 text-nowrap">Inspirasi</span>
                         </button>
                         <button  class="bg-white inline-flex relative w-[5.8vw] gap-1 h-[3.5vh] justify-between border-2 border-black text-black rounded-md shadow-black px-2 py-1 text-center text-[7px]">
                             <span class="relative top-[0.2vh] gap-1 text-nowrap">Edukasi</span>
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


                         <a href="{{ route('admin.ebooks.create') }}" class="bg-secondary inline-flex relative w-[11vw] gap-1 h-[3.5vh] justify-between text-white rounded-md shadow-black px-2 py-1 text-[7px]">
                                <span class="relative top-[0.5vh] gap-1 text-nowrap">Tambah E-Book </span><img src="/assets/svg/fluentPlus-icon.svg" alt="newCalendar-icon" width="10" height="10">
                        </a>
                       </div>
                    </div> 
                    
                     <div class="w-full  border-2 border-black shadow-black rounded-lg">                            
                        <div class="flex justify-between items-center p-3">
                            <p class="text-[1.2vw] font-quicksand font-quicksand-medium text-black w-[1vw] text-center">No</p>
                            <p class="text-[1.2vw] font-quicksand font-quicksand-medium text-black w-[5vw] text-center">Thumbnail</p>
                            <p class="text-[1.2vw] font-quicksand font-quicksand-medium text-black w-[4vw] text-nowrap">Judul</p>
                            <p class="text-[1.2vw] font-quicksand font-quicksand-medium text-black w-[5vw] text-nowrap">penulis</p>
                            <p class="text-[1.2vw] font-quicksand font-quicksand-medium text-black w-[6vw] text-nowrap">Kategory</p>
                            <p class="text-[1.2vw] font-quicksand font-quicksand-medium text-black w-[4vw] text-center">Aksi</p>
                        </div>

                        <hr class="border-t-2 border-black">

                        <div class="">
                            @foreach ($ebooks as $ebook)
                            <div class="flex justify-between border-b-2 border-b-black items-center p-3 relative" x-data="{open:false}" @keydown.escape.window="open=false">
                                <p class="text-[1.2vw] font-quicksand font-quicksand-medium text-black w-[1vw] text-center">{{(($ebooks->currentPage() - 1) * $ebooks->perPage()) + $loop->iteration}}</p>
                                <p class="text-[1.2vw] font-quicksand font-quicksand-medium text-black w-[5vw] text-center">
                                <img class="border-2 border-black rounded-md" src="{{ asset($ebook->thumbnail ?? 'assets/img/example-img.jpg') }}" alt="Produk" width="50" height="50">
                            </p>
                            <p 
                            x-data="{ open: false }"
                            @click="open = !open"
                            :class="open ? '' : 'truncate'"
                            class="w-1/4 cursor-pointer"
                            >
                            {{ $ebook->title }}</p>
                              <p class="text-[1.2vw] font-quicksand font-quicksand-medium text-black w-[5vw] text-nowrap">-</p>
                            <p class="text-[1.2vw] font-quicksand font-quicksand-medium text-black w-[6vw] text-nowrap">{{ $ebook->kategori }}</p>
                            <p class="text-[1.2vw] font-quicksand font-quicksand-medium text-black w-[4vw] items-center">
                                <button type="button" class="focus:outline-none inline-flex items-center justify-center w-6 h-6" @click.stop="open = !open">
                                    <img src="/assets/svg/other-icon.svg" alt="other icon" width="2" height="2">
                                </button>
                            </p>

                            <div x-show="open" x-transition.opacity @click.outside="open=false" class="absolute right-7 top-8 rounded-md flex flex-row gap-1 justify-between  bg-white border-2 border-black p-2 w-[12vw] z-10">
                                <div @click="open=false" class="absolute w-5 h-5 top-[-1vh] right-[-1vh] text-black text-xs rounded-full bg-red-600 flex items-center justify-center">X</div>
                                <a href="#" class="text-xs w-1/2 items-center flex flex-col text-center text-black">
                                    <img src="/assets/svg/fluentTrashX-icon.svg" alt="trash">
                                    Hapus
                                </a>
                                <a href="#" class="text-xs w-1/2 items-center flex flex-col text-center text-black">
                                    <img src="/assets/svg/fluentBoxEdit-icon.svg" alt="Edit">
                                    Edit
                                </a>
                            </div>
                         </div>
                            @endforeach                           
                        </div>
                    </div>
                      <!-- Pagination -->
                    <div class="flex justify-center items-center space-x-2 mt-6">
                        @php
                            $current = $ebooks->currentPage();
                            $last = $ebooks->lastPage();
                            $start = max($current - 2, 1);
                            $end = min($start + 4, $last);

                            if ($end - $start < 4) {
                                $start = max($end - 4, 1);
                            }
                        @endphp

                        {{-- Previous --}}
                        @if ($current > 1)
                            <a href="{{ $ebooks->appends(request()->query())->url($current - 1) }}"
                            class="px-3 py-2 bg-white border border-gray-300 text-black rounded-md hover:bg-gray-200">&lt;</a>
                        @endif

                        {{-- Page Numbers --}}
                        @for ($page = $start; $page <= $end; $page++)
                            @if ($page == $current)
                                <span class="px-3 py-2 bg-orange-500 text-white rounded-md font-bold">{{ $page }}</span>
                            @else
                                <a href="{{ $ebooks->appends(request()->query())->url($page) }}"
                                class="px-3 py-2 bg-white border border-gray-300 text-black rounded-md hover:bg-gray-200">{{ $page }}</a>
                            @endif
                        @endfor

                        {{-- Next --}}
                        @if ($current < $last)
                            <a href="{{ $ebooks->appends(request()->query())->url($current + 1) }}"
                            class="px-3 py-2 bg-white border border-gray-300 text-black rounded-md hover:bg-gray-200">&gt;</a>
                        @endif
                    </div>                   
            </div>

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