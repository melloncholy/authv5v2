<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\FacebookController;
use App\Http\Controllers\GoogleController;
use App\Http\Controllers\MessagesController;
use App\Http\Controllers\PostController;
use App\Http\Controllers\Profile\ProfileSettingsController;
use App\Http\Controllers\Profile\ShowProfileController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/


/* Facebook Auth */
Route::get('auth/facebook', [FacebookController::class, 'redirectToFacebook']);
Route::get('auth/facebook/callback', [FacebookController::class, 'handleFacebookCallback']);

/* Google Auth */
Route::get('auth/google', [GoogleController::class, 'redirectToGoogle']);
Route::get('auth/google/callback', [GoogleController::class, 'handleGoogleCallback']);

Route::get('/profile', [ShowProfileController::class, 'show'])
        ->middleware('auth')
        ->name('profile');
Route::get('/profile/{id}', [ShowProfileController::class, 'showProfiles'])
        ->middleware('auth');

Route::get('/profile-settings', [ProfileSettingsController::class, 'show'])
        ->middleware('auth');
Route::post('/profile-settings', [ProfileSettingsController::class, 'update'])
        ->name('change.profile')
        ->middleware('auth');

// Route::get('/messages', [MessagesController::class, 'show'])
//         ->middleware('auth');
// Route::post('/messages', [MessagesController::class, 'create'])
//         ->middleware('auth')
//         ->name('create.conversation');
// Route::get('/messages/{id}', [MessagesController::class, 'showConversation'])
//         ->middleware('auth')
//         ->name('messages.conversation');
// Route::post('/messages/send', [MessagesController::class, 'sendMessage'])
//         ->middleware('auth')
//         ->name('messages.send');

Route::get('/messages/create', [MessagesController::class, 'show'])
        ->middleware('auth')
        ->name('create.conversation');
Route::post('/messages/create', [MessagesController::class, 'create'])
        ->middleware('auth')
        ->name('create.form-conversation');
Route::get('/messages', [MessagesController::class, 'showConversations'])
        ->middleware('auth')
        ->name('conversation.list');
Route::get('/messages/{id}', [MessagesController::class, 'toConversation'])
        ->middleware('auth');
Route::post('/messages/send', [MessagesController::class, 'sendMessage'])
        ->middleware('auth')
        ->name('messages.send');
Route::post('/messages/delete', [MessagesController::class, 'deleteMessage'])
        ->middleware('auth')
        ->name('messages.delete');


Route::get('/post', [PostController::class, 'show'])
    ->middleware('auth')
    ->name('show.post');
Route::post('/post/create', [PostController::class, 'create'])
    ->middleware('auth')
    ->name('create.post');


Route::get('/', function () {
    return view('welcome');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth'])->name('dashboard');

require __DIR__.'/auth.php';
