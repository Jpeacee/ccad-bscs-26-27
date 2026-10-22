<?php

namespace App\Http\Controllers;

use App\Http\Requests\Publisher\PublisherRequest;
use App\Models\Publisher;
use App\Services\PublisherService;
use Illuminate\Http\Request;
use Inertia\Inertia;
use Inertia\Response;

class PublisherController extends Controller
{
    public function __construct(private readOnly PublisherService $publisherService)
    {

    }

    /**
     * Display a listing of the resource.
     */
        public function index(Request $request):Response
        {
            $search = $request->search;
            $publisher = $this->publisherService->paginate(is_string($search) ? $search : null, 10);

            return Inertia::render('publisher/index',[
                'publishers' => $publisher,
                'filters' => [
                    'search' => is_string($search) ? $search : '',
                ]
            ]);
        }
    // public function index()
    // {
    //     $publishers = Publisher::select(['id','publisher_name'])->with([
    //         'authors'
    //     ])->get();

    //     dd($publishers);

    //     return Inertia::render('publishers/index', [
    //         'publishers' => $publishers
    //     ]);
    // }

    /**
     * Show the form for creating a new resource.
     */
    public function create():Response
    {
         return inertia::render('publishers/create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(PublisherRequest $publisherRequest)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(Publisher $publisher)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Publisher $publisher)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Publisher $publisher)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Publisher $publisher)
    {
        //
    }
}
