<?php

namespace App\Http\Controllers\Admin;

use App\Models\Post;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Auth;

class PostController extends Controller
{
    public function index()
    {
        // Check if user is logged in and has admin role
        $user = Auth::user();
        if (!$user || $user->role !== 'admin') {
            return redirect()->route('home')->with('error', 'Akses ditolak');
        }
        $posts = Post::all();
        return view('admin.posts.index', compact('posts'));
    }


    public function create()
    {
        // Ambil kategori untuk dropdown
        return view('admin.posts.create');
    }

    public function store(Request $request)
    {
        // Validasi data berita
        $validated = $request->validate([
            'title' => 'required|string|max:255',
            'content' => 'required',
            'image' => 'nullable|image|max:2048', // Validasi gambar
        ]);

        // Simpan berita baru
        $post = new Post($validated);
        $post->user_id = Auth::id(); // set manual setelah validasi

        // Cek jika ada gambar yang di-upload
        if ($request->hasFile('image')) {
            // Simpan gambar ke folder 'images' di storage
            $post->image = $request->file('image')->store('images', 'public');
        }

        $post->save();

        return redirect()->route('admin.posts.index')->with('success', 'Berita berhasil ditambahkan');
    }

    public function edit(Post $post)
    {
        // Ambil kategori untuk dropdown
        return view('admin.posts.edit', compact('post'));
    }

    public function update(Request $request, Post $post)
    {
        // Validasi data berita
        $validated = $request->validate([
            'title' => 'required|string|max:255',
            'content' => 'required',
            'image' => 'nullable|image|max:2048',
        ]);
        
        // Update berita
        $post->update($validated);

        // Cek jika ada gambar baru yang di-upload
        if ($request->hasFile('image')) {
            // Hapus gambar lama jika ada
            if ($post->image) {
                Storage::delete('public/' . $post->image);
            }

            // Simpan gambar baru
            $post->image = $request->file('image')->store('images', 'public');
        }

        $post->save();

        return redirect()->route('admin.posts.index')->with('success', 'Berita berhasil diperbarui');
    }
    public function destroy(Post $post)
    {
        // Hapus berita
        $post->delete();
        return redirect()->route('admin.posts.index')->with('success', 'Berita berhasil dihapus');
    }

    public function show($id)
    {
        $post = Post::findOrFail($id);

        $latestPosts = Post::where('id', '!=', $post->id)
                            ->latest()
                            ->take(2)
                            ->get();

        return view('detail', compact('post', 'latestPosts'));
    }



}
