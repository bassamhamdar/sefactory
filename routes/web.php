<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\PagesController;
use App\Http\Controllers\PostController;
use App\Http\Controllers\CommentController;

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
    return view('auth.login');
});

Route::resource('posts', PostController::class)->middleware('auth');
Route::post('comments/{post_id}', [CommentController::class, 'store'])->name('comments.store');
Route::middleware(['auth:sanctum', 'verified'])->get('/dashboard', function () {
    
    return view('dashboard');
})->name('dashboard');
// Route::get('auth/login', AuthController::class, 'getlogin');
// Route::post('auth/login', AuthController::class, 'postlogin');
// Route::get('auth/logout', AuthController::class, 'getlogout');
// Route::get('auth/register', AuthController::class, 'getRegister');
// Route::post('auth/login', AuthController::class, 'postRegister');



// Route::get('/index',[PagesController::class, 'index']);

// Route::get('/about',[PagesController::class, 'about']);

// Route::get('/services',[PagesController::class, 'services']);

// Route::get('/posts',[PostController::class, 'index']);

