<?php

use App\Http\Controllers\MahasiswaController;
use Illuminate\Support\Facades\Route;


Route::get('/', function () {

    return view('home');

});


Route::get('/profile', [MahasiswaController::class, 'index']);


Route::get('/about', function () {

    return view('about');

});