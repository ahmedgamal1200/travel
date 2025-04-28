<?php

use App\Http\Controllers\Api\Home\HomeController;
use App\Http\Controllers\Api\Home\SendMessage;
use App\Http\Controllers\Api\service\ServiceController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::get('/user', function (Request $request) {
    return $request->user();
})->middleware('auth:sanctum');

Route::get('/home', [HomeController::class, 'index'])->name('home');
Route::post('/sendMessage', [SendMessage::class, 'sendMessage'])->name('sendMessage');
Route::post('/booking',[ServiceController::class,'book'])->name('booking');
Route::post('/index',[ServiceController::class,'index']);

