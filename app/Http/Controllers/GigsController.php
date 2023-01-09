<?php

namespace App\Http\Controllers;

use App\Models\Gigs;
use Illuminate\Http\Request;

class GigsController extends Controller
{
    //
    public function index(){
        // dd(request());
        return view('Gigs.index',
    [
        'heading' => 'Latest Listing',
        // 'listings' => Gigs::all()
        //the filter is used to allow user to filter listings based on search terms and tags 
        //...check Gigs.php
        //request tag used here
        'listings' => Gigs::latest()->filter(request(['tag', 'search']))->get()
    ]
);

    }

    //single gig
    public function show(Gigs $listing) {
        return view('Gigs.show',
            [
                'listing' => $listing
            ]
        );
    }
}
