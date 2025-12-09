@extends('layouts.admin')
@section('title', 'Top Omzet')
@section('content')
    

<div class="w-full p-5">
    <div class="flex flex-row ">
        <div class="w-full">
                        <h1 class="text-2xl font-pilcrow font-pilcrow-rounded font-bold text-black">Top Omzet</h1>
                          <p class="text-xs font-quicksand font-quicksand-regular text-black mb-5">
                             Monitoring omzet yang didapat setiap saat
                          </p>
                        </div>
                    </div>
                    
                     <div class="flex absolute top-[22vh] right-5 gap-2">

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


                         <div class="bg-white inline-flex relative w-[7.5vw] h-[3.5vh] justify-between border-2 border-black rounded-md shadow-black px-2 py-1 text-[7px]">
                                <span class="relative top-[0.2vh] text-gray-400 gap-1 text-nowrap">Bulan ini </span><img src="/assets/svg/fluentCalendar-icon.svg" alt="newCalendar-icon" width="10" height="10">
                        </div>
                    </div>

                    
                                {{-- Table --}}
                <div class="w-full mt-2 border-2 border-black shadow-black rounded-lg">                            
                        <div class="flex justify-between items-center p-3">
                            <p class="text-[1.2vw] font-quicksand font-quicksand-medium text-black w-[3vw] text-center">No</p>
                            <p class="text-[1.2vw] font-quicksand font-quicksand-medium text-black w-[3vw] text-center">Username</p>
                            <p class="text-[1.2vw] font-quicksand font-quicksand-medium text-black w-[10vw]">Nama</p>
                            <p class="text-[1.2vw] font-quicksand font-quicksand-medium text-black w-[3vw]">Jurusan</p>
                            <p class="text-[1.2vw] font-quicksand font-quicksand-medium text-black w-[4vw] text-nowrap">Total Omzet</p>
                            <p class="text-[1.2vw] font-quicksand font-quicksand-medium text-black w-[4vw] text-center">Nilai</p>
                        </div>

                        <hr class="border-t-2 border-black">
                        @foreach ($omzets as $user)
                        <div class="flex justify-between border-b-2 border-b-black items-center p-3">
                            <p class="text-[1.2vw] w-[3vw] text-center">{{ $loop->iteration }}</p>
                            <p class="text-[1.2vw] w-[3vw] text-center">{{ $user->username }}</p>
                            <p class="text-[1.2vw] w-[10vw]">{{ $user->name }}</p>
                            <p class="text-[1.2vw] w-[3vw]">{{ $user->major }}</p>
                            <p class="text-[1.2vw] w-[4vw] text-nowrap">
                                Rp {{ number_format($user->omzets_sum_total_omzets ?? 0, 0, ',', '.') }}
                            </p>
                            <p class="text-[1.2vw] w-[4vw] text-center">{{ $user->score ?? '-' }}</p>
                        </div>
                        @endforeach
                      </div>
                     <!-- Pagination -->
                    <div class="flex justify-center items-center space-x-2 mt-6">
                        @php
                            $current = $omzets->currentPage();
                            $last = $omzets->lastPage();
                            $start = max($current - 2, 1);
                            $end = min($start + 4, $last);

                            if ($end - $start < 4) {
                                $start = max($end - 4, 1);
                            }
                        @endphp

                        {{-- Previous --}}
                        @if ($current > 1)
                            <a href="{{ $omzets->appends(request()->query())->url($current - 1) }}"
                            class="px-3 py-2 bg-white border border-gray-300 text-black rounded-md hover:bg-gray-200">&lt;</a>
                        @endif

                        {{-- Page Numbers --}}
                        @for ($page = $start; $page <= $end; $page++)
                            @if ($page == $current)
                                <span class="px-3 py-2 bg-orange-500 text-white rounded-md font-bold">{{ $page }}</span>
                            @else
                                <a href="{{ $omzets->appends(request()->query())->url($page) }}"
                                class="px-3 py-2 bg-white border border-gray-300 text-black rounded-md hover:bg-gray-200">{{ $page }}</a>
                            @endif
                        @endfor

                        {{-- Next --}}
                        @if ($current < $last)
                            <a href="{{ $omzets->appends(request()->query())->url($current + 1) }}"
                            class="px-3 py-2 bg-white border border-gray-300 text-black rounded-md hover:bg-gray-200">&gt;</a>
                        @endif
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
