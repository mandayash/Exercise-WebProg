<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Http\Request;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\BlogController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\AuthorController;

use App\Http\Controllers\UserController;

Route::get('/signin', [UserController::class, 'showLoginForm'])->name('signin');
Route::post('/signin', [UserController::class, 'signin']);
Route::post('/signup', [UserController::class, 'signup']);


// Home
Route::get('/', function () {
    return view('welcome');
});

// Sign in dan Sign up
Route::get('/signin', function () {
    return view('signin');
});

Route::post('/signin', function (Request $request) {
    // Simulasi login
    $request->session()->put('user', [
        'is_login' => true,
        'name' => 'Amanda',
    ]);

    return redirect('/profile');
});

Route::get('/signup', function () {
    return view('signup');
});

Route::post('/signup', function () {
    return 'Processing Signup Data';
});

// Blog
Route::get('/blog', function () {
    return view('blog');
});

Route::get('/blog/{slug}', function ($slug) {
    return "Blog Detail Page for slug: $slug";
});

// Profile dengan middleware auth
Route::get('/profile', function () {
    return view('profile');
})->middleware('auth');

// Category
Route::get('/category/{slug}', function ($slug) {
    return "Category Page for slug: $slug";
});

// Author
Route::get('/author/{username}', function ($username) {
    return "Author Page for username: $username";
});

// Privacy Policy
Route::get('/privacy-policy', function () {
    return 'Privacy Policy Page';
});
