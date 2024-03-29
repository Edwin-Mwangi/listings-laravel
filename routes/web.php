<?php

use App\Models\Gigs;
use App\Models\Example;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\GigsController;
use App\Http\Controllers\UserController;

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

//these are also used as naming conventions for blade files
// Common Resource Routes:
// index - Show all listings
// show - Show single listing
// create - Show form to create new listing
// store - Store new listing
// edit - Show form to edit listing
// update - Update listing


//database seeder injects dummy users(u can pass how many users) to db using faker library ...brad 54:13 
//php artisan db:seed
//php artisan migrate:refresh --seed

// //simplest return with str returned
//Route::get('/hello', function () {
    //     return 'hello world</h1>';

// //response allows you to include HTML, status & headers
// Route::get('/hello', function () {
//     return response('<h1>hello world</h1>', 200)
//         ->header('Content-Type','text/plain')
//         ->header('foo','bar');
// });

// //wildcard..{}
// Route::get('/posts/{id}', function ($id) {
//     //ddd($id);
//     return response('Post' . $id);
// })->where('id', '[0-9]+');

// //Request class
// Route::get('/search', function (Request $request) {
//     dd($request);
//     //return $request->name . ' ' . $request->city;
// });

//NB: Your views can be normal php files or blade files ie "home.php" or "home.blade.php"
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
// Route::get('/listings', function () {
//     return view('Gigs.listings',
//     [
//         'heading' => 'Latest Listing',
//         'listings' => Gigs::all()
//     ]
// );
// });

//single listing
//we also handle the error to show 404 if listing is nonexistent
// Route::get('/listings/{id}', function ($id) {
//     $listing = Gigs::find($id);
//     if($listing){
//         return view('Gigs.listing',
//             [
//                 'listing' => $listing
//             ]
//         );
//     }else{
//         abort('404');
//     }
// });

//route binding built into eloquent models..cleaner
//alternative of above where no check required
//listing/gig passed automatically in url and arg in func

// Route::get('/listings/{listing}', function (Gigs $listing) {
//     return view('Gigs.listing',
//             [
//                 'listing' => $listing
//             ]
//         );
// });

//we'll now use controllers for both all and single listing
//commented code above

//all listings
Route::get('/listings', [GigsController::class, 'index']);

//manage listings for each user
Route::get('/listings/manage', [GigsController::class, 'manage'])->middleware('auth');


//goto create jobs form
//above single listing to avoid url conflict
//onlu authenticated users(auth) can access this route
Route::get('/listings/create', [GigsController::class, 'create'])->middleware('auth');

//submit form data
//1st post request
Route::post('/listings', [GigsController::class, 'store'])->middleware('auth');

//show edit form
Route::get('/listings/{listing}/edit', [GigsController::class, 'edit'])->middleware('auth');

//submit edit form data(update listing)
//a put request
Route::put('/listings/{listing}', [GigsController::class, 'update'])->middleware('auth');

//delete listing
Route::delete('/listings/{listing}', [GigsController::class, 'destroy'])->middleware('auth');


//single Listing
//at the btm to prevent conflict
Route::get('/listings/{listing}', [GigsController::class, 'show']);


//AUTHENTICATION
//goto register form
//only unauthenticated users(guests) can access register
Route::get('/register', [UserController::class, 'create'])->middleware('guest');

//create/register new user
Route::post('/users', [UserController::class, 'store']);

//logout user
Route::post('/logout', [UserController::class, 'logout'])->middleware('auth');

//show login form
Route::get('/login', [UserController::class, 'login'])->name('login')->middleware('guest');

//login user
Route::post('/users/authenticate', [UserController::class, 'authenticate']);


