<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\Admin\PostController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\NewsController;
use Illuminate\Support\Facades\Auth; // Tambahkan jika belum ada
use App\Http\Controllers\UserPostController;
use App\Http\Controllers\CommentController;

// Auth routes
Route::get('login', [AuthController::class, 'showLoginForm'])->name('login');
Route::post('login', [AuthController::class, 'login']);
Route::get('register', [AuthController::class, 'showRegisterForm'])->name('register');
Route::post('register', [AuthController::class, 'register']);
Route::post('logout', [AuthController::class, 'logout'])->name('logout');

// Halaman Home (Bisa diakses semua orang)
Route::get('/', [HomeController::class, 'index'])->name('home');

// Pencarian & Lihat Post (Bisa diakses semua orang)
Route::get('/search', [HomeController::class, 'search'])->name('search');
Route::get('posts/{post}', [PostController::class, 'show'])->name('posts.show');
Route::get('/berita/{id}', [PostController::class, 'show']); // Jika masih dipakai

Route::get('/news', [NewsController::class, 'index'])->name('news.index');

// Tambahan route Profile
Route::get('/profile', function () {
    return view('profile');
})->middleware('auth')->name('profile');

// Rute admin (hanya bisa diakses jika login)
Route::prefix('admin')->name('admin.')->group(function () {
    Route::resource('posts', PostController::class);
});


Route::middleware('auth')->group(function () {
    Route::get('/user/posts', [UserPostController::class, 'index'])->name('user.posts.index');
    Route::get('/user/posts/create', [UserPostController::class, 'create'])->name('user.posts.create');
    Route::post('/user/posts', [UserPostController::class, 'store'])->name('user.posts.store');
    Route::get('/user/posts/{post}/edit', [UserPostController::class, 'edit'])->name('user.posts.edit');
    Route::put('/user/posts/{post}', [UserPostController::class, 'update'])->name('user.posts.update');
    Route::delete('/user/posts/{post}', [UserPostController::class, 'destroy'])->name('user.posts.destroy');
});

Route::post('/posts/{post}/comments', [CommentController::class, 'store'])->name('comments.store');