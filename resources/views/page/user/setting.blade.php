<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Profile</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body class="bg-gray-100">

    <!-- Header -->
    <div class="bg-white p-6">
        <div class="flex items-center">
            <a href="{{ url('/dashboard') }}" class="mr-4">
                <img class="w-8 h-8" src="{{ asset('assets/svg/arrow-icon.svg') }}" alt="arrow">
            </a>
            <h1 class="text-2xl font-pilcrow font-pilcrow-bold text-black flex-1">Profile</h1>  
        </div>
    </div>

    <!-- Notifikasi -->
    @if(session('success'))
        <div class="bg-green-200 text-green-800 p-4 text-center">
            {{ session('success') }}
        </div>
    @endif

    <form action="{{ route('settings.update') }}" method="POST" enctype="multipart/form-data">
        @csrf

<!-- Foto -->
<div class="bg-white p-6 flex justify-center">
    <div class="relative">
        <div id="preview-container">
            @if($user->foto_link)
                <img id="preview-image"
                     src="{{ asset('storage/'.$user->foto_link) }}"
                     class="w-32 h-32 rounded-full object-cover border-2 border-black shadow-black"
                     alt="Foto Profil">
            @else
                <div id="preview-initial"
                     class="w-32 h-32 rounded-full flex items-center justify-center bg-gray-400 text-black text-4xl font-bold border-2 border-black shadow-black">
                    {{ strtoupper(substr($user->name, 0, 1)) }}
                </div>
            @endif
        </div>

        <!-- Input file hidden -->
        <input type="file" name="foto_link" id="foto_link" class="hidden" accept="image/*">

        <!-- Icon kamera -->
        <label for="foto_link"
               class="absolute bottom-0 right-0 bg-gray-400 rounded-lg p-2 cursor-pointer hover:bg-gray-500 transition">
            <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 text-black" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                      d="M3 9a2 2 0 012-2h.93a2 2 0 001.664-.89l.812-1.22A2 2 0 0110.07 4h3.86a2 2 0 011.664.89l.812 1.22A2 2 0 0018.07 7H19a2 2 0 012 2v9a2 2 0 01-2 2H5a2 2 0 01-2-2V9z" />
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                      d="M15 13a3 3 0 11-6 0 3 3 0 016 0z" />
            </svg>
        </label>
    </div>
</div>

    <script>
    document.getElementById('foto_link').addEventListener('change', function (event) {
        const file = event.target.files[0];
        if (file) {
            const reader = new FileReader();
            reader.onload = function (e) {
                // Hapus inisial kalo ada
                const previewContainer = document.getElementById('preview-container');
                previewContainer.innerHTML = `
                    <img id="preview-image"
                         src="${e.target.result}"
                         class="w-32 h-32 rounded-full object-cover border-2 border-black shadow-black"
                         alt="Foto Profil">
                `;
            }
            reader.readAsDataURL(file);
        }
    });
    </script>

        <!-- Informasi Pribadi -->
        <div class="bg-white p-6">
            <h2 class="text-xl font-pilcrow font-pilcrow-bold text-black mb-4">Informasi Pribadi</h2>
            <div class="bg-primary border-2 border-black shadow-black rounded-lg p-6 mb-6">

                <!-- Name -->
                <div class="mb-3">
                    <label class="block text-sm text-white font-pilcrow">Nama</label>
                    <input type="text" name="name" value="{{ old('name', $user->name) }}"
                           class="w-full bg-white border-2 border-black rounded-lg p-2 focus:outline-none">
                </div>

                <!-- Email -->
                <div class="mb-3">
                    <label class="block text-sm text-white font-pilcrow">Email</label>
                    <input type="email" name="email" value="{{ old('email', $user->email) }}"
                           class="w-full bg-white border-2 border-black rounded-lg p-2 focus:outline-none">
                </div>

                <!-- Phone -->
                <div class="mb-3">
                    <label class="block text-sm text-white font-pilcrow">Nomor handphone</label>
                    <input type="text" name="phone" value="{{ old('phone', $user->phone) }}"
                           class="w-full bg-white border-2 border-black rounded-lg p-2 focus:outline-none">
                </div>

                <!-- Address -->
                <div class="mb-3">
                    <label class="block text-sm text-white font-pilcrow">Alamat</label>
                    <input type="text" name="address" value="{{ old('address', $user->address) }}"
                           class="w-full bg-white border-2 border-black rounded-lg p-2 focus:outline-none">
                </div>

                <!-- School -->
                <div class="mb-3">
                    <label class="block text-sm text-white font-pilcrow">Sekolah</label>
                    <input type="text" name="school" value="{{ old('school', $user->school) }}"
                           class="w-full bg-white border-2 border-black rounded-lg p-2 focus:outline-none">
                </div>

                <!-- Department -->
                <div class="mb-3">
                    <label class="block text-sm text-white font-pilcrow">Jurusan</label>
                    <input type="text" name="major" value="{{ old('major', $user->major) }}"
                           class="w-full bg-white border-2 border-black rounded-lg p-2 focus:outline-none">
                </div>
            </div>
        </div>

        <!-- Keamanan Akun -->
        <div class="bg-white p-6">
            <h2 class="text-xl font-pilcrow font-pilcrow-bold text-black mb-4">Keamanan Akun</h2>
            <div class="bg-primary border-2 border-black shadow-black rounded-lg p-6 mb-6">

                <!-- Username -->
                <div class="mb-3">
                    <label class="block text-sm text-white font-pilcrow">Username</label>
                    <input type="text" name="username" value="{{ old('username', $user->username) }}"
                           class="w-full bg-white border-2 border-black rounded-lg p-2 focus:outline-none">
                </div>

                <!-- Password (info saja) -->
                <div class="mb-3">
                    <label class="block text-sm text-white font-pilcrow">Password</label>
                    <input type="password" value="********" readonly
                           class="w-full bg-gray-100 border-2 border-black rounded-lg p-2">
                    <small class="text-white">Untuk ubah password silakan ke menu "Change Password".</small>
                </div>
            </div>
        </div>

        <!-- Action -->
        <div class="bg-white p-6 flex gap-4">
            <a href="{{ url('/dashboard') }}"
               class="flex-1 text-center bg-white border-2 border-black shadow-black py-3 rounded-lg font-pilcrow hover:bg-gray-50">
                Batal
            </a>
            <button type="submit"
                    class="flex-1 bg-secondary text-white border-2 border-black shadow-black py-3 rounded-lg font-pilcrow hover:bg-tertiary">
                Simpan
            </button>
        </div>
    </form>
</body>
</html>
