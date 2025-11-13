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
                onclick="shareArticle({{ $article->id }})"
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

<script>
async function shareArticle(id) {
    try {
        const response = await fetch(`/articles/share/${id}`);
        const data = await response.json();
        const shareLink = data.link;

        if (navigator.share) {
            // Bisa langsung share ke WhatsApp, Telegram, dll
            await navigator.share({
                title: 'Cek artikel ini!',
                text: 'Artikel menarik nih 👇',
                url: shareLink
            });
        } else {
            // Browser belum support share, kasih opsi manual
            const wa = `https://wa.me/?text=${encodeURIComponent('Cek artikel ini: ' + shareLink)}`;
            const telegram = `https://t.me/share/url?url=${encodeURIComponent(shareLink)}&text=${encodeURIComponent('Artikel menarik nih!')}`;
            const copy = async () => {
                await navigator.clipboard.writeText(shareLink);
                alert('Link disalin ke clipboard!');
            };

            // popup manual sederhana
            const pilihan = prompt('Pilih cara share:\n1. WhatsApp\n2. Telegram\n3. Copy Link');
            if (pilihan == '1') window.open(wa, '_blank');
            else if (pilihan == '2') window.open(telegram, '_blank');
            else if (pilihan == '3') copy();
        }
    } catch (error) {
        console.error('Gagal share:', error);
    }
}
</script>


</body>
</html>
