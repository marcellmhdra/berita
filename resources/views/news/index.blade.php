<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <title>Berita Eksternal</title>
    @vite('resources/css/home.css')
    @vite('resources/css/navbar.css')
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;600&display=swap" rel="stylesheet" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
</head>
<body>
    @include('partials.navbar')
    <main class="container">
        <h1 class="section-title">Berita Eksternal</h1>
        <section class="external-news" aria-label="Berita Eksternal">
            <div class="posts-grid">
                @foreach($articles as $article)
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
        </section>

        <!-- Pagination -->
        <div class="pagination">
            @if($currentPage > 1)
                <a href="{{ route('news.index', ['page' => $currentPage - 1]) }}" class="pagination-link">Previous</a>
            @endif

            @for($i = 1; $i <= $totalPages; $i++)
                <a href="{{ route('news.index', ['page' => $i]) }}" class="pagination-link {{ $currentPage == $i ? 'active' : '' }}">{{ $i }}</a>
            @endfor

            @if($currentPage < $totalPages)
                <a href="{{ route('news.index', ['page' => $currentPage + 1]) }}" class="pagination-link">Next</a>
            @endif
        </div>
    </main>

    <footer class="footer" role="contentinfo">
        <p>&copy; {{ date('Y') }} Berita. All rights reserved.</p>
    </footer>
</body>
</html>