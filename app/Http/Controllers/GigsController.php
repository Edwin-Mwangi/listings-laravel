<?php

namespace App\Http\Controllers;

use App\Models\Gigs;
use Illuminate\Http\Request;

class GigsController extends Controller
{
    //
    public function index(){
        return view('Gigs.listings',
    [
        'heading' => 'Latest Listing',
        'listings' => Gigs::all()
    ]
);

    }

    //single gig
    public function show(Gigs $listing) {
        return view('Gigs.listing',
            [
                'listing' => $listing
            ]
        );
    }
}
