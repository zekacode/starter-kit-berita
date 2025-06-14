<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('posts', function (Blueprint $table) {
            $table->id();
            $table->string('title');
            $table->string('slug')->unique();
            $table->longText('content');
            $table->string('image')->nullable(); // Path ke gambar, bisa null

            // Relasi ke tabel Users (Author/Wartawan)
            // onDelete('cascade') artinya jika user dihapus, semua postnya juga ikut terhapus
            $table->foreignId('user_id')->constrained('users')->onDelete('cascade');

            // Relasi ke tabel Categories
            // onDelete('set null') artinya jika kategori dihapus, post ini tidak ikut terhapus,
            // tapi field category_id nya menjadi NULL.
            $table->foreignId('category_id')->nullable()->constrained('categories')->onDelete('set null');

            // Status berita (draft, published, rejected)
            $table->enum('status', ['draft', 'published', 'rejected'])->default('draft');

            $table->timestamp('published_at')->nullable(); // Waktu kapan berita di-publish
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('posts');
    }
};
