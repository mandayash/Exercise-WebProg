<?php

use Illuminate\Support\Facades\Route;



//Sign in dan Sign up
Route::get('/signin', function () {
    return 'Signin Form Page';
});
Route::post('/signin', function () {
    return 'Processing Signin Data';
});
Route::get('/signup', function () {
    return 'Signup Form Page';
});
Route::post('/signup', function () {
    return 'Processing Signup Data';
});

//Home
Route::get('/', function () {
    return 'Welcome to the Login Page!';
});

// Blog
Route::get('/blog', function () {
    return 'Blog List Page';
});
Route::get('/blog/{slug}', function ($slug) {
    return "Blog Detail Page for slug: $slug";
});

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
