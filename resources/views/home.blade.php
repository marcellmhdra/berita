<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <title>Berita - Home</title>
    @vite('resources/css/home.css')
    @vite('resources/css/navbar.css')
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;600&display=swap" rel="stylesheet" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
</head>
<body>
    @include('partials.navbar') <!-- Memuat navigasi bar -->
    <main class="container">
        @if($posts->isNotEmpty())
            <!-- Featured Post -->
            @php
                $featured = $posts->first();
                $latest = $posts->slice(1);
            @endphp

            <section class="featured-post">
                <a href="{{ route('posts.show', $featured->id) }}" class="featured-link" aria-label="Featured news: {{ $featured->title }}">
                    <div class="featured-banner">
                        <img src="{{ asset('storage/' . $featured->image) }}" alt="{{ $featured->title }}" class="featured-image" />
                        <div class="banner-text">Berita Terkini</div>
                    </div>
                    <div class="featured-text">
                        <h2 class="featured-title">{{ $featured->title }}</h2>
                        <p class="featured-excerpt">{{ Str::limit($featured->content, 180) }}</p>
                        <span class="read-more">Read More →</span>
                    </div>
                </a>
            </section>

            <!-- Latest Posts -->
            <section class="latest-posts" aria-label="Latest news">
                <h2 class="section-title">Berita Terbaru</h2>
                <div class="posts-grid">
                    @foreach($latest as $post)
                        <article class="post-item" tabindex="0" role="article">
                            <a href="{{ route('posts.show', $post->id) }}" class="post-link" aria-label="{{ $post->title }}">
                                <img src="{{ asset('storage/' . $post->image) }}" alt="{{ $post->title }}" class="post-thumbnail" loading="lazy" />
                                <div class="post-content">
                                    <h3 class="post-title">{{ $post->title }}</h3>
                                    <p class="post-excerpt">{{ Str::limit($post->content, 120) }}</p>
                                    <span class="read-more">Read More →</span>
                                </div>
                            </a>
                        </article>
                    @endforeach
                </div>
            </section>

            <!-- External News Section -->
            <section class="external-news-section" style="background-color: #f0f4f8; border-radius: 10px; padding: 20px; margin-top: 20px;">
                <h2 class="section-title">Berita Eksternal</h2>
                <div class="posts-grid">
                    @foreach($externalArticles as $article)
                        <article class="post-item" tabindex="0" role="article">
                            <a href="{{ $article['url'] }}" class="post-link" target="_blank" aria-label="{{ $article['title'] }}">
                                <img src="{{ $article['urlToImage'] }}" alt="{{ $article['title'] }}" class="post-thumbnail" loading="lazy" />
                                <div class="post-content">
                                    <h3 class="post-title">{{ $article['title'] }}</h3>
                                    <p class="post-excerpt">{{ Str::limit($article['description'], 120) }}</p>
                                    <span class="read-more">Read More →</span>
                                </div>
                            </a>
                        </article>
                    @endforeach
                </div>
                <div class="view-more">
                    <a href="{{ route('news.index') }}" class="read-more">Lihat Semua Berita Eksternal</a>
                </div>
            </section>
        @else
            <p>Tidak ada berita tersedia saat ini.</p>
        @endif
    </main>
    <footer class="footer" role="contentinfo">
        <p>&copy; {{ date('Y') }} Berita. All rights reserved.</p>
    </footer>
</body>
</html>