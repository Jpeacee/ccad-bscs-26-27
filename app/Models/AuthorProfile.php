<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class AuthorProfile extends Model
{
    use HasFactory;
    protected $fillable = [
       'author_id', 'bio',
        
    ];
    public function author(): BelongsTo
    {
        return $this->belongsTo(Author::class, 'author_id');
    }
}
