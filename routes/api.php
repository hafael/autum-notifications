<?php

use Illuminate\Support\Facades\Route;

Route::group([
    'middleware' => ['auth:sanctum', 'verified'],
    'prefix' => 'notifications',
    'as' => 'notifications.'
], function(){
    Route::get('/', [\Autum\Notifications\Http\Controllers\API\NotificationController::class, 'notifications'])->name('index');
    Route::delete('/', [\Autum\Notifications\Http\Controllers\API\NotificationController::class, 'clearNotifications'])->name('clear');
    Route::put('/mark-as-read', [\Autum\Notifications\Http\Controllers\API\NotificationController::class, 'readAllNotifications'])->name('read-all');
    Route::get('/{id}', [\Autum\Notifications\Http\Controllers\API\NotificationController::class, 'readNotification'])->name('read'); 
});