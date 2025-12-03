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
                    <div class="">
                        <a href="{{ route('admin.products.create') }}" class="bg-secondary mb-5 px-5 py-2 text-nowrap text-xs rounded-xl border-2 border-black shadow-black">
                            Tambah Produk
                        </a>
                    </div>
                </div>

                <div class="border-2 border-black shadow-black rounded-xl p-2">
                    <div class="flex justify-between items-center mb-5">
                        <h6 class="text-sm mt-2 font-pilcrow font-pilcrow-medium text-black">Katalog Produk</h6>
                        <div class="flex items-center gap-2">
                            <div class="relative">
                                <input
                        type="search"
                        name="search"
                        id="search"
                        placeholder="Search"
                        class="w-[15vw] h-[3.5vh] border-2 border-black shadow-black rounded-md px-3 py-1 pr-8 text-[7px] focus:outline-none focus:ring-2 focus:ring-primary"
                        />
                        <svg
                        xmlns="http://www.w3.org/2000/svg"
                        class="absolute right-3 top-1/2 -translate-y-1/2 h-3 w-3 text-black cursor-pointer"
                        fill="none"
                        viewBox="0 0 24 24"
                        stroke="currentColor"
                        >
                        <path
                        stroke-linecap="round"
                        stroke-linejoin="round"
                        stroke-width="2"
                        d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z"
                        />
                    </svg>
                </div>
            </div>
        </div>
                    <table class="w-full p-5 rounded-md ">
                    <tr class="text-sm  m-auto">
                        <td>No</td>
                        <td>Foto</td>
                        <td class="">Nama Produk</td>
                        <td>Jenis Produk</td>
                        <td>Harga Produk</td>
                        <td>Komisi</td>
                        <td></td>
                    </tr>
                    <tr class="">
                        <td colspan="6">
                            <div class="w-full h-[1px] bg-black rounded-full"></div>
                        </td>
                    </tr>
                    <tr class="text-xs m-auto">   
                        <td>1</td>
                        <td>
                            <div class="flex items-center gap-2">
                                <img width="50px"  src="/storage/profile/QzBiJ2sbQ5yIgcy2vEOEOA1R7hwyNYvwdmzbwez5.jpg" alt="check-icon" class=" justify-self-center">
                            </div>
                        </td>
                        <td>Tiramisu</td>
                        <td>Makanan</td>
                        <td>Rp. 25.000</td>
                        <td>10%</td>
                        <td>
                            <button>
                                <img src="/assets/svg/other-icon.svg" alt="Edit" class="w-[1.5vw] h-[1.5vh] mr-1">
                            </button>
                        </td>
                    </tr>
                </table>
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
