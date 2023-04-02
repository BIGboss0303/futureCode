<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Api\V1\InvoiceController;
use App\Http\Controllers\Api\V1\ProductController;
use App\Http\Controllers\Api\V1\CategoryController;
use App\Http\Controllers\Api\V1\CustomerController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});


Route::group(['prefix'=>'v1', 'namespace'=> 'App\Http\Controllers\Api\V1'], function(){
    Route::GET('customers',[CustomerController::class,'index']);
    Route::apiResource('customers/{id}/invoices',InvoiceController::class);


    Route::GET('categories',[CategoryController::class,'index']);
    Route::GET('categories/{id}/products',[ProductController::class,'index']);
    Route::GET('categories/{categoryId}/products/{id}',[ProductController::class,'show']);


    
});

//Route::Resource('customers',CustomerController::class);