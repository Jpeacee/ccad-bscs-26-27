<?php

namespace App\Models;

use App\Models\Author;
use App\Models\Publisher;
use App\Models\Review;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Book extends Model
{
    use HasFactory;
    protected $fillable = [
        'title',
        'slug',
        'isbn',
        'price',
        'description',
        'image',
        'author_id',
        'publisher_id',
    ];
    public function author(): BelongsTo
    {
        return $this->belongsTo(Author::class);
    }
    public function publisher(): BelongsTo
    {
        return $this->belongsTo(Publisher::class);
    }
    public function reviews(): HasMany
    {
        return $this->hasMany(Review::class);
    }
    public function genres(): BelongsToMany
    {
        return $this->belongsToMany(Genre::class, 'book_genre','book_id','genre_id')->withTimestamps();
    }
}
