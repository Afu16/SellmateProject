@extends('layouts.admin')
@section('title', 'Katalog Produk')
@section('content')
    
<div class="w-full p-5">
    <div class="flex flex-row justify-between items-center">
        <div class="w-full">
                        <h1 class="text-2xl font-pilcrow font-pilcrow-rounded font-bold text-black">Katalog Produk</h1>
                          <p class="text-xs font-quicksand font-quicksand-regular text-black mb-5">
                              Kelola produk unggulan tefa dengan mudah
                          </p>
                        </div>
                    <div class="flex gap-2">
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


                         <a href="{{ route('admin.products.create') }}" class="bg-secondary inline-flex relative w-[11vw] gap-1 h-[3.5vh] justify-between text-white rounded-md shadow-black px-2 py-1 text-[7px]">
                                <span class="relative top-[0.5vh] gap-1 text-nowrap">Tambah Produk </span><img src="/assets/svg/fluentPlus-icon.svg" alt="newCalendar-icon" width="10" height="10">
                        </a>
                    </div>
                </div>

               

                    <div class="w-full  border-2 border-black shadow-black rounded-lg">                            
                        <div class="flex justify-between items-center p-3">
                            <p class="text-[1.2vw] font-quicksand font-quicksand-medium text-black w-[1vw] text-center">No</p>
                            <p class="text-[1.2vw] font-quicksand font-quicksand-medium text-black w-[5vw] text-center">Foto</p>
                            <p class="text-[1.2vw] font-quicksand font-quicksand-medium text-black w-[4vw] text-nowrap">Nama Produk</p>
                            <p class="text-[1.2vw] font-quicksand font-quicksand-medium text-black w-[5vw] text-nowrap">Jenis Produk</p>
                            <p class="text-[1.2vw] font-quicksand font-quicksand-medium text-black w-[6vw] text-nowrap">Harga Produk</p>
                            <p class="text-[1.2vw] font-quicksand font-quicksand-medium text-black w-[4vw] text-center">Komisi</p>
                            <p class="text-[1.2vw] font-quicksand font-quicksand-medium text-black w-[4vw] text-center">Aksi</p>
                        </div>

                        <hr class="border-t-2 border-black">

                        <div class="" x-data="{ openId: null }">
                            @foreach ($products as $product)
                            <div class="flex justify-between border-b-2 border-b-black items-center p-3 relative" x-data="{open:false}" @keydown.escape.window="open=false">
                                <p class="text-[1.2vw] font-quicksand font-quicksand-medium text-black w-[1vw] text-center">{{(($products->currentPage() - 1) * $products->perPage()) + $loop->iteration}}</p>
                                <p class="text-[1.2vw] font-quicksand font-quicksand-medium text-black w-[5vw] text-center">
                                <img class="border-2 border-black rounded-md w-50 h-50 object-cover" src="{{ asset('assets/img/' . $product->product_photo) }}" alt="{{ $product->name }}">
                            </p>
                            <p 
                                @click="openId = openId === {{ $product->id }} ? null : {{ $product->id }}"
                                class="text-[1.2vw] font-quicksand font-quicksand-medium text-black w-[4vw] cursor-pointer"
                                :class="{ 'truncate': openId !== {{ $product->id }} }"
                            >
                                {{ $product->name }}
                            </p>
                            <p class="text-[1.2vw] font-quicksand font-quicksand-medium text-black w-[5vw] text-nowrap">{{ $product->category }}</p>
                            <p class="text-[1.2vw] font-quicksand font-quicksand-medium text-black w-[6vw] text-nowrap">Rp. {{ number_format($product->price, 0, ',', '.') }}</p>
                            <p class="text-[1.2vw] font-quicksand font-quicksand-medium text-black w-[4vw] text-center">{{ $product->comission * 100 }}%</p>
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
                            $current = $products->currentPage();
                            $last = $products->lastPage();
                            $start = max($current - 2, 1);
                            $end = min($start + 4, $last);

                            if ($end - $start < 4) {
                                $start = max($end - 4, 1);
                            }
                        @endphp

                        {{-- Previous --}}
                        @if ($current > 1)
                            <a href="{{ $products->appends(request()->query())->url($current - 1) }}"
                            class="px-3 py-2 bg-white border border-gray-300 text-black rounded-md hover:bg-gray-200">&lt;</a>
                        @endif

                        {{-- Page Numbers --}}
                        @for ($page = $start; $page <= $end; $page++)
                            @if ($page == $current)
                                <span class="px-3 py-2 bg-orange-500 text-white rounded-md font-bold">{{ $page }}</span>
                            @else
                                <a href="{{ $products->appends(request()->query())->url($page) }}"
                                class="px-3 py-2 bg-white border border-gray-300 text-black rounded-md hover:bg-gray-200">{{ $page }}</a>
                            @endif
                        @endfor

                        {{-- Next --}}
                        @if ($current < $last)
                            <a href="{{ $products->appends(request()->query())->url($current + 1) }}"
                            class="px-3 py-2 bg-white border border-gray-300 text-black rounded-md hover:bg-gray-200">&gt;</a>
                        @endif
                    </div>
    
        </div>
        </div>
    </div>
    @endsection
