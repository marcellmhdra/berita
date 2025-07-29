<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <title>{{ $post->title }} - Berita</title>
    @vite('resources/css/home.css')
    @vite('resources/css/navbar.css')
    @vite('resources/css/detail.css')
</head>
<body>
    @include('partials.navbar')

    <main class="container" style="margin-top: 2rem;">
        <article>
            <h1 class="detail-title">{{ $post->title }}</h1>
            <img src="{{ asset('storage/' . $post->image) }}" alt="{{ $post->title }}" class="detail-image" />
            <div class="post-meta">
                Dipublikasikan pada {{ $post->created_at->format('d M Y') }}
                @if($post->user)
                    &nbsp;•&nbsp;{{ $post->user->name }}
                @endif
            </div>
            <div class="post-content">
                {!! nl2br(e($post->content)) !!}
            </div>
        </article>

        {{-- Spacer --}}
        <div style="height: 3rem;"></div>

        @if($latestPosts->count() > 0)
        <section class="baca-berita-lainnya-box">
            <h2 class="section-title">Baca Berita Lainnya</h2>
            <div class="posts-grid">
                @foreach($latestPosts as $latest)
                    <article class="post-item">
                        <a href="{{ route('posts.show', $latest->id) }}">
                            <img src="{{ asset('storage/' . $latest->image) }}" alt="{{ $latest->title }}" class="post-thumbnail">
                            <div class="post-content">
                                <h3 class="post-title">{{ $latest->title }}</h3>
                                <p class="post-excerpt">{{ Str::limit(strip_tags($latest->content), 100) }}</p>
                                <span class="read-more">Baca Selengkapnya →</span>
                            </div>
                        </a>
                    </article>
                @endforeach
            </div>
        </section>
        @endif

        {{-- KOMENTAR --}}
        {{-- KOMENTAR --}}
        <section style="margin-top: 2rem; max-width: 600px; margin-left: auto; margin-right: auto;">
            <h2>{{ $post->comments()->count() }} Komentar</h2>

            @if(session('success'))
                <div style="color: green; margin-bottom: 0.5rem;">{{ session('success') }}</div>
            @endif

            @if($errors->any())
                <div style="color: red; margin-bottom: 0.5rem;">
                    @foreach($errors->all() as $error)
                        <div>{{ $error }}</div>
                    @endforeach
                </div>
            @endif

            <form action="{{ route('comments.store', $post->id) }}" method="POST" style="margin-top: 1rem; display: flex; align-items: flex-start; gap: 0.75rem;">
                @csrf
                <div>
                    <div style="width: 40px; height: 40px; background-color: #4a90e2; color: white; display: flex; align-items: center; justify-content: center; border-radius: 50%; font-weight: bold; font-size: 1rem;">
                        {{ strtoupper(substr(Auth::user()->name ?? 'A', 0, 1)) }}
                    </div>
                </div>
                <div style="flex: 1;">
                    <input type="hidden" name="name" value="{{ old('name', Auth::user()->name ?? '') }}">
                    <input type="hidden" name="email" value="{{ old('email', Auth::user()->email ?? '') }}">

                    <textarea 
                        name="content" 
                        rows="3" 
                        placeholder="Tambahkan komentar..." 
                        style="width: 100%; padding: 0.5rem; border: 1px solid #ddd; border-radius: 4px; resize: vertical; font-family: inherit;"
                        required>{{ old('content') }}</textarea>
                    <div style="display: flex; justify-content: flex-end; margin-top: 0.5rem; gap: 0.5rem;">
                        <button type="reset" style="background: none; border: none; color: #555; cursor: pointer;">Batal</button>
                        <button type="submit" style="background-color: #065fd4; color: white; border: none; padding: 0.5rem 1rem; border-radius: 4px; cursor: pointer;">Komentar</button>
                    </div>
                </div>
            </form>

            <div style="margin-top: 2rem;">
                @forelse($post->comments()->latest()->get() as $comment)
                    <div style="display: flex; align-items: flex-start; gap: 0.75rem; margin-bottom: 1rem;">
                        <div style="width: 40px; height: 40px; background-color: #4a90e2; color: white; display: flex; align-items: center; justify-content: center; border-radius: 50%; font-weight: bold;">
                            {{ strtoupper(substr($comment->name, 0, 1)) }}
                        </div>
                        <div style="flex: 1;">
                            <div style="display: flex; align-items: center; gap: 0.5rem;">
                                <strong>{{ $comment->name }}</strong> 
                                <span style="color: #777; font-size: 0.85rem;">{{ $comment->created_at->format('d M Y H:i') }}</span>
                            </div>
                            <p style="margin: 0.5rem 0;">{{ $comment->content }}</p>
                        </div>
                    </div>
                @empty
                    <p>Belum ada komentar.</p>
                @endforelse
            </div>
        </section>

    </main>

    <footer class="footer">
        <p>&copy; {{ date('Y') }} Berita. All rights reserved.</p>
    </footer>
</body>
</html>
