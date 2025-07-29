@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Upload Berita Baru</h1>
    <form action="{{ route('user.posts.store') }}" method="POST" enctype="multipart/form-data">
        @csrf
        <div class="mb-3">
            <label>Judul</label>
            <input type="text" name="title" class="form-control" required>
        </div>
        <div class="mb-3">
            <label>Konten</label>
            <textarea name="content" class="form-control" rows="6" required></textarea>
        </div>
        <div class="mb-3">
            <label>Gambar (Opsional)</label>
            <input type="file" name="image" class="form-control">
        </div>
        <button type="submit" class="btn btn-primary">Upload</button>
    </form>
</div>
@endsection
