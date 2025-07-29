<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tambah Berita - Admin Panel</title>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;600&display=swap" rel="stylesheet">
    @vite('resources/css/admin.css')
</head>
<body>
    <nav class="navbar">
        <a href="{{ route('admin.posts.index') }}">Dashboard</a>
        <a href="{{ route('admin.posts.create') }}">Tambah Berita</a>
    </nav>
    <div class="container tambah-berita">
        <h1>Tambah Berita</h1>
        <form action="{{ route('admin.posts.store') }}" method="POST" enctype="multipart/form-data">
            @csrf
            <div class="form-group">
                <label for="title">Judul Berita:</label>
                <input type="text" name="title" id="title" value="{{ old('title') }}" required>
            </div>
            <div class="form-group">
                <label for="content">Isi Berita:</label>
                <textarea name="content" id="content" rows="5" required>{{ old('content') }}</textarea>
            </div>
            <div class="form-group">
                <label for="image">Gambar Berita</label>
                <input type="file" name="image" id="image" accept="image/*" onchange="previewImage(event)">
                <img id="imagePreview" style="display:none; max-width: 100%; margin-top: 10px;" />
            </div>
            <div class="form-group">
                <button type="submit" class="btn">Simpan Berita</button>
            </div>
        </form>
    </div>

    <script>
        function previewImage(event) {
            const imagePreview = document.getElementById('imagePreview');
            imagePreview.src = URL.createObjectURL(event.target.files[0]);
            imagePreview.style.display = 'block';
        }
    </script>
</body>
</html>
