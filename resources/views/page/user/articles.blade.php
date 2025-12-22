<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Article</title>
    <script src="https://cdn.tailwindcss.com"></script>
    @vite('resources/css/app.css')
</head>
<body>
    <!-- Header -->
    <div class="p-6">
        <div class="flex items-center">
            <a href="{{ url('/dashboard') }}" class="mr-4">
                <img class="w-8 h-8" src="{{ asset('assets/svg/arrow-icon.svg') }}" alt="arrow">
            </a>
            <h1 class="text-2xl font-inter font-inter-bold text-black select-none text-nowrap">Artikel</h1>
        </div>
    </div>

    <div class="p-4 space-y-2 flex flex-col items-center">
    @foreach($articles as $article)
    <div class="relative h-64 w-full max-w-sm rounded-xl overflow-hidden shadow-lg bg-white">
            <img class="w-full h-64 object-cover" src="{{ asset('assets/img/' . $article->thumbnail) }}" alt="{{ $article->title }}">
            
            <div class="absolute inset-x-0 bottom-0 bg-gradient-to-t from-black via-black/70 to-transparent h-1/2"></div>
            
            <div class="absolute bottom-0 left-0 p-4 text-white w-full">
                <h3 class="text-xl font-semibold mb-1">{{ $article->title }}</h3>
                <div class="flex items-center justify-between text-sm">
                <a href="{{ route('articles.show', $article->id) }}" 
                class="text-gray-200 hover:text-white underline hover:underline-offset-2 transition">
                Baca Sekarang
                </a>
                <a href="javascript:void(0)" 
                onclick="shareArticle('{{ $article->id }}')"
                class="bg-white/20 p-2 rounded-full backdrop-blur-sm hover:bg-white/30 transition-colors">
                    <svg class="w-5 h-5 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" 
                            d="M8.684 13.342C8.886 12.938 9 12.482 9 12c0-.482-.114-.938-.316-1.342m0 2.684a3 3 0 110-2.684m0 2.684l6.632 3.316m-6.632-6l6.632-3.316m0 0a3 3 0 105.367-2.684 3 3 0 00-5.367 2.684zm0 9.316a3 3 0 105.367 2.684 3 3 0 00-5.367-2.684z"></path>
                    </svg>
                </a>
                </div>
            </div>
        </div>

    @endforeach
    </div>
    <!-- Modal Share Article -->
    <div id="shareModal" class=" fixed inset-0 bg-black/50 flex justify-center items-center z-50">
        <div class="bg-white w-80 p-5 rounded-xl shadow-lg">
            <h2 class="text-lg font-bold mb-3">Bagikan Artikel</h2>

            <div id="shareLinkBox" 
                class="p-2 border rounded bg-gray-100 text-xs break-all mb-3"></div>

            <button id="copyBtn" 
                class="w-full mb-2 bg-blue-600 text-white py-2 rounded">
                Copy Link
            </button>

            <button id="waBtn" 
                class="w-full mb-2 bg-green-600 text-white py-2 rounded">
                Share WhatsApp
            </button>

            <button id="tgBtn" 
                class="w-full mb-2 bg-blue-500 text-white py-2 rounded">
                Share Telegram
            </button>

            <button id="systemShareBtn" 
                class="w-full mb-2 bg-gray-800 text-white py-2 rounded">
                Share ke Aplikasi Lain
            </button>

            <button onclick="closeShareModal()" 
                class="w-full bg-gray-300 py-2 rounded">
                Tutup
            </button>
        </div>
    </div>

    <script>
    let currentShareLink = "";

    async function shareArticle(id) {
        try {
            const res = await fetch(`/articles/share/${id}`);
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

    // Copy link
    document.getElementById("copyBtn").onclick = async () => {
        await navigator.clipboard.writeText(currentShareLink);
        alert("Link disalin!");
    };

    // WhatsApp
    document.getElementById("waBtn").onclick = () => {
        window.open(`https://wa.me/?text=${encodeURIComponent(currentShareLink)}`, "_blank");
    };

    // Telegram
    document.getElementById("tgBtn").onclick = () => {
        window.open(`https://t.me/share/url?url=${encodeURIComponent(currentShareLink)}`, "_blank");
    };

    // System Share
    document.getElementById("systemShareBtn").onclick = async () => {
        if (navigator.share) {
            await navigator.share({
                title: "Cek artikel ini!",
                text: "Artikel menarik nih 👇",
                url: currentShareLink,
            });
        } else {
            alert("Device tidak support share langsung");
        }
    };
    </script>

</body>
</html>
