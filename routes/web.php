<?php

use Illuminate\Support\Facades\Route;
use App\Models\Listing;

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

Route::get('/', function () {
    return view('welcome');
});

//all listing
Route::get('/examples', function () {
    return view('examples',
    [
        'heading' => 'Latest Listing',
        'listings' => Listing::all()
    ]
);
});

//single listing
Route::get('/examples/{id}', function ($id) {
    return view('example',
    [
        'listing' => Listing::find($id)
    ]
);
});
