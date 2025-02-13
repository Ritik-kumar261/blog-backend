<?php

use App\Http\Controllers\BlogController;
use Illuminate\Support\Facades\Route;

Route::get('/blogs',[BlogController::class,'index']);
Route::get('/blogs/{id}',[BlogController::class,'blogDetails']);
Route::post('/blogs',[BlogController::class,'storeBlog']);
Route::put('/blogs/{id}',[BlogController::class,'updateBlog']);
Route::delete('/blogs/{id}',[BlogController::class,'deleateBlog']);