<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo; // Import BelongsTo

class Post extends Model
{
    use HasFactory;

    protected $fillable = [
        'title',
        'slug',
        'content',
        'image',
        'user_id',
        'category_id',
        'status',
        'published_at',
    ];

    // Definisikan tipe data untuk casting otomatis
    protected $casts = [
        'published_at' => 'datetime',
    ];

    // Relasi: Sebuah Post dimiliki oleh satu User (Author)
    public function author(): BelongsTo
    {
        return $this->belongsTo(User::class, 'user_id');
    }

    // Relasi: Sebuah Post dimiliki oleh satu Category
    public function category(): BelongsTo
    {
        return $this->belongsTo(Category::class);
    }
}