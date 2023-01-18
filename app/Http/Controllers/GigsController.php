<?php

namespace App\Http\Controllers;

use App\Models\Gigs;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;

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

    //goto create job 
    public function create() {
        return view ('Gigs.create');
    }

    //submit form data
    public function store(Request $request){        //depedency injection as an arg
        // dd($request);
        //simple validation in laravel...check docs 2:11:00
        $formFields = $request->validate([
            'title'=>'required',
            //company must be unique...gigs is db table & company is db field
            'company'=>['required', Rule::unique(['gigs','company'])],
            'email'=>['required','email'],
            'location'=>'required',
            'website'=>'required',
            'tags'=>'required',
            'description'=>'required'          
        ]);

        Gigs::create($formFields);

        //2 ways of sending flash message...session & with()

        Session::flash('message','Listing created successfully');
        return redirect('/');//->with('message','Listing created successfully')

    }

}
