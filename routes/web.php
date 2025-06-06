<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\PostController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\auth\LoginController;
use App\Http\Controllers\auth\RegisterController;


/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/
//registration
Route::get('/register', [RegisterController::class, 'showRegistrationForm'])->name('register');

//registration
Route::post('/register', [RegisterController::class, 'register']);

Route::get('/login', [LoginController::class, 'showLoginForm'])->name('logins');
Route::post('/login', [LoginController::class, 'login']);
Route::post('/logout', [LoginController::class, 'logout'])->name('logouts');


Route::get('/home', [HomeController::class, 'index'])->name('home');
//posts

Route::patch('/home', [HomeController::class, 'updatePassword']);
//posts

//admin
Route::resource('/admin/posts', AdminController::class)->except('show')->names('admin.posts');
//posts

Route::get('/post', [PostController::class, 'index'])->name('index');
Route::get('/post/{id}', [PostController::class, 'show'])->name('posts.show');
Route::post('/post/{id}/comment', [PostController::class, 'comments'])->name('posts.comment');
Route::get('/categories/{categorie}', [PostController::class, 'postByCategorie'] )->name('posts.byCategorie');
Route::get('/tags/{tag}', [PostController::class, 'postByTag'] )->name('posts.byTag');
