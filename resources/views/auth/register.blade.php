<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Register</title>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;600&display=swap" rel="stylesheet"> <!-- Font -->
    @vite('resources/css/auth.css') <!-- Vite untuk CSS -->
</head>
<body>
    <div class="auth-container">
        <div class="form-container shadow-box">
            <h1>Register</h1>
            <form action="{{ url('register') }}" method="POST">
                @csrf
                <div class="form-group">
                    <input type="text" name="name" placeholder="Name" required>
                </div>
                <div class="form-group">
                    <input type="email" name="email" placeholder="Email" required>
                </div>
                <div class="form-group">
                    <input type="password" name="password" placeholder="Password" required>
                </div>
                <div class="form-group">
                    <input type="password" name="password_confirmation" placeholder="Confirm Password" required>
                </div>
                <button type="submit" class="btn">Register</button>
            </form>
            <p>Sudah punya akun? <a href="{{ route('login') }}">Login di sini</a></p>
        </div>
        <div class="css-art">
            <div class="shape"></div>
            <div class="shape"></div>
            <div class="shape"></div>
        </div>
    </div>
</body>
</html>
