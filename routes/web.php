<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\ZenBlogController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\AuthorController;
use App\Http\Controllers\BlogController;
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
});
Route::get('/',[ZenBlogController::class,'index'])->name('home');
Route::get('/blog-details/{slug}',[ZenBlogController::class,'blog'])->name('blog.details');
Route::get('/about',[ZenBlogController::class,'about'])->name('about');
Route::get('/contact',[ZenBlogController::class,'contact'])->name('contact');
Route::get('/category',[ZenBlogController::class,'category'])->name('category');
Route::get('/blog/category/{cat_id}',[ZenBlogController::class,'categoryWiseBlogs'])->name('blog.category');

Route::middleware(['auth:sanctum', config('jetstream.auth_session'),'verified'
])->group(function () {
Route::get('/dashboard',[DashboardController::class, 'index'])->name('dashboard');
Route::get('/category',[CategoryController::class, 'index'])->name('category');
Route::post('/category',[CategoryController::class, 'store'])->name('category.create');
Route::get('/category/edit/{id}',[CategoryController::class, 'edit'])->name('edit.category');
Route::post('/category/edit',[CategoryController::class, 'update'])->name('update.category');
Route::post('/category/delete',[CategoryController::class, 'delete'])->name('delete');
Route::get('/author',[AuthorController::class, 'index'])->name('author');
Route::post('/author',[AuthorController::class, 'store'])->name('store.author');
Route::get('/author/edit/{id}',[AuthorController::class, 'edit'])->name('edit.author');
Route::post('/author/edit',[AuthorController::class, 'update'])->name('update.author');
Route::get('blog',[BlogController::class,'index'])->name('blog');
Route::post('blog',[BlogController::class,'saveBlog'])->name('save.blog');
Route::get('manage/blog',[BlogController::class,'manageBlog'])->name('manage.blog');
Route::get('edit/blog/{id}',[BlogController::class,'edit'])->name('edit.blog');
Route::post('edit/blog',[BlogController::class,'update'])->name('update.blog');
Route::post('delete/blog',[BlogController::class,'delete'])->name('delete.blog');
Route::get('status/{id}',[BlogController::class,'status'])->name('status');
});

//Route::get('/dashboard',[DashboardController::class, 'index'])->name('dashboard');
