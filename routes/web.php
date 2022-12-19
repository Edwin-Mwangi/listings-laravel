<?php

use App\Models\Gigs;
use App\Models\Example;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

//database seeder injects dummy users(u can pass how many users) to db using faker library ...brad 54:13 
//php artisan db:seed

Route::get('/', function () {
    return view('welcome');
});

//all listing
Route::get('/examples', function () {
    return view('examples.examples',
    [
        'heading' => 'Latest Listing',
        'listings' => Example::all()
    ]
);
});

//single listing
Route::get('/examples/{id}', function ($id) {
    return view('examples.example',
    [
        'listing' => Example::find($id)
    ]
);
});

//serious stuff
Route::get('/listings', function () {
    return view('Gigs.listings',
    [
        'heading' => 'Latest Listing',
        'listings' => Gigs::all()
    ]
);
});

//single listing
//we also handle the error to show 404 if listing is nonexistent
Route::get('/listings/{id}', function ($id) {
    $listing = Gigs::find($id);
    if($listing){
        return view('Gigs.listing',
            [
                'listing' => $listing
            ]
        );
    }else{
        abort('404');
    }
});

//route binding built into eloquent models..cleaner
//alternative of above where no check required
//listing/gig passed automatically in url and arg in func

Route::get('/listings/{listing}', function (Listing $listing) {
    return view('Gigs.listing',
            [
                'listing' => $listing
            ]
        );
});
