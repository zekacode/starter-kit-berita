<?php

namespace App\Http\Controllers;

// Import semua class yang dibutuhkan
use App\Models\Post;
use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;

class PostController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        // Hanya tampilkan post milik user yang sedang login
        $posts = Post::where('user_id', Auth::id())->latest()->paginate(10);
        return view('posts.index', compact('posts'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        // Ambil semua kategori untuk ditampilkan di dropdown
        $categories = Category::all();
        return view('posts.create', compact('categories'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'title' => 'required|string|max:255',
            'category_id' => 'required|exists:categories,id',
            'content' => 'required|string',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048', // max 2MB
        ]);

        // Proses upload gambar jika ada
        if ($request->hasFile('image')) {
            $imagePath = $request->file('image')->store('posts', 'public');
            $validated['image'] = $imagePath;
        }

        // Tambahkan slug dan user_id
        $validated['slug'] = Str::slug($validated['title']) . '-' . uniqid();
        $validated['user_id'] = Auth::id();
        // Status default adalah 'draft', tidak perlu ditambahkan karena sudah di-set di migrasi

        Post::create($validated);

        return redirect()->route('posts.index')->with('success', 'Berita berhasil disimpan sebagai draft.');
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Post $post)
    {
        // Kebijakan keamanan: Pastikan wartawan hanya bisa edit post miliknya sendiri
        if ($post->user_id !== Auth::id()) {
            abort(403, 'ANDA TIDAK MEMILIKI AKSES UNTUK MENGEDIT BERITA INI.');
        }

        $categories = Category::all();
        return view('posts.edit', compact('post', 'categories'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Post $post)
    {
        // Kebijakan keamanan
        if ($post->user_id !== Auth::id()) {
            abort(403);
        }

        $validated = $request->validate([
            'title' => 'required|string|max:255',
            'category_id' => 'required|exists:categories,id',
            'content' => 'required|string',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
        ]);

        // Proses upload gambar baru jika ada
        if ($request->hasFile('image')) {
            // Hapus gambar lama jika ada
            if ($post->image) {
                Storage::disk('public')->delete($post->image);
            }
            $imagePath = $request->file('image')->store('posts', 'public');
            $validated['image'] = $imagePath;
        }

        $validated['slug'] = Str::slug($validated['title']) . '-' . uniqid();

        $post->update($validated);

        return redirect()->route('posts.index')->with('success', 'Berita berhasil diperbarui.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Post $post)
    {
        // Kebijakan keamanan
        if ($post->user_id !== Auth::id()) {
            abort(403);
        }
        
        // Hapus gambar dari storage
        if ($post->image) {
            Storage::disk('public')->delete($post->image);
        }

        $post->delete();

        return redirect()->route('posts.index')->with('success', 'Berita berhasil dihapus.');
    }
}