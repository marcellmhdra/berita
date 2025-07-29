<?php

namespace App\Http\Controllers;

use App\Models\Post;
use App\Services\NewsService;
use Illuminate\Http\Request;

class HomeController extends Controller
{

    protected $newsService;

    public function __construct(NewsService $newsService)
    {
        $this->newsService = $newsService;
    }

    public function index(Request $request)
    {
        $posts = Post::latest()->get();

        // Ambil berita eksternal
        $externalNews = $this->newsService->fetchNews('latest'); // Ganti 'latest' dengan query yang sesuai
        $externalArticles = $externalNews['articles'] ?? []; // Ambil artikel dari respons API

            // Batasi jumlah artikel menjadi 8
        $externalArticles = array_slice($externalArticles, 0, 8);

        return view('home', compact('posts', 'externalArticles'));
    }

    public function search(Request $request)
    {
        $query = $request->input('query');

        // Cari hanya berdasarkan title
        $posts = Post::where('title', 'like', "%{$query}%")
                    ->latest()
                    ->get();

        // Ambil berita eksternal agar tidak error saat render home
        $externalNews = $this->newsService->fetchNews('latest');
        $externalArticles = $externalNews['articles'] ?? [];
        $externalArticles = array_slice($externalArticles, 0, 8);

        return view('home', compact('posts', 'externalArticles'));
    }

}
