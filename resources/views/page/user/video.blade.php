<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Video</title>
    @vite('resources/css/app.css')
</head>
<body class="bg-white">
    <div class="p-6">
        <!-- Header -->
        <div class="flex items-center justify-between mb-6">
            <div class="flex items-center w-full">
                <a href="{{ url('/dashboard') }}" class="mr-4">
                    <img class="w-8 h-8" src="{{ asset('assets/svg/arrow-icon.svg') }}" alt="arrow">
                </a>
                <h1 class="text-2xl font-pilcrow font-pilcrow-bold text-black select-none text-nowrap">Video</h1>
                <div class="absolute flex top-4 right-6 items-center border-2 border-black bg-white rounded-xl shadow-black shadow-md py-1 px-5 w-56">
                    <div class="flex items-center">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 text-black" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z" />
                        </svg>
                    </div>
                    <input type="search" name="search" id="search" placeholder="Search" class="w-full text-sm font-quicksand font-quicksand-regular focus:border-none focus:outline-none focus:ring-0 border-0 bg-transparent">
                </div>
            </div>
        </div>
        
        <!-- Tab Navigation -->
        <div class="flex gap-[4vw] mb-6">

            {{-- Tombol Inspirasi (aktif kalau tidak ada filter atau filter=inspirasi) --}}
            <a href="{{ route('videos') }}?filter=inspirasi"
            class="w-56 px-6 py-2 rounded-xl shadow-black border-2 border-black font-pilcrow font-pilcrow-bold shadow-md 
            text-center inline-block
            {{ (!request('filter') || request('filter') == 'inspirasi') ? 'bg-[#DD661D] text-white' : 'bg-white text-black' }}">
                Inspirasi
            </a>

            {{-- Tombol Tips --}}
            <a href="{{ route('videos') }}?filter=tips"
            class="w-56 px-6 py-2 rounded-xl shadow-black border-2 border-black font-pilcrow font-pilcrow-bold shadow-md 
            text-center inline-block
            {{ request('filter') == 'tips' ? 'bg-[#DD661D] text-white' : 'bg-white text-black' }}">
                Tips
            </a>
        </div>
      
        <!-- Video Cards Wrapper -->
        <div id="video-wrapper" class="space-y-4">

            <!-- Pesan tidak ditemukan -->
            <div id="not-found" class="hidden text-center text-gray-500 mt-10">
                Tidak ada video ditemukan.
            </div>

            <!-- Semua card video dibungkus di sini -->
            <div id="video-list" class="space-y-4">
                @foreach($videos as $video)
                <a href="{{ route('videos.show', $video->id) }}" 
                class="video-card block"
                data-title="{{ strtolower($video->title) }}"
                data-description="{{ strtolower($video->description) }}"
                data-category="{{ strtolower($video->category) }}">

                    <div class="bg-[#3C096C] rounded-2xl border-2 border-black shadow-black overflow-hidden">
                        <div class="relative p-4 rounded-xl">
                            <img
                                src="{{ $video->thumbnail ? (Str::startsWith($video->thumbnail, 'http') ? $video->thumbnail : asset('storage/' . $video->thumbnail)) : asset('images/no-thumbnail.png') }}"
                                alt="Thumbnail"
                                class="w-full h-48 object-cover rounded-lg"
                            />

                            <div class="absolute bottom-4 left-4 text-white">
                                <h3 class="text-sm font-pilcrow font-pilcrow-heavy mb-1">{{ $video->title }}</h3>
                                <p class="text-sm font-quicksand font-quicksand-regular">
                                    {{ $video->category }} | Author: {{ $video->user->name ?? 'Anonim' }}
                                </p>
                            </div>

                            <div class="absolute bottom-4 right-4 bg-white text-black px-2 py-1 rounded text-xs font-quicksand font-quicksand-regular">
                                {{ $video->duration ?? '--:--' }}
                            </div>
                        </div>

                        <div class="p-4">
                            <p class="text-sm font-quicksand font-quicksand-regular text-white mb-3">{{ $video->description }}</p>
                            <div class="flex justify-end">

                                {{-- <a href="{{ $video->link }}" target="_blank" class="w-6 h-6">
                                    <svg class="w-full h-full text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                            d="M8.684 13.342C8.886 12.938 9 12.482 9 12c0-.482-.114-.938-.316-1.342m0 2.684a3 3 0 110-2.684m0 2.684l6.632 3.316m-6.632-6l6.632-3.316m0 0a3 3 0 105.367-2.684 3 3 0 00-5.367 2.684zm0 9.316a3 3 0 105.367 2.684 3 3 0 00-5.367-2.684z"></path>
                                    </svg>
                                </a> --}}
                            <a href="#" onclick="shareVideo('{{ $video->id }}'); return false;" class="w-6 h-6 block">
                            <svg class="w-full h-full text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M8.684 13.342C8.886 12.938 9 12.482 9 12c0-.482-.114-.938-.316-1.342m0 2.684a3 3 0 110-2.684m0 2.684l6.632 3.316m-6.632-6l6.632-3.316m0 0a3 3 0 105.367-2.684 3 3 0 00-5.367 2.684zm0 9.316a3 3 0 105.367 2.684 3 3 0 00-5.367-2.684z">
                                </path>
                            </svg>
                        </a>

                            </div>
                        </div>

                    </div>
                </a>
                @endforeach
            </div>
        </div>

        <!-- Modal Share -->
<div id="shareModal" class=" fixed inset-0 bg-black/50 flex justify-center items-center z-50">
    <div class="bg-white w-80 p-5 rounded-xl shadow-lg">
        <h2 class="text-lg font-bold mb-3">Bagikan Video</h2>

        <div id="shareLinkBox" 
             class="p-2 border rounded bg-gray-100 text-xs break-all mb-3"></div>

        <button id="copyBtn" 
            class="w-full mb-2 bg-blue-600 text-white py-2 rounded">Copy Link</button>

        <button id="waBtn" 
            class="w-full mb-2 bg-green-600 text-white py-2 rounded">Share WhatsApp</button>

        <button id="tgBtn" 
            class="w-full mb-2 bg-blue-500 text-white py-2 rounded">Share Telegram</button>

        <button id="systemShareBtn" 
            class="w-full mb-2 bg-gray-800 text-white py-2 rounded">Share ke Aplikasi Lain</button>

        <button onclick="closeShareModal()" 
            class="w-full bg-gray-300 py-2 rounded">Tutup</button>
    </div>
</div>


    <script>
    const searchInput = document.getElementById('search');
    const cards = document.querySelectorAll('.video-card');
    const notFound = document.getElementById('not-found');
    const videoList = document.getElementById('video-list'); 

    searchInput.addEventListener('input', function () {
        const keyword = this.value.toLowerCase();
        const activeFilter = "{{ strtolower(request('filter')) }}";

        let visibleCount = 0;

        cards.forEach(card => {
            const title = card.dataset.title;
            const desc = card.dataset.description;
            const category = card.dataset.category;

            const matchSearch = title.includes(keyword) || desc.includes(keyword);
            const matchFilter = !activeFilter || activeFilter === category;

            if (matchSearch && matchFilter) {
                card.style.display = "block";
                visibleCount++;
            } else {
                card.style.display = "none";
            }
        });

        // Jika tidak ada hasil = sembunyikan seluruh wrapper card
        if (visibleCount === 0) {
            videoList.classList.add('hidden');
            notFound.classList.remove('hidden');
        } else {
            videoList.classList.remove('hidden');
            notFound.classList.add('hidden');
        }
    });
    let currentShareLink = "";

async function shareVideo(id) {
    try {
        const res = await fetch(`/video/share/${id}`);
        const data = await res.json();
        currentShareLink = data.link;

        if (!currentShareLink) {
            alert("Link tidak ditemukan");
            return;
        }

        document.getElementById("shareLinkBox").innerText = currentShareLink;

        openShareModal();

    } catch (err) {
        alert("Gagal mengambil link share");
    }
}

function openShareModal() {
    document.getElementById('shareModal').classList.remove('hidden');
}

function closeShareModal() {
    document.getElementById('shareModal').classList.add('hidden');
}

// --- tombol copy ---
document.getElementById("copyBtn").onclick = async () => {
    await navigator.clipboard.writeText(currentShareLink);
    alert("Link disalin!");
};

// --- tombol WA ---
document.getElementById("waBtn").onclick = () => {
    window.open(`https://wa.me/?text=${encodeURIComponent(currentShareLink)}`, "_blank");
};

// --- tombol Telegram ---
document.getElementById("tgBtn").onclick = () => {
    window.open(`https://t.me/share/url?url=${encodeURIComponent(currentShareLink)}`, "_blank");
};

// --- tombol Share API (jika support) ---
document.getElementById("systemShareBtn").onclick = async () => {
    if (navigator.share) {
        await navigator.share({
            title: "Cek video ini!",
            text: "Ebook keren nih 👇",
            url: currentShareLink,
        });
    } else {
        alert("Device tidak support share langsung");
    }
};
</script>
</body>
</html>
