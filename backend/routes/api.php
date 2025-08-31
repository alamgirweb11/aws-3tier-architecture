<?php

use Illuminate\Http\Request;
use App\Http\Controllers\Api\AuthorController;
use Illuminate\Support\Facades\Route;

Route::get('/user', function (Request $request) {
    return $request->user();
})->middleware('auth:sanctum');

Route::apiResource('authors', AuthorController::class);

