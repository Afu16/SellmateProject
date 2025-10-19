@if($errors->any())
<div id="alert-error" 
     class="fixed top-5 right-5 z-50 w-80 mb-4 px-4 py-3 rounded-lg bg-red-500 text-white shadow-lg animate-slide-in">
    ⚠️ Coba periksa kembali !!
</div>

<script>
    setTimeout(() => {
        const el = document.getElementById('alert-error');
        if(el){
            el.style.transition = "opacity .4s ease, transform .4s ease";
            el.style.opacity = 0;
            el.style.transform = "translateX(100%)";
            setTimeout(()=> el.remove(), 400);
        }
    }, 4000);
</script>

<style>
@keyframes slide-in {
    from { opacity:0; transform: translateX(100%); }
    to { opacity:1; transform: translateX(0); }
}
.animate-slide-in { animation: slide-in .3s ease-out; }
</style>
@endif

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
            <a href="{{ url('/dashboard') }}" class="mr-4">
           <img class="w-8 h-8" src="{{ asset('assets/svg/arrow-icon.svg') }}" alt="arrow">
            </a>
            <h1 class=" text-2xl font-bold text-black text-nowrap select-none">
                {{ isset($target) ? 'Edit Target Omzetmu' : 'Sesuaikan Target Omzetmu' }}
            </h1>
        </div>

        <div class="rounded-xl mt-10 border-2 border-black shadow-black p-5">
            <form action="{{ isset($target) ? route('target.update', $target->id) : route('target.store') }}" method="post">
            @csrf
            @if(isset($target))
                @method('PUT')
            @endif

            <label class="block text-black font-pilcrow font-pilcrow-semibold text-sm mb-2">Nama Target</label>
            <input type="text" name="title" value="{{ old('title', $target->title ?? '') }}" placeholder="Mobil"
                class="w-full mb-2 px-3 py-2 border border-black rounded-lg font-pilcrow font-pilcrow-bold text-xs text-black bg-white">

            <!-- Timeline Target -->
            <label class="block text-black font-pilcrow font-pilcrow-semibold text-sm mb-2 mt-4">Timeline Target</label>
            <div class="flex gap-0 border border-black rounded-xl overflow-hidden mb-4 w-full">
                <button type="button" id="btn-3bulan" onclick="selectTimeline('3')" class="flex-1 py-2 text-sm font-inter text-black bg-white border-r border-black">
                    3 Bulan
                </button>
                <button type="button" id="btn-6bulan" onclick="selectTimeline('6')" class="flex-1 py-2 text-sm font-inter text-black bg-white border-r border-black">
                    6 Bulan
                </button>
                <button type="button" id="btn-12bulan" onclick="selectTimeline('12')" class="flex-1 py-2 text-sm font-inter text-black bg-white">
                    12 Bulan
                </button>
            </div>
            <input type="hidden" name="timeline" id="timeline" value="{{ old('timeline', $target->timeline ?? 3) }}">

            <!-- Jumlah Target Omset -->
            <label class="block text-black font-pilcrow font-pilcrow-semibold text-sm mb-2 mt-4">Jumlah Target Omset</label>                
            <input type="text" name="target" id="target" value="{{ old('target', $target->target ?? '') }}" 
                class="w-full mb-6 px-3 py-2 text-xs border border-black rounded-lg font-inter text-black bg-white" 
                placeholder="10000000">

                <!-- Action Buttons -->
                <div class="flex gap-4">
                    <button type="button" onclick="window.location.href='{{ url('/dashboard') }}'" class="flex-1 py-2 shadow-black border-2 border-black rounded-xl bg-white text-black font-pilcrow font-pilcrow-semibold text-base hover:bg-gray-50">
                        Batal
                    </button>
                    <button type="submit" class=" shadow-black flex-1 py-2 rounded-xl bg-secondary text-black font-pilcrow font-pilcrow-semibold text-base hover:bg-tertiary">
                        {{ isset($target) ? 'Perbarui' : 'Simpan' }}
                    </button>
                </div>
            </form>
        </div>
    </div>

    <script>
    function selectTimeline(val) {
        document.getElementById('timeline').value = val;

        const buttons = ['btn-3bulan', 'btn-6bulan', 'btn-12bulan'];
        buttons.forEach(id => {
            const btn = document.getElementById(id);
            btn.classList.remove('bg-secondary');
            btn.classList.add('bg-white');
        });

        const selectedBtn = document.getElementById(`btn-${val}bulan`);
        selectedBtn.classList.add('bg-secondary');
        selectedBtn.classList.remove('bg-white');
    }

    window.onload = function() {
        let oldTimeline = "{{ old('timeline', $target->timeline ?? 3) }}";
        selectTimeline(oldTimeline);

        const targetInput = document.getElementById('target');
        if(targetInput){
            targetInput.addEventListener('input', function() {
                let value = this.value.replace(/\D/g, '');
                this.value = value ? new Intl.NumberFormat('id-ID').format(value) : '';
            });
            targetInput.form.addEventListener('submit', function() {
                targetInput.value = targetInput.value.replace(/\D/g, '');
            });

            if(targetInput.value){
                targetInput.value = new Intl.NumberFormat('id-ID').format(targetInput.value);
            }
        }
    };
    </script>
</body>
</html>
