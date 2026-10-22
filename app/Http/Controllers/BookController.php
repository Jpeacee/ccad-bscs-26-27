<?php

namespace App\Http\Controllers;

use App\Models\Author;
use App\Models\Book;
use App\Models\Genre;
use App\Models\Publisher;
use Illuminate\Http\Request;
use Inertia\Inertia;

class BookController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $books = Book::select(['id','title','slug','isbn','price','description','image','author_id','publisher_id'])->with([
            'author',
            'publisher',
            'reviews',
            'genres'
        ])->when(
            $request->search,
            fn($query, $search) =>
            $query->where('title', 'like','%' . $search . '%')
        )
        ->latest()
        ->paginate(10)
        ->withQueryString();

        // dd($books);

        return Inertia::render('books/index', [
            'books' => $books,
             'filters'    => $request->only('search'),
            'authors'    => Author::all(),
            'publishers' => Publisher::all(),
            'genres'     => Genre::all(),
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(Book $book)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Book $book)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Book $book)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Book $book)
    {
        //
    }
}
