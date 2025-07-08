<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

// Route::get('/user', function (Request $request) {
//     return $request->user();
// })->middleware('auth:sanctum');

Route::post('/my-subscribers', [App\Http\Controllers\API\SubscriberController::class, 'store']);
Route::post('/send-enquiry', [App\Http\Controllers\API\SubscriberController::class, 'store']);