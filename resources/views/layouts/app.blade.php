<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Portal Berita</title>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;600&display=swap" rel="stylesheet">
    @vite('resources/css/home.css')
    @vite('resources/css/navbar.css')
    @vite('resources/css/user-crud.css')
</head>
<body>
    @include('partials.navbar')

    <main style="padding: 1rem;">
        @yield('content')
    </main>
</body>
</html>
