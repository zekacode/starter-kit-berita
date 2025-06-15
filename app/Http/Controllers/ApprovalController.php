<?php

namespace App\Http\Controllers;

use App\Models\Post; // Import model Post
use Illuminate\Http\Request;
use Carbon\Carbon; // Import Carbon untuk manipulasi waktu

class ApprovalController extends Controller
{
    /**
     * Menampilkan daftar semua post yang berstatus 'draft'.
     */
    public function index()
    {
        // Ambil semua post dengan status 'draft' dan muat relasi author & category-nya
        // Eager loading (with) untuk menghindari N+1 query problem
        $postsToReview = Post::with('author', 'category')
                            ->where('status', 'draft')
                            ->latest()
                            ->paginate(10);

        return view('approval.index', compact('postsToReview'));
    }

    /**
     * Menyetujui sebuah post.
     */
    public function approve(Post $post)
    {
        // Ubah status dan isi tanggal publikasi
        $post->update([
            'status' => 'published',
            'published_at' => Carbon::now() // Set waktu publikasi ke waktu saat ini
        ]);

        // Kirim notifikasi (bisa email atau notifikasi internal) ke wartawan (opsional, untuk pengembangan nanti)

        return redirect()->route('approval.index')->with('success', 'Berita berhasil disetujui dan dipublikasikan.');
    }

    /**
     * Menolak sebuah post.
     */
    public function reject(Post $post)
    {
        // Ubah status menjadi rejected
        $post->update([
            'status' => 'rejected'
        ]);

        // Kirim notifikasi ke wartawan (opsional)

        return redirect()->route('approval.index')->with('success', 'Berita telah ditolak.');
    }
}