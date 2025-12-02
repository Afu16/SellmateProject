@extends('layouts.admin')

@section('content')
    
<div class="w-full p-5">
    <div class="flex flex-row">
                    <div class="w-full">
                        <h1 class="text-2xl font-pilcrow font-pilcrow-rounded font-bold text-black">Katalog Video</h1>
                        <p class="text-xs font-quicksand font-quicksand-regular text-black mb-5">
                            Kelola produk unggulan tefa dengan mudah
                        </p>
                    </div>
                     <div class="m-auto flex gap-2">
                        <button class="bg-tertiary px-5 py-2 text-nowrap text-xs rounded-xl border-2 border-black shadow-black">
                            Semua
                        </button>
                         <button class="bg-white px-6 py-2 text-nowrap text-xs rounded-xl border-2 border-black shadow-black">
                            Tips
                        </button>
                         <button class="bg-white px-4 py-2 text-nowrap text-xs rounded-xl border-2 border-black shadow-black">
                            Inspirasi
                        </button>
                         <button class="bg-secondary px-3 py-2 text-nowrap text-xs rounded-xl border-2 border-black shadow-black">
                            Tambah Video
                        </button>
                    </div>
                    </div>


                    <div class="mt-5 grid grid-cols-3 gap-4">
                        <div class="bg-white px-4 py-1 text-nowrap text-xs rounded-xl border-2 border-black shadow-black">
                              <div class="flex flex-col text-xs  rounded-xl gap-2">
                                <img width="200px"  src="/storage/profile/QzBiJ2sbQ5yIgcy2vEOEOA1R7hwyNYvwdmzbwez5.jpg" alt="check-icon" class="items-center m-auto rounded-xl border-1 border-black justify-self-center">
                                <h5 class="text-xs text-left font-pilcrow font-pilcrow-medium">BAKAYARO cihuy aselole</h5>
                                <h6 class="text-[10px] font-pilcrow font-pilcrow-light text-gray-500">extern</h6>
                                <div class="flex gap-2 ml-auto ">
                                    <a href=""><img class="" width="15px" src="/assets/svg/trash-icon.svg" alt=""></a>
                                    <a href=""><img width="17px" src="/assets/svg/edit-icon.svg" alt=""></a>
                                </div>
                            </div>
                        </div>
                        <div class="bg-white px-4 py-1 text-nowrap text-xs rounded-xl border-2 border-black shadow-black">
                              <div class="flex flex-col text-xs rounded-xl gap-2">
                                <img width="200px"  src="/storage/profile/QzBiJ2sbQ5yIgcy2vEOEOA1R7hwyNYvwdmzbwez5.jpg" alt="check-icon" class="items-center m-auto rounded-xl border-1 border-black justify-self-center">
                                <h5 class="text-xs text-left font-pilcrow font-pilcrow-medium">BAKAYARO cihuy aselole</h5>
                                <h6 class="text-[10px] font-pilcrow font-pilcrow-light text-gray-500">extern</h6>
                                <div class="flex gap-2 ml-auto ">
                                    <a href=""><img class="" width="15px" src="/assets/svg/trash-icon.svg" alt=""></a>
                                    <a href=""><img width="17px" src="/assets/svg/edit-icon.svg" alt=""></a>
                                </div>
                            </div>
                        </div>
                        <div class="bg-white px-4 py-1 text-nowrap text-xs rounded-xl border-2 border-black shadow-black">
                              <div class="flex flex-col text-xs rounded-xl gap-2">
                                <img width="200px"  src="/storage/profile/QzBiJ2sbQ5yIgcy2vEOEOA1R7hwyNYvwdmzbwez5.jpg" alt="check-icon" class="items-center m-auto rounded-xl border-1 border-black justify-self-center">
                                <h5 class="text-xs text-left font-pilcrow font-pilcrow-medium">BAKAYARO cihuy aselole</h5>
                                <h6 class="text-[10px] font-pilcrow font-pilcrow-light text-gray-500">extern</h6>
                                <div class="flex gap-2 ml-auto ">
                                    <a href=""><img class="" width="15px" src="/assets/svg/trash-icon.svg" alt=""></a>
                                    <a href=""><img width="17px" src="/assets/svg/edit-icon.svg" alt=""></a>
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
