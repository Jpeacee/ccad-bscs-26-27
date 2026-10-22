<?php

namespace App\Services;

use App\Models\Author;
use Illuminate\Pagination\LengthAwarePaginator;

class AuthorService
{
    public function Paginate(?string $search = null, int $perPage = 10): LengthAwarePaginator
    {
        return Author::query()->with(['publisher:id,publisher_name'])
            ->withcount('books')
            ->when($search, fn ($query) => $query
                ->where('author_name', 'like', "%{$search}%"))
            ->latest()
            ->Paginate($perPage)
            ->withQueryString();
    }
}
