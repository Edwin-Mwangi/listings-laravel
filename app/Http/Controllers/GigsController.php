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
            'company'=>['required', Rule::unique('gigs','company')],
            'email'=>['required','email'],
            'location'=>'required',
            'website'=>'required',
            'tags'=>'required',
            'description'=>'required'          
        ]);

        //assigning the userid var value from id of currently loggedin(authed) user 
        $formFields['user_id'] = auth()->id();

        Gigs::create($formFields);

        //2 ways of sending flash message...session & with()

        // Session::flash('message','Listing created successfully');
        return redirect('/listings')->with('message','Listing created successfully');

    }

    //goto edit form 
    public function edit(Gigs $listing){
        // dd($listing->title);
        return view("Gigs.edit", ['listing' => $listing]);
    }

    //update listing(edit listing)
    public function update(Request $request, Gigs $listing){        //depedency injection as an arg

        //make sure logged in in user is owner
        if($listing->user_id != auth()->id()){
            abort(403, "Unauthorised action");
        }

      //validate helper method to validate field data
        $formFields = $request->validate([
            'title'=>'required',
            //rule in company removed unlike store..coz will hinder update(unique company)..haha
            'company'=>'required',
            'email'=>['required','email'],
            'location'=>'required',
            'website'=>'required',
            'tags'=>'required',
            'description'=>'required'          
        ]);

        //store() used static method(Gigs::create)
        //we'll use reqular method coz listing is an arg in public func update()
        //also method changes from create() to update()
        $listing->update($formFields);
        

        // Session::flash('message','Listing created successfully');
        return back()->with('message','Listing updated successfully');
        //back() returns to prev page

    }

    //delete listing
    public function destroy(Gigs $listing){

        //make sure logged in in user is owner before delete
        if($listing->user_id != auth()->id()){
            abort(403, "Unauthorised action");
        }

        $listing -> delete();
        return redirect('/listings')->with('message','Listing deleted successfully');
    }

    //manage lisings for authed users
    public function manage(Gigs $listings){
        return view('Gigs.manage', [
            //get listings of current user
            'listings' => auth()->user()->gigs()->get()
        ]);
    }



}
