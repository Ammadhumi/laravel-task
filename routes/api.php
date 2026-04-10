<?php

use App\Http\Controllers\Api\ProductController;
use App\Http\Controllers\Api\TaskController;

Route::get('/products', [ProductController::class, 'index']);
Route::post('/products', [ProductController::class, 'store']);
Route::delete('/products/{id}', [ProductController::class, 'destroy']);

Route::get('/external-posts', [TaskController::class, 'getExternalPosts']);
Route::get('/scrape-quotes', [TaskController::class, 'scrapeQuotes']);
Route::get('/custom-request', [TaskController::class, 'customRequest']);
