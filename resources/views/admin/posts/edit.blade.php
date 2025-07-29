<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Berita - Admin Panel</title>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;600&display=swap" rel="stylesheet">
    @vite('resources/css/admin.css')
</head>
<body>
    <nav class="navbar">
        <a href="{{ route('admin.posts.index') }}">Dashboard</a>
        <a href="{{ route('admin.posts.create') }}">Tambah Berita</a>
    </nav>
    <div class="container">
        <h1>Edit Berita</h1>
        <form action="{{ route('admin.posts.update', $post->id) }}" method="POST" enctype="multipart/form-data">
            @csrf
            @method('PUT')
            <div class="form-group">
                <label for="title">Judul Berita:</label>
                <input type="text" name="title" id="title" value="{{ old('title', $post->title) }}" required>
            </div>
            <div class="form-group">
                <label for="content">Isi Berita:</label>
                <textarea name="content" id="content" rows="5" required>{{ old('content', $post->content) }}</textarea>
            </div>
            <div class="form-group">
                <label for="image">Gambar Berita (Opsional):</label>
                <input type="file" name="image" id="image">
            </div>
            <div class="form-group">
                <button type="submit" class="btn">Update Berita</button>
            </div>
        </form>
    </div>
</body>
</html>
