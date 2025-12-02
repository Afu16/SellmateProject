@extends('layouts.admin')

@section('content')
    
<!-- Content -->
<div class="w-full p-5">
    <h1 class="text-2xl font-pilcrow font-pilcrow-rounded font-bold text-black mb-2">Tambah Produk</h1>
                    <p class="text-xs font-quicksand font-quicksand-regular text-black mb-5">Lengkapi informasi produk sesuai kolom data.</p>

                    <form action="#" method="POST" enctype="multipart/form-data" class="grid grid-cols-2 gap-4 border-2 border-black shadow-black rounded-xl p-4 bg-white">
                        @csrf
                        <!-- Informasi Produk -->
                        <div class="flex flex-col gap-3">
                            <h3 class="text-sm font-pilcrow font-pilcrow-medium">Informasi Produk</h3>
                            <div>
                                <label class="text-[10px]">Nama Produk</label>
                                <input type="text" name="name" placeholder="e.g Tiramisu" class="w-full h-[4.5vh] border-2 border-black shadow-black rounded-md px-3 py-1 text-xs" required>
                            </div>
                            <div>
                                <label class="text-[10px]">Jumlah</label>
                                <input type="number" name="quantity" placeholder="e.g 100" class="w-full h-[4.5vh] border-2 border-black shadow-black rounded-md px-3 py-1 text-xs" min="0" required>
                            </div>
                            <div>
                                <label class="text-[10px]">Harga</label>
                                <input type="number" name="price" placeholder="e.g 25000" class="w-full h-[4.5vh] border-2 border-black shadow-black rounded-md px-3 py-1 text-xs" min="0" required>
                            </div>
                            <div>
                                <label class="text-[10px]">Komisi</label>
                                <input type="number" step="0.01" name="comission" placeholder="Komisi" class="w-full h-[4.5vh] border-2 border-black shadow-black rounded-md px-3 py-1 text-xs">
                            </div>
                            <div>
                                <label class="text-[10px]">Kategori</label>
                                <input type="text" name="category" placeholder="e.g Makanan" class="w-full h-[4.5vh] border-2 border-black shadow-black rounded-md px-3 py-1 text-xs" required>
                            </div>
                        </div>
                        
                        <!-- Upload Foto Produk -->
                        <div class="flex flex-col gap-3">
                            <h3 class="text-sm font-pilcrow font-pilcrow-medium">Foto Produk</h3>
                            <div class="border-2 border-black rounded-xl h-[30vh] flex items-center justify-center bg-gray-50">
                                <input type="file" name="product_photo" accept="image/*" class="text-xs">
                            </div>
                        </div>

                        <div class="col-span-2 flex justify-end">
                            <button type="submit" class="bg-secondary px-5 py-2 text-nowrap text-xs rounded-xl border-2 border-black shadow-black">Simpan</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <script>
        document.addEventListener('DOMContentLoaded', function () {
            const btn = document.querySelector('.user-dropdown-btn');
            const dropdown = document.querySelector('.user-dropdown');
            btn && btn.addEventListener('click', function(e){ e.stopPropagation(); dropdown.classList.toggle('hidden'); });
            document.addEventListener('click', function(){ dropdown && dropdown.classList.add('hidden'); });
        });
    </script>
                        @endsection