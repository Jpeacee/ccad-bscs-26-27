<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\AuthorProfile;
use Illuminate\Http\Request;
use Inertia\Inertia;

class AuthorProfileController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
       $authorProfile = AuthorProfile::select(['id','author_id','bio'])->with([
        'author'      
        
        ])->get(); 

        dd($authorProfile);

        return Inertia::render('authorProfiles/index', [
            'authorProfiles' => $authorProfile
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
    public function show(AuthorProfile $authorProfile)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(AuthorProfile $authorProfile)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, AuthorProfile $authorProfile)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(AuthorProfile $authorProfile)
    {
        //
    }
}
