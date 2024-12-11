<?php

use Illuminate\Support\Facades\Route;

Route::get('/profile', function () {
    return "Halaman Profile Anda.";
})->middleware('auth');

