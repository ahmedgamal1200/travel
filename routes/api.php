<?php

use App\Http\Controllers\Api\Home\HomeController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::get('/user', function (Request $request) {
    return $request->user();
})->middleware('auth:sanctum');

Route::get('/home', [HomeController::class, 'index'])->name('home');
Route::post('/sendMessage', [HomeController::class, 'sendMessage'])->name('sendMessage');