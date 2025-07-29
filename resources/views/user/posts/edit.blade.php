@extends('layouts.app')

@section('content')
<div class="container" style="max-width:600px; margin:auto;">
    <h1>Edit Berita</h1>

    @if ($errors->any())
        <div style="color:red; margin-bottom:1rem;">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form action="{{ route('user.posts.update', $post->id) }}" method="POST" enctype="multipart/form-data">
        @csrf
        @method('PUT')

        <div style="margin-bottom:1rem;">
            <label for="title">Judul:</label>
            <input type="text" name="title" id="title" value="{{ old('title', $post->title) }}" required style="width:100%; padding:0.5rem;">
        </div>

        <div style="margin-bottom:1rem;">
            <label for="content">Konten:</label>
            <textarea name="content" id="content" rows="6" required style="width:100%; padding:0.5rem;">{{ old('content', $post->content) }}</textarea>
        </div>

        <div style="margin-bottom:1rem;">
            <label for="image">Gambar (opsional, biarkan kosong jika tidak ingin mengganti):</label>
            <input type="file" name="image" id="image">
            @if($post->image)
                <div style="margin-top:0.5rem;">
                    <img src="{{ asset('storage/' . $post->image) }}" alt="{{ $post->title }}" style="width: 100%; max-width: 300px; border-radius: 8px;">
                </div>
            @endif
        </div>

        <button type="submit" style="padding:0.5rem 1rem; background:#2563eb; color:white; border:none; border-radius:4px;">Update Berita</button>
    </form>
</div>
@endsection
