<?php

namespace App\Models;

use App\Models\Book;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Review extends Model
{
    use HasFactory;
    protected $fillable = [
        'stars',
        'comment',
        'reviewable_type',
        'book_id',
        'user_id',
    ];
    public function book(): BelongsTo
    {
        return $this->belongsTo(Book::class);
    }
}
