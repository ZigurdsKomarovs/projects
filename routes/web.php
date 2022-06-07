<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PostController;
use App\Models\Comment;
use App\Http\Controllers\CommentController;
use Illuminate\Routing\Route as RoutingRoute;
use App\Http\Middleware\IsAdmin;


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
Route::get('/', function () {
    return view('welcome');
})->name('welcome');

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth'])->name('dashboard');


Route::middleware([IsAdmin::class])->group(function (){
    Route::prefix('admin')->group(function (){
        Route::controller(PostController::class)->group(function () {
            Route::prefix('posts')->group(function () {
                Route::get('/', 'index')->name('posts.index');
                Route::get('/create', 'create')->name('posts.create');
                Route::post('/create', 'store')->name('posts.store');
                Route::get('/show/{post}', 'show')->name('posts.show');
                Route::get('/edit/{post}', 'edit')->name('posts.edit');
                Route::post('/edit/{post}', 'update')->name('posts.update');
                Route::get('/destroy/{post}', 'destroy')->name('posts.destroy');
            });
        });
    });
});


Route::controller(CommentController::class)->group(function () {
    Route::prefix('comments')->group(function () {
        Route::get('/', function () {
            $comment = Comment::find(1);
            dd($comment->commentable);
        });
        Route::post('/store', 'store')->name('comments.store');
    });
});

require __DIR__.'/auth.php';
