@extends('layouts.admin')
@section('title', 'Tambah Ebook')
@section('content')
                <!-- Content -->
                <div class="w-full p-5">
                    <h1 class="text-2xl font-pilcrow font-pilcrow-rounded font-bold text-black mb-2">Tambah Ebook</h1>
                    <p class="text-xs font-quicksand font-quicksand-regular text-black mb-5">Lengkapi informasi ebook sesuai kolom data.</p>

                    <form action="#" method="POST" enctype="multipart/form-data" class="grid grid-cols-2 gap-4 border-2 border-black shadow-black rounded-xl p-4 bg-white">
                        @csrf
                        <!-- Informasi Ebook -->
                        <div class="flex flex-col gap-3">
                            <h3 class="text-sm font-pilcrow font-pilcrow-medium">Informasi Ebook</h3>
                            <div>
                                <label class="text-[10px]">Judul</label>
                                <input type="text" name="title" placeholder="Judul ebook" class="w-full h-[4.5vh] border-2 border-black shadow-black rounded-md px-3 py-1 text-xs" required>
                            </div>
                             <div>
                                <label class="text-[10px]">Penulis</label>
                                <input type="text" name="penulis" placeholder="Nama penulis" class="w-full h-[4.5vh] border-2 border-black shadow-black rounded-md px-3 py-1 text-xs" required>
                            </div>
                            <div>
                                <label class="text-[10px]">Slug</label>
                                <input type="text" name="slug" placeholder="slug-ebook" class="w-full h-[4.5vh] border-2 border-black shadow-black rounded-md px-3 py-1 text-xs">
                            </div>
                            <div>
                                <label class="text-[10px]">Deskripsi</label>
                                <textarea name="description" placeholder="Deskripsi singkat" class="w-full min-h-[12vh] border-2 border-black shadow-black rounded-md px-3 py-1 text-xs"></textarea>
                            </div>
                            <div>
                                <label class="text-[10px]">Kategori</label>
                                <input type="text" name="kategori" placeholder="Kategori" class="w-full h-[4.5vh] border-2 border-black shadow-black rounded-md px-3 py-1 text-xs">
                            </div>
                            <div>
                                <label class="text-[10px]">File Ebook (URL)</label>
                                <input type="url" name="file_url" placeholder="https://example.com/ebook.pdf" class="w-full h-[4.5vh] border-2 border-black shadow-black rounded-md px-3 py-1 text-xs">
                            </div>
                        </div>

                        <!-- Thumbnail -->
                        <div class="flex flex-col gap-3">
                            <h3 class="text-sm font-pilcrow font-pilcrow-medium">Thumbnail</h3>
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
