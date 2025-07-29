@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Berita Saya</h1>

    <a href="{{ route('user.posts.create') }}" class="btn btn-edit" style="margin-bottom: 20px;">+ Tambah Berita</a>

    @if(session('success'))
        <div class="alert-success">{{ session('success') }}</div>
    @endif

    <div class="news-wrapper">
        @forelse($posts as $post)
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
                    <a href="{{ route('user.posts.edit', $post) }}" class="btn btn-edit">Edit</a>
                    <form action="{{ route('user.posts.destroy', $post) }}" method="POST" onsubmit="return confirm('Yakin ingin menghapus?');" style="display:inline;">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-delete">Hapus</button>
                    </form>
                </div>
            </div>
        @empty
            <p style="text-align:center;">Belum ada berita yang Anda buat.</p>
        @endforelse
    </div>

    <div style="margin-top: 20px; text-align: center;">
        {{ $posts->links() }}
    </div>
</div>
@endsection
