<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>History</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <style>
        @import url('https://fonts.googleapis.com/css2?family=Poppins:wght@400;500;600;700&display=swap');
        body { font-family: 'Poppins', sans-serif; }
    </style>
    @vite(['resources/css/app.css','resources/js/app.js'])
</head>
<body class="bg-white">
    <div class="p-6">
        <!-- Header -->
        <div class="flex items-center mb-6">
            <a href="{{ url('/dashboard') }}" class="mr-4">
                <img class="w-8 h-8" src="{{ asset('assets/svg/arrow-icon.svg') }}" alt="arrow">
            </a>
            <h1 class="text-2xl font-bold text-black select-none">History</h1>
        </div>

        @if (!$current)
            <div class="text-center text-gray-500 text-sm mt-10 select-none">
                Tidak ada target saat ini.
            </div>
        @else
            <!-- Target aktif -->
            <div class="bg-primary p-5 rounded-2xl border-2 border-black shadow-black mb-6">
                <div class="flex justify-between items-start mb-4">
                    <div>
                        <h2 class="text-lg text-white mb-1">{{ $current->title }}</h2>
                        <p class="text-sm text-white">Timeline {{ $current->timeline }} Bulan</p>
                    </div>
                </div>

                <div class="mb-4">
                    <p class="text-sm text-gray-100">Target Omzet</p>
                    <p class="text-2xl text-white mb-2">Rp {{ number_format($current->target, 0, ',', '.') }}</p>
                    <p class="text-xs text-gray-100 mb-1">
                        {{ $current->progress < 100 ? 'On Progress' : 'Selesai' }}
                        <span class="float-right">{{ $current->progress }}%</span>
                    </p>
                    <div class="flex items-center gap-3 mb-2">
                        <div class="flex-1 bg-white rounded-full h-3">
                            <div class="bg-orange-500 h-3 rounded-full" style="width: {{ $current->progress }}%"></div>
                        </div>
                    </div>
                    <div class="flex justify-between text-xs text-gray-200">
                        <span>Rp {{ number_format($current->current_omzet, 0, ',', '.') }}</span>
                        <span>Rp {{ number_format($current->target, 0, ',', '.') }}</span>
                    </div>
                </div>
            </div>
                            <!-- Tombol -->
                @if(!$current->is_finished)
                    <div class="flex justify-end gap-4 mt-4">
                        <form action="{{ route('target.destroy', $current->id) }}" method="POST" onsubmit="return confirm('Yakin mau hapus target ini?')">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="w-6 h-6">
                                <img src="{{ asset('assets/svg/trash-icon.svg') }}" alt="delete" class="w-full h-full">
                            </button>
                        </form>
                        <a href="{{ route('target.edit', $current->id) }}" class="w-6 h-6">
                            <img src="{{ asset('assets/svg/edit-icon.svg') }}" alt="edit" class="w-full h-full">
                        </a>
                    </div>
                @endif

            <!-- Riwayat Target -->
            @if ($history->isNotEmpty())
                <h2 class="text-lg font-bold text-black mb-4">Riwayat Target Omzetmu</h2>
                @foreach ($history as $target)
                    <div class="bg-primary p-5 rounded-2xl border-2 border-black shadow-black mb-6">
                        <div class="flex justify-between items-center mb-3">
                            <div>
                                <h2 class="text-lg text-white">{{ $target->title }}</h2>
                                <p class="text-xs text-gray-200">{{ $target->created_at->format('d M Y') }}</p>
                            </div>
                            <span class="text-sm text-gray-100">{{ $target->progress }}%</span>
                        </div>
                        <div class="flex items-center gap-3 mb-2">
                            <div class="flex-1 bg-white rounded-full h-3">
                                <div class="bg-orange-500 h-3 rounded-full" style="width: {{ $target->progress }}%"></div>
                            </div>
                        </div>
                        <div class="flex justify-between text-xs text-gray-200">
                            <span>Rp {{ number_format($target->current_omzet, 0, ',', '.') }}</span>
                            <span>Rp {{ number_format($target->target, 0, ',', '.') }}</span>
                        </div>
                    </div>
                @endforeach
            @endif
        @endif
    </div>
</body>
</html>
