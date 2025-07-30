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
        <a class="mr-4 mb-10" href="{{ url('/user') }}">
            <img class="w-8 h-8" src="{{ asset('assets/svg/arrow-icon.svg') }}" alt="arrow">
        </a>

        <h1 class="text-2xl mt-5 font-inter font-inter-bold text-black mb-5">Sesuaikan Target Omzetmu</h1>

        <div class="rounded-xl mt-10 border-2 border-black shadow-black p-5">
            <form action="" method="post">
                <label class="block text-black font-inter font-inter-bold text-sm mb-2">Nama Jasa/Produk</label>
                <input type="text" value="Rp 250.000" class="w-full mb-2 px-3 py-2 border border-black rounded-lg font-inter font-inter-regular text-black bg-white">
                <!-- Timeline Target -->
                <label class="block text-black font-inter font-inter-bold text-sm mb-2 mt-4">Timeline Target</label>
                <div class="flex gap-0 border border-black rounded-lg overflow-hidden mb-4 w-full">
                    <button type="button" id="btn-3bulan" onclick="selectTimeline('3')" class="flex-1 py-3 font-inter font-inter-regular text-black focus:outline-none bg-tertiary border-r border-black" style="border-bottom-left-radius: 12px; border-top-left-radius: 12px;">
                        3 Bulan
                    </button>
                    <button type="button" id="btn-6bulan" onclick="selectTimeline('6')" class="flex-1 py-3 font-inter font-inter-regular text-black focus:outline-none bg-white border-r border-black">
                        6 Bulan
                    </button>
                    <button type="button" id="btn-12bulan" onclick="selectTimeline('12')" class="flex-1 py-3 font-inter font-inter-regular text-black focus:outline-none bg-white" style="border-bottom-right-radius: 12px; border-top-right-radius: 12px;">
                        12 Bulan
                    </button>
                </div>
                <input type="hidden" name="timeline" id="timeline" value="3">

                <!-- Jumlah Target Omset -->
                <label class="block text-black font-inter font-inter-bold text-sm mb-2 mt-4">Jumlah Target Omset</label>
                <input type="text" name="target_omset" class="w-full mb-6 px-3 py-2 border border-black rounded-lg font-inter font-inter-regular text-black bg-white" placeholder="">

                <!-- Action Buttons -->
            </div>
            <div class="flex gap-4 mt-10">
                <button type="button" onclick="window.location.href='{{ url('/user') }}'" class="flex-1 py-3 shadow-black border-2 border-black rounded-xl bg-white text-black font-inter font-inter-bold text-base hover:bg-gray-50">
                    Batal
                </button>
                <button type="submit" class=" shadow-black flex-1 py-3 rounded-xl bg-tertiary text-black font-inter font-inter-bold text-base hover:bg-secondary">
                    Simpan
                </button>
            </div>
        </form>
    </div>
                <script>
                    function selectTimeline(val) {
                        document.getElementById('timeline').value = val;
                        // Reset semua button
                        document.getElementById('btn-3bulan').classList.remove('bg-tertiary', 'font-inter-bold');
                        document.getElementById('btn-3bulan').classList.add('bg-white');
                        document.getElementById('btn-6bulan').classList.remove('bg-tertiary', 'font-inter-bold');
                        document.getElementById('btn-6bulan').classList.add('bg-white');
                        document.getElementById('btn-12bulan').classList.remove('bg-tertiary', 'font-inter-bold');
                        document.getElementById('btn-12bulan').classList.add('bg-white');
                        // Aktifkan button terpilih
                        if(val === '3') {
                            document.getElementById('btn-3bulan').classList.add('bg-tertiary', 'font-inter-bold');
                            document.getElementById('btn-3bulan').classList.remove('bg-white');
                        } else if(val === '6') {
                            document.getElementById('btn-6bulan').classList.add('bg-tertiary', 'font-inter-bold');
                            document.getElementById('btn-6bulan').classList.remove('bg-white');
                        } else if(val === '12') {
                            document.getElementById('btn-12bulan').classList.add('bg-tertiary', 'font-inter-bold');
                            document.getElementById('btn-12bulan').classList.remove('bg-white');
                        }
                    }
                    // Set default ke 3 bulan
                    window.onload = function() {
                        selectTimeline('3');
                    }
                </script>
</body>
</html>