@extends('layouts.admin')
@section('title', 'Tambah Video')
@section('content')
    

<!-- Content -->
<div class="w-full p-5">
                    <h1 class="text-2xl font-pilcrow font-pilcrow-rounded font-bold text-black mb-2">Tambah Video</h1>
                    <p class="text-xs font-quicksand font-quicksand-regular text-black mb-5">Lengkapi informasi video sesuai kolom data.</p>
                    
                    <form action="#" method="POST" enctype="multipart/form-data" class="grid grid-cols-2 gap-4 border-2 border-black shadow-black rounded-xl p-4 bg-white">
                        @csrf
                        <!-- Informasi Video -->
                        <div class="flex flex-col gap-3">
                            <h3 class="text-sm font-pilcrow font-pilcrow-medium">Informasi Video</h3>
                            <div>
                                <label class="text-[10px]">Judul Video</label>
                                <input type="text" name="title" placeholder="e.g videografi" class="w-full h-[4.5vh] border-2 border-black shadow-black rounded-md px-3 py-1 text-xs" required>
                            </div>
                            <div>
                                <label class="text-[10px]">Deskripsi Video</label>
                                <textarea name="description" placeholder="e.g jawaban" class="w-full min-h-[12vh] border-2 border-black shadow-black rounded-md px-3 py-1 text-xs" required></textarea>
                            </div>
                            <div>
                                <label class="text-[10px]">Sumber channel (slug)</label>
                                <input type="text" name="slug" placeholder="e.g videografx" class="w-full h-[4.5vh] border-2 border-black shadow-black rounded-md px-3 py-1 text-xs">
                            </div>
                            <div>
                                <label class="text-[10px]">Link Video</label>
                                <input type="url" name="link" placeholder="https://..." class="w-full h-[4.5vh] border-2 border-black shadow-black rounded-md px-3 py-1 text-xs">
                            </div>
                            <div>
                                <label class="text-[10px]">Kategori Video</label>
                                <input type="text" name="category" placeholder="Pilih kategori" class="w-full h-[4.5vh] border-2 border-black shadow-black rounded-md px-3 py-1 text-xs">
                            </div>
                            <div>
                                <label class="text-[10px]">Durasi</label>
                                <input type="text" name="duration" placeholder="e.g 10:32" class="w-full h-[4.5vh] border-2 border-black shadow-black rounded-md px-3 py-1 text-xs">
                            </div>
                            <div>
                                <label class="text-[10px]">Tanggal Publikasi</label>
                                <input type="date" name="published_at" class="w-full h-[4.5vh] border-2 border-black shadow-black rounded-md px-3 py-1 text-xs">
                            </div>
                        </div>

                        <!-- Thumbnail -->
                        <div class="flex flex-col gap-3">
                            <h3 class="text-sm font-pilcrow font-pilcrow-medium">Thumbnail Video</h3>
                            <div class="border-2 border-black rounded-xl h-[30vh] flex items-center justify-center bg-gray-50">
                                <input type="file" name="thumbnail" accept="image/*" class="text-xs">
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