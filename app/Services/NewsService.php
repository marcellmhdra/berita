<?php

   namespace App\Services;

   use Illuminate\Support\Facades\Http;

   class NewsService
   {
       protected $apiKey;
       protected $baseUrl;

       public function __construct()
       {
           $this->apiKey = env('NEWS_API_KEY'); // Simpan kunci API di .env
           $this->baseUrl = 'https://newsapi.org/v2/';
       }

       public function fetchNews($query)
       {
           $response = Http::get("{$this->baseUrl}everything", [
               'q' => $query,
               'apiKey' => $this->apiKey,
           ]);

           return $response->json();
       }
   }
   