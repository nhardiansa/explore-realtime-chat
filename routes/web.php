<?php

use App\Http\Controllers\ChatMessageController;
use Illuminate\Support\Facades\Route;

Route::view('/', 'welcome');

Route::get('dashboard', [ChatMessageController::class, 'index'])
    ->middleware(['auth', 'verified'])
    ->name('dashboard');

Route::get('chat/{user}', [ChatMessageController::class, 'show'])
    // ->middleware(['auth', 'verified'])
    ->name('chat-personal');


Route::get('messages/{user}', [ChatMessageController::class, 'messages']);
Route::post('messages', [ChatMessageController::class, 'store']);

Route::view('profile', 'profile')
    ->middleware(['auth'])
    ->name('profile');

require __DIR__ . '/auth.php';
