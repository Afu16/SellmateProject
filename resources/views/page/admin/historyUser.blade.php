@extends('layouts.admin')
@section('title', 'Transaksi Pengguna')
@section('content')
<div id="transaction-detail" class="w-full p-5">
    <div class="flex flex-col">
        <h1 class="text-2xl font-pilcrow font-pilcrow-rounded font-bold text-black">Aktivitas Transaksi</h1>
        <h1 class="text-xl font-pilcrow font-pilcrow-rounded text-black mb-2">{{ $user->name }}</h1>
        <div class="flex gap-2">
                <a href="{{ route('admin.history') }}"
                class="bg-white inline-flex relative w-[5.7vw] gap-1 h-[3.5vh] justify-between border-2 border-secondary text-black rounded-md shadow-secondary px-2 py-1 text-center text-[7px]">
                    <span class="relative top-[0.2vh] gap-1 text-nowrap">Kembali</span>
                </a>
                        <button  class="bg-white inline-flex relative w-[4.9vw] gap-1 h-[3.5vh] justify-between border-2 border-black text-black rounded-md shadow-black px-2 py-1 text-center text-[7px]">
                             <span class="relative top-[0.2vh] gap-1 text-nowrap">Bulan</span>
                         </button>
                        <button  class="bg-white inline-flex relative w-[10.8vw] h-[3.5vh] justify-between border-2 border-black text-black rounded-md shadow-black px-2 py-1 text-center text-[7px]">
                             <img src="/assets/svg/fluentCalendar-icon.svg" alt="Calender"><span class="relative top-[0.2vh] gap-1 text-nowrap">1 nov - 30 nov</span>
                         </button>
        </div>
    </div>

   <div class="w-full mt-2 border-2 border-black shadow-black rounded-lg">                            
                        <div class="flex justify-between items-center p-3">
                            <p class="text-[1.2vw] font-quicksand font-quicksand-medium text-black w-1/4  text-nowrap">Tanggal</p>
                            <p class="text-[1.2vw] font-quicksand font-quicksand-medium text-black w-1/4">Transaksi</p>
                            <p class="text-[1.2vw] font-quicksand font-quicksand-medium text-black w-1/4 text-center">Qty</p>
                            <p class="text-[1.2vw] font-quicksand font-quicksand-medium text-black w-1/4 ">Total Omzet</p>
                        </div>

                        <hr class="border-t-2 border-black">

        @forelse ($histories as $item)
        <div class="flex p-3 border-b">
            <p class="w-1/4 justify-between">
                {{ \Carbon\Carbon::parse($item->date)->format('d-m-Y') }}
            </p>
            <p 
            x-data="{ open: false }"
            @click="open = !open"
            :class="open ? '' : 'truncate'"
            class="w-1/4 cursor-pointer"
            >
                {{ $item->product->name ?? '-' }}
            </p>
            <p class="w-1/4 text-center">
                {{ $item->quantity }}
            </p>
            <p class="w-1/4 text-start">
                Rp {{ number_format($item->total_omzets, 0, ',', '.') }}
            </p>
        </div>
        @empty
        <div class="p-4 text-center text-gray-500">
            Tidak ada transaksi
        </div>
        @endforelse


            </div>
</div>

@endsection
