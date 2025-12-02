@extends('layouts.admin')

@section('content')
    

<div class="w-full p-5">
    <div class="flex flex-row">
        <div class="w-full">
                        <h1 class="text-2xl font-pilcrow font-pilcrow-rounded font-bold text-black">Top Omzet</h1>
                          <p class="text-xs font-quicksand font-quicksand-regular text-black mb-5">
                             Tetap monitoring progres dan update aktivitas pendapatan Tefa
                          </p>
                        </div>
                    </div>
                    
                <div class="border-2 border-black shadow-black p-2 rounded-xl">
                    <div class="flex flex-row justify-between items-center mb-3">
                        <div class="text-[1vw] font-quicksand font-quicksand-regular text-black">
                            {{-- blank --}}
                        </div>
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

                <table class="w-full">  
                    <tr  class="text-center">
                        <td>No</td>
                        <td>Nama</td>
                        <td>Jurusan</td>
                        <td>Top Omzet</td>
                        <td>Nilai</td>
                    </tr>
                    <tr class="">
                        <td colspan="6">
                            <div class="w-full h-[1px] bg-black rounded-full"></div>
                        </td>
                    </tr>
                    <tr  class="text-center">
                        <td>1</td>
                        <td>Charless</td>
                        <td>PMN</td>
                        <td>Rp 2.000.000</td>
                        <td>A</td>
                    </tr>
                    <tr  class="text-center">
                        <td>2</td>
                        <td>Charless</td>
                        <td>PMN</td>
                        <td>Rp 2.000.000</td>
                        <td>A</td>
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
