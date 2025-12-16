@extends('layouts.admin')
@section('title', 'Katalog Video')
@section('content') 
<div class="w-full p-5">
            <div class="flex flex-col gap-0 mb-2">
                @if (session('success'))
            <div class="mb-4 p-3 border-2 border-green-600 bg-green-100 text-green-800 rounded-lg text-sm">
                {{ session('success') }}
            </div>
        @endif

        @if ($errors->any())
            <div class="mb-4 p-3 border-2 border-red-600 bg-red-100 text-red-800 rounded-lg text-sm">
                {{ $errors->first() }}
            </div>
        @endif  
                    <div class="w-full">
                        <h1 class="text-2xl font-pilcrow font-pilcrow-rounded font-bold text-black">Katalog Video</h1>
                        <p class="text-xs font-quicksand font-quicksand-regular text-black">
                            Kelola produk unggulan tefa dengan mudah
                        </p>
                    </div>
                     <div class="ml-auto flex gap-2">
                        @php
                            function filterBtn($active) {
                                return $active
                                    ? 'border-secondary shadow-secondary'
                                    : 'border-black shadow-black';
                            }
                        @endphp                       
<a href="{{ route('admin.videos', ['search' => request('search')]) }}"
   class="bg-white inline-flex relative w-[5.3vw] gap-1 h-[3.5vh] justify-between
          border-2 {{ filterBtn(!request('category')) }}
          text-black rounded-md px-2 py-1 text-center text-[7px]">
    <span class="relative top-[0.2vh] text-nowrap">Semua</span>
</a>
<a href="{{ route('admin.videos', ['category' => 'tips', 'search' => request('search')]) }}"
   class="bg-white inline-flex relative w-[4.3vw] gap-1 h-[3.5vh] justify-between
          border-2 {{ filterBtn(request('category') === 'tips') }}
          text-black rounded-md px-2 py-1 text-center text-[7px]">
    <span class="relative top-[0.2vh] text-nowrap">Tips</span>
</a>

<a href="{{ route('admin.videos', ['category' => 'inspirasi', 'search' => request('search')]) }}"
   class="bg-white inline-flex relative w-[5.8vw] gap-1 h-[3.5vh] justify-between
          border-2 {{ filterBtn(request('category') === 'inspirasi') }}
          text-black rounded-md px-2 py-1 text-center text-[7px]">
    <span class="relative top-[0.2vh] text-nowrap">Inspirasi</span>
</a>

<form method="GET"
      action="{{ route('admin.videos') }}"
      id="searchForm"
      class="relative bottom-[0.4vh]">

    <input type="hidden" name="category" value="{{ request('category') }}">

    <input
        type="search"
        name="search"
        id="searchInput"
        value="{{ request('search') }}"
        placeholder="Search"
        class="w-[15vw] h-[3.5vh] border-2 border-black rounded-md shadow-black
               px-3 py-1 pr-8 text-[7px]"
    />
</form>

                         <a href="{{ route('admin.videos.create') }}" class="bg-secondary inline-flex relative w-[11vw] gap-1 h-[3.5vh] justify-between text-white rounded-md shadow-black px-2 py-1 text-[7px]">
                                <span class="relative top-[0.5vh] gap-1 text-nowrap">Tambah Video </span><img src="/assets/svg/fluentPlus-icon.svg" alt="newCalendar-icon" width="10" height="10">
                        </a>
                    </div>
               
                    </div>


                   <div class="w-full  border-2 border-black shadow-black rounded-lg">                            
                        <div class="flex justify-between items-center p-3">
                            <p class="text-[1.2vw] font-quicksand font-quicksand-medium text-black w-[1vw] text-center">No</p>
                            <p class="text-[1.2vw] font-quicksand font-quicksand-medium text-black w-[5vw] text-center">Foto</p>
                            <p class="text-[1.2vw] font-quicksand font-quicksand-medium text-black w-[4vw] text-nowrap">Judul</p>
                            <p class="text-[1.2vw] font-quicksand font-quicksand-medium text-black w-[5vw] text-nowrap">kreator</p>
                            <p class="text-[1.2vw] font-quicksand font-quicksand-medium text-black w-[6vw] text-nowrap">Durasi</p>
                            <p class="text-[1.2vw] font-quicksand font-quicksand-medium text-black w-[4vw] text-center">Kategory</p>
                            <p class="text-[1.2vw] font-quicksand font-quicksand-medium text-black w-[4vw] text-center">Aksi</p>
                        </div>

                        <hr class="border-t-2 border-black">

        <div class="">
        @foreach ($videos as $video)
            <div class="flex justify-between border-b-2 border-b-black items-center p-3 relative"
                x-data="{open:false}" @keydown.escape.window="open=false">
                <p class="text-[1.2vw] font-quicksand font-quicksand-medium text-black w-[1vw] text-center">
                    {{ $loop->iteration }}
                </p>
                <p class="text-[1.2vw] font-quicksand font-quicksand-medium text-black w-[5vw] text-center">
                    <img class="border-2 border-black rounded-md"
                        src="{{ asset('storage/'.$video->thumbnail) }}"
                        alt="Produk" width="50" height="50">
                </p>
                    <p 
                    x-data="{ open: false }"
                    @click="open = !open"
                    :class="open ? '' : 'truncate'"
                    class="text-[1.2vw] font-quicksand font-quicksand-medium text-black w-[4vw] cursor-pointer"
                    >
                    {{ $video->title }}
                </p>
                <p class="text-[1.2vw] font-quicksand font-quicksand-medium text-black w-[5vw] text-nowrap">
                    {{ $video->user_id }}
                </p>
                <p class="text-[1.2vw] font-quicksand font-quicksand-medium text-black w-[6vw] text-nowrap">
                    {{ $video->duration }}
                </p>
                <p class="text-[1.2vw] font-quicksand font-quicksand-medium text-black w-[4vw] text-center">
                    {{ $video->category }}
                </p>
                <p class="text-[1.2vw] font-quicksand font-quicksand-medium text-black w-[4vw] items-center">
                    <button type="button" class="focus:outline-none inline-flex items-center justify-center w-6 h-6"
                            @click.stop="open = !open">
                        <img src="/assets/svg/other-icon.svg" alt="other icon" width="2" height="2">
                    </button>
                </p>
                <div x-show="open" x-transition.opacity @click.outside="open=false"
                    class="absolute right-7 top-8 rounded-md flex flex-row gap-1 justify-between bg-white border-2 border-black p-2 w-[12vw] z-10">
                    
                    <div @click="open=false"
                        class="absolute w-5 h-5 top-[-1vh] right-[-1vh] text-black text-xs rounded-full bg-red-600 flex items-center justify-center">
                        X
                    </div>

                <form action="{{ route('admin.videos.destroy', $video->id) }}"
                    method="POST"
                    onsubmit="return confirm('Yakin hapus video ini?')"
                    class="w-1/2">

                    @csrf
                    @method('DELETE')

                    <button type="submit"
                        class="text-xs w-full items-center flex flex-col text-center text-black">
                        <img src="/assets/svg/fluentTrashX-icon.svg" alt="trash">
                        Hapus
                    </button>
                </form>

                <a href="{{ route('admin.videos.edit', $video->id) }}"
                class="text-xs w-1/2 items-center flex flex-col text-center text-black">
                    <img src="/assets/svg/fluentBoxEdit-icon.svg" alt="Edit">
                    Edit
                </a>
                </div>
            </div>
        @endforeach
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
document.addEventListener('DOMContentLoaded', function () {
    const input = document.getElementById('searchInput');
    let timer;

    input.addEventListener('input', function () {
        clearTimeout(timer);

        timer = setTimeout(() => {
            const params = new URLSearchParams(window.location.search);

            if (input.value) {
                params.set('search', input.value);
            } else {
                params.delete('search');
            }

            window.location.search = params.toString();
        }, 400);
    });
});


    </script>
@endsection
