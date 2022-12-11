<?php

use App\Http\Controllers\adminCategoryController;
use App\Http\Controllers\DashboardPostController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PostController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\RegisterController;
use App\Http\Controllers\ContactController;
use App\Models\Category;
use App\Models\User;

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
    return view('home', [
        "title" => "Home",
        "active" => "home",
    ]);
});

Route::get('/about', function () {
    return view('about', [
        "title" => "About",
        "active" => "about",
        "name" => "Nasruddin",
        "email" => "nasruddin.nas@gmail.com",
        "image" => "foto-nas.png"
    ]);
});


Route::get('/blog', [PostController::class, 'index']);
// Halaman single post
Route::get('posts/{post:slug}', [PostController::class, 'show']);


Route::get('/categories', function () {
    return view('categories', [
        "title" => 'Post Categories',
        "active" => "categories",
        "categories" => Category::all()
    ]);
});

Route::get('categories/{category:slug}', function (Category $category) {
    return view('posts', [
        "title" => "Post By Category : $category->name",
        "active" => "categories",
        "posts" => $category->posts->load('author', 'category'),
    ]);
});

Route::get('/authors/{author:username}', function (User $author) {
    return view('posts', [
        "title" => "Post By Author : $author->name",
        "active" => "authors",
        "posts" => $author->posts->load('category', 'author'),
    ]);
});


// Login
Route::get('/login', [LoginController::class, 'index'])->name('login')->middleware('guest');
Route::post('/login', [LoginController::class, 'authenticate']);
Route::post('/logout', [LoginController::class, 'logout']);

Route::get('/register', [RegisterController::class, 'index'])->middleware('guest');
Route::post('/register', [RegisterController::class, 'store']);


// Dashboard
Route::get('/dashboard', function () {
    return view('dashboard.index', [
        "title" => "Dashboard",
        "active" => "dashboard",
    ]);
});

Route::get('/dashboard/posts/checkSlug', [DashboardPostController::class, 'checkSlug'])->middleware('auth');
Route::resource('/dashboard/posts', DashboardPostController::class)->middleware('auth');

Route::resource('/dashboard/categories', adminCategoryController::class)->except('show')->middleware('admin');

// Form emial
Route::view('/contact', '/contactemail/contactForm')->name('contactForm');
Route::post('send', [ContactController::class, 'send'])->name('send.email');
