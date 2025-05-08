<?php

use App\Http\Controllers\Api\Home\HomeController;
use App\Http\Controllers\Api\Home\SendMessage;
use App\Http\Controllers\Api\Review\ReviewController;
use App\Http\Controllers\Api\service\FAQController;
use App\Http\Controllers\Api\service\ServiceController;
use Illuminate\Support\Facades\Route;


Route::get('/home', [HomeController::class, 'index'])->name('home');
Route::post('/sendMessage', [SendMessage::class, 'sendMessage'])->name('sendMessage');
Route::post('/booking',[ServiceController::class,'book'])->name('booking');
Route::get('/showServices',[ServiceController::class,'index']);
Route::get('/showFaQ', [FAQController::class, 'index'])->name('showFaQ');
Route::get('/showReviews', [ReviewController::class, 'index']);