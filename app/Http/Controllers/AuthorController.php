<?php

namespace App\Http\Controllers;

use App\Http\Requests\Author\AuthorRequest;
use App\Services\AuthorService;
use Illuminate\Http\Request;
use Inertia\Inertia;
use Inertia\Response;

class AuthorController extends Controller
{
    public function __construct(private AuthorService $authorService)
    {

    }
    


    public function index(Request $req): Response
    {
        return Inertia::render('author/index', [
            'authors' => $this->authorService->paginate($req->string('search')->toString(), 10),
            'filters' => $req->only(['search']),
        ]);
        
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return inertia::render('authors/create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(AuthorRequest $authorRequest)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(Author $author)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Author $author)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Author $author)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Author $author)
    {
        //
    }
}
