@extends('layouts.admin')

@section('title', 'Histori Omzet')
@section('content')
    <div class="w-full p-5">
        <div class="flex flex-col w-full">
            <h1 class="text-2xl font-pilcrow font-pilcrow-rounded font-bold text-black">Histori Omzet</h1>
            <div class="flex gap-2 ml-auto mb-3">
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
            </div>
            <div class="flex flex-row w-full gap-2">
                <div class="w-full border-2 border-black shadow-black rounded-md p-2">
                    <div class="flex items-center gap-2">
                        <img src="/assets/svg/totalOmzet2-icon.svg" alt="Money">
                        <p class="text-[20px] font-quicksand font-quicksand-medium text-black">Balance Omzet</p>
                    </div>
                <p class="text-3xl mt-6 text-center">Rp {{ number_format($totalOmzet, 0, ',', '.') }}</p>
                </div>
                 <div class="w-full border-2 border-black shadow-black rounded-md p-2">
                    <div class="flex items-center gap-2">
                        <img src="/assets/svg/totalOmzet2-icon.svg" alt="Money">
                        <p class="text-[20px] font-quicksand font-quicksand-medium text-black">Total Transaksi</p>
                    </div>
<p class="text-3xl mt-6 text-center">
    {{ $totalTransaksi }} <span class="text-xl">Transaksi</span>
</p>
                </div>
            </div>
              <div class="w-full mt-2 border-2 border-black shadow-black rounded-lg">                            
                        <div class="flex justify-between items-center p-3">
                            <p class="text-[1.2vw] font-quicksand font-quicksand-medium text-black w-[3vw] text-center text-nowrap">Nama Siswa</p>
                            {{-- <p class="text-[1.2vw] font-quicksand font-quicksand-medium text-black w-[3vw] text-center">Kelas</p> --}}
                            <p class="text-[1.2vw] font-quicksand font-quicksand-medium text-black w-[5vw]">Kejuruan</p>
                            <p class="text-[1.2vw] font-quicksand font-quicksand-medium text-black w-[4vw] text-nowrap">Total Omzet</p>
                            <p class="text-[1.2vw] font-quicksand font-quicksand-medium text-black w-[3vw] text-nowrap">Terakhir Transaksi</p>
                            <p class="text-[1.2vw] font-quicksand font-quicksand-medium text-black w-[4vw] text-center mr-3">Aksi</p>
                        </div>

                        <hr class="border-t-2 border-black">

            @forelse ($omzets as $omzet)
            <div class="flex justify-between border-b-2 border-b-black items-center p-3">

                <p class="w-[3vw] text-center">
                    {{ $omzet->user->name ?? '-' }}
                </p>

                <p class="w-[5vw]">
                    {{ $omzet->user->major ?? '-' }}
                </p>

                <p class="w-[4vw] text-nowrap">
                    Rp {{ number_format($omzet->total_omzet, 0, ',', '.') }}
                </p>

                <p class="w-[3vw] text-nowrap">
                     {{ \Carbon\Carbon::parse($omzet->last_transaction)->format('d-m-Y') }}
                </p>

                <p class="w-[4vw] text-center mr-3">
                    <a href="{{ route('admin.history.detail', $omzet->user->id) }}" class="underline">Details</a>
                </p>

            </div>
            @empty
            <div class="p-4 text-center text-gray-500">
                Belum ada data omzet
            </div>
            @endforelse
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



@endsection
