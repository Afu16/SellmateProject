<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Add Omzet</title>
    @vite('resources/js/app.js', 'resources/css/app.css')
</head>
<body>
    <div class="p-6">
         <div class="flex items-center">
            <a href="{{ url('/user') }}" class="mr-4">
           <img class="w-8 h-8" src="{{ asset('assets/svg/arrow-icon.svg') }}" alt="arrow">
            </a>
            <h1 class=" text-2xl font-bold text-black">Sesuaikan Target Omzetmu</h1>
        </div>

        <div class="rounded-xl mt-10 border-2 border-black shadow-black p-5">
            <form action="{{ route('target.store') }}" method="post">
                @csrf
                <label class="block text-black font-pilcrow font-pilcrow-semibold text-sm mb-2">Nama Jasa/Produk</label>
                <input type="text" name="title" required class="w-full mb-2 px-3 py-2 border border-black rounded-lg font-pilcrow font-pilcrow-bold text-xs text-black bg-white">
                <!-- Timeline Target -->
                <label class="block text-black font-inter font-inter-bold text-sm mb-2 mt-4">Timeline Target</label>
                <div class="flex gap-0 border border-black rounded-xl overflow-hidden mb-4 w-full">
                    <button type="button" id="btn-3bulan" onclick="selectTimeline('3')" class="flex-1 py-2 text-sm font-inter font-inter-regular text-black focus:outline-none bg-secondary border-r border-black" style="border-bottom-left-radius: 12px; border-top-left-radius: 12px;">
                        3 Bulan
                    </button>
                    <button type="button" id="btn-6bulan" onclick="selectTimeline('6')" class="flex-1 py-2 text-sm font-inter font-inter-regular text-black focus:outline-none bg-white border-r border-black">
                        6 Bulan
                    </button>
                    <button type="button" id="btn-12bulan" onclick="selectTimeline('12')" class="flex-1 py-2 text-sm font-inter font-inter-regular text-black focus:outline-none bg-white" style="border-bottom-right-radius: 12px; border-top-right-radius: 12px;">
                        12 Bulan
                    </button>
                </div>
                <input type="hidden" name="timeline" id="timeline" value="3">

                <!-- Jumlah Target Omset -->
                <label class="block text-black font-pilcrow font-pilcrow-semibold text-sm mb-2 mt-4">Jumlah Target Omset</label>
                <input type="number" name="target" required class="w-full mb-6 px-3 py-2 text-xs border border-black rounded-lg font-inter font-inter-regular text-black bg-white" placeholder="">

                <!-- Action Buttons -->
                <div class="flex gap-4">
                    <button type="button" onclick="window.location.href='{{ url('/user') }}'" class="flex-1 py-2 shadow-black border-2 border-black rounded-xl bg-white text-black font-pilcrow font-pilcrow-semibold text-base hover:bg-gray-50">
                        Batal
                    </button>
                    <button type="submit" class=" shadow-black flex-1 py-2 rounded-xl bg-secondary text-black font-pilcrow font-pilcrow-semibold text-base hover:bg-tertiary">
                        Simpan
                    </button>
                </div>
            </div>
        </form>
    </div>
                <script>
                    function selectTimeline(val) {
                        document.getElementById('timeline').value = val;

                    // Reset semua tombol
                    const buttons = ['btn-3bulan', 'btn-6bulan', 'btn-12bulan'];
                    buttons.forEach(id => {
                        document.getElementById(id).classList.remove('bg-secondary', 'text-white');
                        document.getElementById(id).classList.add('bg-white', 'text-black');
                    });

                    // Tambah warna untuk tombol yang dipilih
                    const selectedBtn = document.getElementById(`btn-${val}bulan`);
                    selectedBtn.classList.add('bg-secondary', 'text-white');
                    selectedBtn.classList.remove('bg-white', 'text-black');

                    }
                    // Set default ke 3 bulan
                    window.onload = function() {
                        selectTimeline('3');
                    }
                </script>
</body>
</html>