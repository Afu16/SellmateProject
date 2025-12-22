@extends('layouts.admin')
@section('title', isset($video) ? 'Edit Video' : 'Tambah Video')
@section('content')

<div class="w-full p-5">
    <h1 class="text-2xl font-pilcrow font-pilcrow-rounded font-bold text-black mb-2">
        {{ isset($video) ? 'Edit Video' : 'Tambah Video' }}
    </h1>
    <p class="text-xs font-quicksand font-quicksand-regular text-black mb-5">
        Lengkapi informasi video sesuai kolom data.
    </p>

    @if ($errors->any())
        <div class="mb-4 p-3 border-2 border-red-600 bg-red-100 text-red-800 rounded-lg text-sm">
            {{ $errors->first() }}
        </div>
    @endif

    <form class="grid grid-cols-2 gap-4 border-2 border-black shadow-black rounded-xl p-4 bg-white" action="{{ isset($video) ? route('admin.videos.update', $video->id) : route('admin.videos.store') }}"
          method="POST"
          enctype="multipart/form-data"
          class="flex flex-col gap-5">

        @csrf
        @if(isset($video))
            @method('PUT')
        @endif

        @php
            if(isset($video) && $video->duration){
                $parts = explode(':', $video->duration);
                $h = $parts[0] ?? 0;
                $m = $parts[1] ?? 0;
                $s = $parts[2] ?? 0;
            } else {
                $h = $m = $s = 0;
            }
        @endphp

        <!-- Informasi Video -->

            <div class="flex flex-col gap-3">
                <h3 class="text-sm font-pilcrow font-pilcrow-medium">Informasi Video</h3>
                
                <div>
                    <label class="text-[10px]">Judul Video</label>
                    <input type="text" name="title" value="{{ old('title', $video->title ?? '') }}"
                    placeholder="e.g videografi"
                    class="w-full h-[4.5vh] border-2 border-black shadow-black rounded-md px-3 py-1 text-xs" required>
                </div>
                
                <div>
                    <label class="text-[10px]">Deskripsi Video</label>
                    <textarea name="description" placeholder="e.g jawaban"
                    class="w-full min-h-[12vh] border-2 border-black shadow-black rounded-md px-3 py-1 text-xs" required>{{ old('description', $video->description ?? '') }}</textarea>
                </div>
                
                <div>
                    <label class="text-[10px]">Link Video</label>
                    <input type="url" name="link" value="{{ old('link', $video->link ?? '') }}"
                    placeholder="https://..."
                    class="w-full h-[4.5vh] border-2 border-black shadow-black rounded-md px-3 py-1 text-xs">
                </div>
                
                <div>
                    <label class="text-[10px]">Kategori Video</label>
                    <select name="category"
                    class="w-full h-[4.5vh] border-2 border-black shadow-black rounded-md px-3 py-1 text-xs"
                    required>
                    <option value="" disabled selected>Pilih kategori</option>
                    <option value="inspirasi" {{ (old('category', $video->category ?? '') == 'inspirasi') ? 'selected' : '' }}>Inspirasi</option>
                    <option value="tips" {{ (old('category', $video->category ?? '') == 'tips') ? 'selected' : '' }}>Tips</option>
                </select>
            </div>
            
            <div>
                <label class="text-[10px]">Durasi (jam:menit:detik)</label>
                <div class="flex gap-2 items-center">
                    <input type="number" name="hour" min="0" max="99" value="{{ old('hour', $h) }}"
                    class="w-[30%] h-[4.5vh] border-2 border-black rounded-md text-xs text-center">
                    <span>:</span>
                    <input type="number" name="minute" min="0" max="59" value="{{ old('minute', $m) }}"
                    class="w-[30%] h-[4.5vh] border-2 border-black rounded-md text-xs text-center">
                    <span>:</span>
                    <input type="number" name="second" min="0" max="59" value="{{ old('second', $s) }}"
                    class="w-[30%] h-[4.5vh] border-2 border-black rounded-md text-xs text-center">
                </div>
            </div>
            
            <div>
                <label class="text-[10px]">Tanggal Publikasi</label>
                <input type="date" name="published_at"
                value="{{ old('published_at', isset($video) ? $video->published_at->format('Y-m-d') : '') }}"
                class="w-full h-[4.5vh] border-2 border-black shadow-black rounded-md px-3 py-1 text-xs">
            </div>
        </div>
        
        <!-- Thumbnail -->
        <div class="flex flex-col gap-3">
            <h3 class="text-sm font-pilcrow font-pilcrow-medium">Thumbnail Video</h3>
            
            <div>
                <label class="text-[10px]">Thumbnail Source</label>
                <select name="thumbnail_source" id="thumbnail_source"
                class="w-full h-[4.5vh] border-2 border-black shadow-black rounded-md px-3 py-1 text-xs">
                <option value="youtube" {{ old('thumbnail_source', $video->thumbnail_source ?? 'youtube') == 'youtube' ? 'selected' : '' }}>Dari YouTube</option>
                <option value="upload" {{ old('thumbnail_source', $video->thumbnail_source ?? '') == 'upload' ? 'selected' : '' }}>Upload Manual</option>
            </select>
        </div>
        
        <div id="manual_thumbnail" class="border-2 border-black rounded-xl h-[30vh] flex items-center justify-center bg-gray-50 ">
            <input type="file" name="thumbnail" accept="image/*" class="text-xs">
        </div>
        
        <div id="youtube_info" class="border-2 border-dashed border-black rounded-xl h-[30vh] flex items-center justify-center text-xs text-gray-500">
            Thumbnail akan otomatis diambil dari YouTube
        </div>
    </div>
    <!-- Tombol -->
    <div class="col-span-2  gap-2 flex justify-end">
        <a href="{{ route('admin.videos') }}" class="bg-white px-5 py-2 text-nowrap text-xs rounded-xl border-2 border-secondary shadow-secondary">Kembali</a>
        <button type="submit" class="bg-secondary px-5 py-2 text-nowrap text-xs rounded-xl border-2 border-black shadow-black">{{ isset($video) ? 'Update' : 'Simpan' }}</button>
    </div>
    
    
</form>
</div>

<script>
document.addEventListener('DOMContentLoaded', function () {
    const source = document.getElementById('thumbnail_source');
    const manual = document.getElementById('manual_thumbnail');
    const youtube = document.getElementById('youtube_info');

    function toggleThumbnail() {
        if (source.value === 'upload') {
            manual.classList.remove('hidden');
            youtube.classList.add('hidden');
        } else {
            manual.classList.add('hidden');
            youtube.classList.remove('hidden');
        }
    }

    source.addEventListener('change', toggleThumbnail);
    toggleThumbnail(); // initial
});
</script>

@endsection