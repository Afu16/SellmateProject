<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Upload Video Lokal</title>
    @vite('resources/css/app.css')
</head>
<body class="bg-gray-100">
<div class="max-w-lg mx-auto p-6 bg-white shadow-md rounded-xl mt-10 border-2 border-black">
    <h1 class="text-2xl font-bold mb-4 text-center">Upload Video Lokal</h1>

    <form action="{{ route('videos.upload.store') }}" method="POST" enctype="multipart/form-data" class="space-y-4">
        @csrf

        <div>
            <label class="block font-semibold mb-1">Judul</label>
            <input type="text" name="title" class="w-full border-2 border-black rounded-lg p-2" required>
        </div>

        <div>
            <label class="block font-semibold mb-1">Deskripsi</label>
            <textarea name="description" class="w-full border-2 border-black rounded-lg p-2" rows="3"></textarea>
        </div>

        <div>
            <label class="block font-semibold mb-1">File Video</label>
            <input type="file" name="video_file" class="w-full border-2 border-black rounded-lg p-2 bg-white" required>
        </div>

        <div>
            <label class="block font-semibold mb-1">Thumbnail (opsional)</label>
            <input type="file" name="thumbnail" class="w-full border-2 border-black rounded-lg p-2 bg-white">
        </div>

        <button type="submit" class="bg-[#3C096C] text-white px-6 py-2 rounded-xl border-2 border-black shadow-md w-full">
            Upload Sekarang
        </button>
    </form>
</div>
</body>
</html>
