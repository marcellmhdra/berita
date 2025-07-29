<?php

namespace Database\Seeders;

use App\Models\Post;
use App\Models\Category;
use Illuminate\Database\Seeder;

class PostSeeder extends Seeder
{
    public function run()
    {
        // Ambil beberapa kategori yang ada
        $categories = Category::all();

        foreach ($categories as $category) {
            Post::create([
                'title' => 'Berita ' . $category->name,
                'content' => 'Ini adalah konten berita tentang ' . $category->name . '.',
                'category_id' => $category->id,
                'image' => null, // Kamu bisa menambahkan gambar jika perlu
            ]);
        }
    }
}
