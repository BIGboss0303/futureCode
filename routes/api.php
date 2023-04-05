<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Api\V1\ProductController;
use App\Http\Controllers\Api\V1\CategoryController;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "api" middleware group. Make something great!
|
*/

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});
Route::group(['prefix'=>'v1', 'namespace'=> 'App\Http\Controllers\Api\V1'], function(){


    Route::GET('categories',[CategoryController::class,'index']);
    Route::POST('categories',[CategoryController::class,'store']);
    Route::PUT('categories/{categoryId}',[CategoryController::class,'update']);
    Route::DELETE('categories/{categoryId}',[CategoryController::class,'destroy']);



    Route::GET('categories/{categoryId}/products',[ProductController::class,'index']);
    Route::POST('categories/{categoryId}/products',[ProductController::class,'store']);
    Route::PUT('categories/{categoryId}/products/{id}',[ProductController::class,'update']);
    Route::DELETE('categories/{categoryId}/products/{id}',[ProductController::class,'destroy']);



    Route::GET('categories/{categoryId}/products/{id}',[ProductController::class,'show']);

    
});