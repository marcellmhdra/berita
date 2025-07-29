<?php

namespace App\Http\Controllers;

use App\Services\NewsService;
use Illuminate\Http\Request;

class NewsController extends Controller
{
    protected $newsService;

    public function __construct(NewsService $newsService)
    {
        $this->newsService = $newsService;
    }

    public function index(Request $request)
    {
        $query = $request->input('query', 'latest'); // Default query
        $news = $this->newsService->fetchNews($query);
        
        // Ambil berita dan bagi menjadi halaman
        $perPage = 12; // Jumlah berita per halaman
        $currentPage = $request->input('page', 1); // Halaman saat ini
        $totalNews = count($news['articles']); // Total berita
        $totalPages = ceil($totalNews / $perPage); // Total halaman

        // Ambil berita untuk halaman saat ini
        $offset = ($currentPage - 1) * $perPage;
        $articles = array_slice($news['articles'], $offset, $perPage);


        return view('news.index', compact('articles', 'currentPage', 'totalPages'));
    }


}
