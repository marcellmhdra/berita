<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Navbar</title>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;600&display=swap" rel="stylesheet" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
</head>
<body>
    <nav class="navbar">
        <div class="logo">
            <h1>Berita</h1>
        </div>
        <ul class="nav-links">
            <li><a href="{{ route('home') }}">Home</a></li>
            <li><a href="{{ route('news.index') }}">Eksternal</a></li>
            <li><a href="{{ route('profile') }}">Profile</a></li>
            <li><a href="{{ route('user.posts.index') }}">Upload</a></li>
        </ul>
        <div class="search-bar">
            <form action="{{ route('search') }}" method="GET">
                <input
                    type="text"
                    name="query"
                    placeholder="Cari berita..."
                    value="{{ request()->query('query') }}"
                    aria-label="Search news"
                />
                <button type="submit" aria-label="Search">
                    <i class="fas fa-search"></i>
                </button>
            </form>
        </div>
        <div class="user-info">
            @if(Auth::check())
                <p>Hai, {{ Auth::user()->name }}</p>
                @if(Auth::user()->role === 'admin')
                    <a href="{{ route('admin.posts.index') }}" class="admin-link">Admin Panel</a>
                @endif
                <form action="{{ route('logout') }}" method="POST" style="display: inline;">
                    @csrf
                    <button type="submit" class="logout-button">Logout</button>
                </form>
            @else
                <a href="{{ route('login') }}" class="login-button">Login</a>
            @endif
        </div>
    </nav>
</body>
</html>