<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Profile - Portal Berita</title>
    @vite('resources/css/navbar.css')
    @vite('resources/css/home.css')
    @vite('resources/css/profile.css')
</head>
<body>
    @include('partials.navbar')

    <main class="profile-container">
        <div class="profile-card">
            <h1>Profil Pengguna</h1>
            <div class="profile-info">
                <p><strong>Nama:</strong> {{ Auth::user()->name }}</p>
                <p><strong>Email:</strong> {{ Auth::user()->email }}</p>
                <p><strong>Tanggal Bergabung:</strong> {{ Auth::user()->created_at->format('d M Y') }}</p>
            </div>
        </div>
    </main>

    <footer class="footer">
        <p>&copy; {{ date('Y') }} Portal Berita. All rights reserved.</p>
    </footer>
</body>
</html>