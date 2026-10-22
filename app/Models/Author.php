<?php

namespace App\Models;

use App\Models\AuthorProfile;
use App\Models\Book;
use App\Models\Publisher;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\HasOne;

class Author extends Model
{
    use HasFactory;
    protected $fillable = [
        'author_name',
        'publisher_id',
    ];
    public function publisher(): BelongsTo
    {
        return $this->belongsTo(Publisher::class);
    }

    public function books(): HasMany
    {
        return $this->hasMany(Book::class);
    }

    public function authorProfile(): HasOne
    {
        return $this->hasOne(AuthorProfile::class);
    }
}
