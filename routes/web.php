<?php

use App\Http\Controllers\AdminController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\FacebookController;
use App\Http\Controllers\GoogleController;
use App\Http\Controllers\MessagesController;
use App\Http\Controllers\Post\CategoryController;
use App\Http\Controllers\Profile\ProfileSettingsController;
use App\Http\Controllers\Profile\ShowProfileController;
use App\Http\Controllers\Post\PostController;
use App\Http\Controllers\Post\DraftController;
use App\Http\Controllers\Post\CommentController;
use App\Http\Controllers\Post\MarkController;
use App\Http\Controllers\UserController;

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


Route::get('/post', [PostController::class, 'index'])
    ->middleware('auth')
    ->name('show.post');
Route::get('/post/create', [PostController::class, 'create'])
    ->middleware('auth')
    ->name('create.post');
Route::post('/post/store', [PostController::class, 'store'])
    ->middleware('auth')
    ->name('store.post');
Route::get('/post/moderation', [PostController::class, 'showUnpublished'])
    ->middleware('auth');
Route::get('/post/unpublished/{id}', [PostController::class, 'publish'])
    ->middleware('auth')
    ->name('publish.post');
Route::get('/search/{tag}', [PostController::class, 'toTag']);

Route::get('/post/{id}', [PostController::class, 'show'])
    ->middleware('auth');
Route::get('/post/{id}/like', [MarkController::class, 'like'])
    ->middleware('auth')
    ->name('like.post');
Route::get('/post/{id}/dislike', [MarkController::class, 'dislike'])
    ->middleware('auth')
    ->name('dislike.post');


Route::post('post/send/{id}', [CommentController::class, 'create'])
    ->middleware('auth')
    ->name('send.comment');

Route::get('/draft', [DraftController::class, 'index'])
    ->middleware('auth');
Route::get('/draft/{id}', [DraftController::class, 'show'])
    ->middleware('auth');
Route::get('/draft/{id}/edit', [DraftController::class, 'edit'])
    ->middleware('auth');
Route::post('/draft/{id}', [DraftController::class, 'update'])
    ->middleware('auth')
    ->name('update.draft');
Route::get('/draft/{id}/publish', [DraftController::class, 'publish'])
    ->middleware('auth')
    ->name('publish.draft');

Route::get('/admin/users', [UserController::class, 'index'])
    ->middleware('auth');
Route::get('/users/create', [UserController::class, 'create'])
    ->middleware('auth');
Route::post('/users/create', [UserController::class, 'store'])
    ->middleware('auth')
    ->name('create.user');

Route::get('/admin', [AdminController::class, 'index']);
Route::get('/admin/categories', [AdminController::class, 'categoriesList']);

Route::get('category/create', [CategoryController::class, 'create'])
	->name('create.category');
Route::post('/category/create', [CategoryController::class, 'store'])
	->name('store.category');
Route::get('/category/edit/{id}', [CategoryController::class, 'edit']);
Route::delete('/category/{id}/delete', [CategoryController::class, 'delete']);

Route::get('/', function () {
    return view('welcome');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth'])->name('dashboard');

require __DIR__.'/auth.php';
