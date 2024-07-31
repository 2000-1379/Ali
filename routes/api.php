<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::get('/user', function (Request $request) {
    return $request->user();
})->middleware('auth:sanctum');

Route::get('/indexCustomer',[\App\Http\Controllers\CustomerController::class,'indexCustomer']);
Route::post('/storeCustomer',[\App\Http\Controllers\CustomerController::class,'storeCustomer']);
Route::patch('/updateCustomer/{id}',[\App\Http\Controllers\CustomerController::class,'updateCustomer']);
Route::delete('/destroyCustomer/{id}',[\App\Http\Controllers\CustomerController::class,'destroyCustomer']);
Route::get('/indexFactors',[\App\Http\Controllers\FactorController::class,'indexFactors']);
Route::post('/storeFactor',[\App\Http\Controllers\FactorController::class,'storeFactors']);
Route::patch('/updateFactors/{id}',[\App\Http\Controllers\FactorController::class,'updateFactors']);
Route::delete('/destroyFactors/{id}',[\App\Http\Controllers\FactorController::class,'destroyFactors']);
Route::get('/indexFactorItem',[\App\Http\Controllers\FactoritemController::class,'indexFactorItem']);
Route::post('/storeFactorItem',[\App\Http\Controllers\FactoritemController::class,'storeFactorItem']);
Route::patch('/updateFactorItem/{id}',[\App\Http\Controllers\FactoritemController::class,'updateFactorItem']);
Route::delete('/destroyFactorItem/{id}',[\App\Http\Controllers\FactoritemController::class,'destroyFactorItem']);
Route::get('/indexFactors',[\App\Http\Controllers\FactorController::class,'indexFactors']);
Route::get('/showFactorwithItem/{id}',[\App\Http\Controllers\FactorController::class,'showFactorwithItem']);
Route::get('/getAllFactorsWithCustomers/{id}',[\App\Http\Controllers\FactorController::class,'getAllFactorsWithCustomers']);
Route::get('/getCustomerWithFactors/{customerid}',[\App\Http\Controllers\CustomerController::class,'getCustomerWithFactors']);
Route::get('/getFactorWithItems/{id}',[\App\Http\Controllers\FactorController::class,'getFactorWithItems']);
Route::get('/getFactorItemWithFactor/{id}',[\App\Http\Controllers\FactoritemController::class,'getFactorItemWithFactor']);
Route::get('/getCustomerWithFactorsAndItems/{id}',[\App\Http\Controllers\CustomerController::class,'getCustomerWithFactorsAndItems']);
