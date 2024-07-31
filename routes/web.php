<?php

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});


Route::get('/showIndex',[\App\Http\Controllers\CustomerController::class,'showIndex']);
