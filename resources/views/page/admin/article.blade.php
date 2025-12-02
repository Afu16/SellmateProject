@extends('layouts.admin')

@section('content')
<!-- Content -->
            <div class="w-full p-5">
                  <div class="flex flex-row">
                    <div class="w-full">
                        <h1 class="text-2xl font-pilcrow font-pilcrow-rounded font-bold text-black">Katalog Artikel</h1>
                          <p class="text-xs font-quicksand font-quicksand-regular text-black mb-5">
                              Kelola artikel dengan mudah
                          </p>
                    </div>
                    <div class="m-auto">
                        <a href="{{ route('admin.articles.create') }}" class="bg-secondary px-5 py-2 text-nowrap text-xs rounded-xl border-2 border-black shadow-black">
                            Tambah Artikel
                        </a>
                    </div>
                </div>
                <div class="flex flex-col gap-5">

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
