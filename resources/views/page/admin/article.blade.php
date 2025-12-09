@extends('layouts.admin')
@section('title', 'Katalog Artikel')
@section('content')
<!-- Content -->
            <div class="w-full p-5">
                  <div class="flex flex-col mb-3">
                    <div class="w-full">
                        <h1 class="text-2xl font-pilcrow font-pilcrow-rounded font-bold text-black">Katalog Artikel</h1>
                          <p class="text-xs font-quicksand font-quicksand-regular text-black">
                              Kelola artikel dengan mudah
                          </p>
                    </div>
                    <div class="ml-auto flex gap-2">
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


                         <a href="{{ route('admin.articles.create') }}" class="bg-secondary inline-flex relative w-[11vw] gap-1 h-[3.5vh] justify-between text-white rounded-md shadow-black px-2 py-1 text-[7px]">
                                <span class="relative top-[0.5vh] gap-1 text-nowrap">Tambah Artikel </span><img src="/assets/svg/fluentPlus-icon.svg" alt="newCalendar-icon" width="10" height="10">
                        </a>
                    </div>
                </div>
                {{-- <div class="flex flex-col gap-5">

                    <div class="flex flex-col">
                        <div class="bg-white px-4 py-1 text-nowrap text-xs rounded-xl border-2 border-black shadow-black">
                            <div class="flex flex-row text-xs rounded-xl gap-2">
                                <img width="200px"  src="/storage/profile/QzBiJ2sbQ5yIgcy2vEOEOA1R7hwyNYvwdmzbwez5.jpg" alt="check-icon" class=" justify-self-center">
                                <div class="flex w-full flex-col">
                                    <p class=" text-xl font-pilcrow font-pilcrow-bold text-black">Judul Artikel</p>
                                    <span class="flex gap-2">
                                        <img width="30px" height="30px"  src="/storage/profile/QzBiJ2sbQ5yIgcy2vEOEOA1R7hwyNYvwdmzbwez5.jpg" alt="check-icon" class=" justify-self-center">
                                        <span class="flex flex-col">
                                            <p class="font-pilcrow font-pilcrow-regular text-black"> Kombel aselole</p>
                                            <p class="text-[10px] font-pilcrow font-pilcrow-regular text-gray-400">Posted 39 January 2029</p>
                                        </span>
                                    </span>   
                                </div>
                                <button class="">
                                    <img src="/assets/svg/trash-icon.svg" alt="">
                                </button>
                                <button>
                                    <img src="/assets/svg/edit-icon.svg" alt="">
                                </button>
                            </div>
                        </div>
                    </div>

                     <div class="flex flex-col">
                        <div class="bg-white px-4 py-1 text-nowrap text-xs rounded-xl border-2 border-black shadow-black">
                            <div class="flex flex-row text-xs rounded-xl gap-2">
                                <img width="200px"  src="/storage/profile/QzBiJ2sbQ5yIgcy2vEOEOA1R7hwyNYvwdmzbwez5.jpg" alt="check-icon" class=" justify-self-center">
                                <div class="flex w-full flex-col">
                                    <p class=" text-xl font-pilcrow font-pilcrow-bold text-black">Judul Artikel</p>
                                    <span class="flex gap-2">
                                        <img width="30px" height="30px"  src="/storage/profile/QzBiJ2sbQ5yIgcy2vEOEOA1R7hwyNYvwdmzbwez5.jpg" alt="check-icon" class=" justify-self-center">
                                        <span class="flex flex-col">
                                            <p class="font-pilcrow font-pilcrow-regular text-black"> Kombel aselole</p>
                                            <p class="text-[10px] font-pilcrow font-pilcrow-regular text-gray-400">Posted 39 January 2029</p>
                                        </span>
                                    </span>   
                                </div>
                                    <button>
                                        <img src="/assets/svg/trash-icon.svg" alt="">
                                    </button>
                                    <button>
                                        <img src="/assets/svg/edit-icon.svg" alt="">
                                    </button>
                            </div>
                        </div>
                    </div>

                     <div class="flex flex-col">
                        <div class="bg-white px-4 py-1 text-nowrap text-xs rounded-xl border-2 border-black shadow-black">
                            <div class="flex flex-row text-xs rounded-xl gap-2">
                                <img width="200px"  src="/storage/profile/QzBiJ2sbQ5yIgcy2vEOEOA1R7hwyNYvwdmzbwez5.jpg" alt="check-icon" class=" justify-self-center">
                                <div class="flex w-full flex-col">
                                    <p class=" text-xl font-pilcrow font-pilcrow-bold text-black">Judul Artikel</p>
                                    <span class="flex gap-2">
                                        <img width="30px" height="30px"  src="/storage/profile/QzBiJ2sbQ5yIgcy2vEOEOA1R7hwyNYvwdmzbwez5.jpg" alt="check-icon" class=" justify-self-center">
                                        <span class="flex flex-col">
                                            <p class="font-pilcrow font-pilcrow-regular text-black"> Kombel aselole</p>
                                            <p class="text-[10px] font-pilcrow font-pilcrow-regular text-gray-400">Posted 39 January 2029</p>
                                        </span>
                                    </span>   
                                </div>
                                    <button>
                                        <img src="/assets/svg/trash-icon.svg" alt="">
                                    </button>
                                    <button>
                                        <img src="/assets/svg/edit-icon.svg" alt="">
                                    </button>
                            </div>
                        </div>
                    </div>
                </div> --}}

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

                        <div class="">
                            <div class="flex justify-between border-b-2 border-b-black items-center p-3 relative" x-data="{open:false}" @keydown.escape.window="open=false">
                                <p class="text-[1.2vw] font-quicksand font-quicksand-medium text-black w-[1vw] text-center">1</p>
                                <p class="text-[1.2vw] font-quicksand font-quicksand-medium text-black w-[5vw] text-center">
                                <img class="border-2 border-black rounded-md" src="/assets/img/example-img.jpg" alt="Produk" width="50" height="50">
                            </p>
                            <p class="text-[1.2vw] font-quicksand font-quicksand-medium text-black w-[4vw] text-nowrap">Owl</p>
                            <p class="text-[1.2vw] font-quicksand font-quicksand-medium text-black w-[5vw] text-nowrap">Makanan</p>
                            <p class="text-[1.2vw] font-quicksand font-quicksand-medium text-black w-[6vw] text-nowrap">Rp. 10.000</p>
                            <p class="text-[1.2vw] font-quicksand font-quicksand-medium text-black w-[4vw] text-center">10%</p>
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
