<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Panel - Daftar Berita</title>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;600&display=swap" rel="stylesheet">
    @vite('resources/css/home.css')
    @vite('resources/css/navbar.css')
    @vite('resources/css/admin.css')
</head>
<body>
    @include('partials.navbar')
    <div class="container">
        <h1>Manajemen Berita</h1>
        <a href="{{ route('admin.posts.create') }}" class="btn btn-edit" style="margin-bottom: 20px;">+ Tambah Berita</a>

        <div class="news-wrapper">
            @foreach($posts as $post)
                <div class="news-card">
                    @if($post->image)
                        <img src="{{ asset('storage/' . $post->image) }}" alt="Gambar Berita" class="news-image">
                    @else
                        <div class="news-image"></div>
                    @endif
                    <div class="news-content">
                        <h2>{{ $post->title }}</h2>
                        <p>Publikasi: {{ $post->created_at->format('d-m-Y') }}</p>
                    </div>
                    <div class="news-actions">
                        <a href="{{ route('admin.posts.edit', $post->id) }}" class="btn btn-edit">Edit</a>
                        <form action="{{ route('admin.posts.destroy', $post->id) }}" method="POST" onsubmit="return confirm('Apakah Anda yakin ingin menghapus berita ini?');" style="display:inline;">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-delete">Hapus</button>
                        </form>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
</body>
</html>
