<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Ebook</title>
    @vite(['resources/css/app.css'])
</head>
<body class="p-1">
<!-- Header -->
        <div class="flex p-6  items-center -mb-6">
            <a href="{{ url('/dashboard') }}" class="mr-4">
           <img class="w-8 h-8" src="{{ asset('assets/svg/arrow-icon.svg') }}" alt="arrow">
            </a>
            <h1 class=" text-2xl font-bold text-black text-nowrap select-none">Ebook Tefa</h1>
            <div class="absolute top-5 -right-4 flex items-center border-2 border-black bg-white rounded-xl shadow-black shadow-md py-1 px-5 w-48">
                       <div class="flex items-center">
                           <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 text-black" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                               <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z" />
                           </svg>
                       </div>
                       <input type="search" name="search" id="search" placeholder="Search" class="w-full text-sm font-quicksand font-quicksand-regular focus:border-none focus:outline-none focus:ring-0 border-0 bg-transparent">
                   </div>
        </div>
<div class="pt-8 px-4">
    <div class="flex gap-[3vw] -mr-8 mb-6">
        <button class="filter-btn w-[50vw] px-5 py-2 rounded-xl border-2 border-black shadow-black bg-secondary text-white font-pilcrow font-pilcrow-semibold  shadow transition-colors duration-200">Edukasi</button>
        <button class="filter-btn w-[50vw] px-5 py-2 rounded-xl border-2 border-black shadow-black text-black font-pilcrow font-pilcrow-semibold   bg-white shadow transition-colors duration-200">Inspirasi</button>
        <button class="filter-btn w-[50vw] px-5 py-2 rounded-xl border-2 border-black shadow-black text-black font-pilcrow font-pilcrow-semibold   bg-white shadow transition-colors duration-200">Tips</button>
    </div>

<div class="grid grid-cols-1 gap-4">
    @foreach($ebooks as $ebook)
        <div class="relative rounded-xl w-[100vw] overflow-hidden shadow-md bg-gray-900">
            <img src="{{ asset($ebook->thumbnail) }}" alt="{{ $ebook->title }}" class="w-full h-64 object-cover opacity-70">
            <div class="absolute inset-0 bg-gradient-to-t from-black/70 via-black/30 to-transparent"></div>
            <div class="absolute bottom-0 left-0 p-4 w-full">
            <div class="flex">
                <div class="">
                <h2 class="text-white font-semibold text-base mb-1">{{ $ebook->title }}</h2>
                <p class="text-white text-xs leading-tight line-clamp-2">{{ $ebook->description }}</p>
                <span class="text-xs bg-white/80 text-gray-800 px-2 py-1 rounded">{{ $ebook->kategori }}</span>
              </div>
                <div class="mt-[5vh] ml-auto">
<a href="#" onclick="shareEbook('{{ $ebook->id }}'); return false;" class="w-6 h-6 block">
    <svg class="w-full h-full text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
            d="M8.684 13.342C8.886 12.938 9 12.482 9 12c0-.482-.114-.938-.316-1.342m0 2.684a3 3 0 110-2.684m0 2.684l6.632 3.316m-6.632-6l6.632-3.316m0 0a3 3 0 105.367-2.684 3 3 0 00-5.367 2.684zm0 9.316a3 3 0 105.367 2.684 3 3 0 00-5.367-2.684z">
        </path>
    </svg>
</a>
                </div>
            </div>
            </div>
        </div>
    @endforeach
</div>
</div>

<!-- Modal Share -->
<div id="shareModal" class="hidden fixed inset-0 bg-black/50 flex justify-center items-center z-50">
    <div class="bg-white w-80 p-5 rounded-xl shadow-lg">
        <h2 class="text-lg font-bold mb-3">Bagikan Ebook</h2>

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
let currentShareLink = "";

async function shareEbook(id) {
    try {
        const res = await fetch(`/ebook/share/${id}`);
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
            title: "Cek Ebook ini!",
            text: "Ebook keren nih 👇",
            url: currentShareLink,
        });
    } else {
        alert("Device tidak support share langsung");
    }
};
document.addEventListener("DOMContentLoaded", function() {
    const searchInput = document.getElementById('search');
    const ebookList   = document.querySelector('.grid');
    const buttons     = document.querySelectorAll('.filter-btn'); // FIXED

    let kategoriAktif = "";

    // Search realtime
    searchInput.addEventListener('input', function() {
        fetchEbooks(searchInput.value, kategoriAktif);
    });

    // Filter kategori
    buttons.forEach(btn => {
        btn.addEventListener('click', function() {

            // ubah style tombol
            buttons.forEach(b => {
                b.classList.remove('bg-secondary', 'text-white');
                b.classList.add('bg-white', 'text-black');
            });

            this.classList.remove('bg-white', 'text-black');
            this.classList.add('bg-secondary', 'text-white');

            kategoriAktif = this.textContent.trim();
            fetchEbooks(searchInput.value, kategoriAktif);
        });
    });

    function fetchEbooks(search = '', kategori = '') {
        fetch(`/ebooks/filter?search=${encodeURIComponent(search)}&kategori=${encodeURIComponent(kategori)}`)
            .then(res => res.json())
            .then(data => {
                ebookList.innerHTML = data.html ?? '<p class="text-center text-gray-500">Tidak ada data.</p>';
            })
            .catch(() => {
                ebookList.innerHTML = '<p class="text-center text-red-500">Gagal memuat data.</p>';
            });
    }
});
</script>

   
</body>
</html>