<?php

use App\Http\Controllers\Admin\AdminHomeController;
use App\Http\Controllers\Admin\AdminLoginController;
use App\Http\Controllers\Admin\CategoryController;
use App\Http\Controllers\Admin\SubCategoryController;
use App\Http\Controllers\Admin\BookController;
use App\Http\Controllers\Frontend\ViewController as FrontendViewController;
use App\Models\Book;
use Illuminate\Support\Facades\Route;

// Frontend Routes
Route::get('/', function () {
  $all_posts = Book::orderBy('created_at', 'DESC')->paginate(3);
  return view('home', compact('all_posts'));
})->name('home');

Route::get('/posts', [FrontendViewController::class, 'view_list'])->name('book_list');
Route::get('/posts/{id}', [FrontendViewController::class, 'view_single'])->name('book_details');
Route::post('/posts/search', [FrontendViewController::class, 'search'])->name('search');

// Admin Routes
Route::group(['prefix' => '/admin'], function () {
  Route::get('/', [AdminHomeController::class, 'home'])->name('admin_home')->middleware('admin:admin');
    
  Route::get('/profile/{id}', [AdminHomeController::class, 'profile'])->name('admin_profile');
  
  Route::get('/login', [AdminLoginController::class, 'login'])->name('admin_login');
  Route::get('/forgot', [AdminLoginController::class, 'forgot'])->name('admin_forgot');
  Route::get('/logout', [AdminLoginController::class, 'logout'])->name('admin_logout');
  Route::get('/reset-password/{token}/{email}', [AdminLoginController::class, 'reset'])->name('admin_reset');

  Route::post('/login/submit', [AdminLoginController::class, 'login_submit'])->name('admin_login_submit');
  Route::post('/forgot/submit', [AdminLoginController::class, 'forgot_submit'])->name('admin_forgot_submit');
  Route::post('/reset/submit', [AdminLoginController::class, 'reset_submit'])->name('admin_reset_submit');

  Route::get('/categories', [CategoryController::class, 'show'])->name('admin_category_show');
  Route::get('/categories/create', [CategoryController::class, 'create'])->name('admin_category_create');
  Route::get('/categories/edit/{id}', [CategoryController::class, 'edit'])->name('admin_category_edit');
  Route::get('/categories/delete/{id}', [CategoryController::class, 'delete'])->name('admin_category_delete');

  Route::post('/categories/create/submit', [CategoryController::class, 'create_submit'])->name('admin_category_create_submit');
  Route::post('/categories/edit/{id}/submit', [CategoryController::class, 'edit_submit'])->name('admin_category_edit_submit');

  Route::get('/subcategories', [SubCategoryController::class, 'show'])->name('admin_subcategory_show');
  Route::get('/subcategories/create', [SubCategoryController::class, 'create'])->name('admin_subcategory_create');
  Route::get('/subcategories/edit/{id}', [SubCategoryController::class, 'edit'])->name('admin_subcategory_edit');
  Route::get('/subcategories/delete/{id}', [SubCategoryController::class, 'delete'])->name('admin_subcategory_delete');

  Route::post('/subcategories/create/submit', [SubCategoryController::class, 'create_submit'])->name('admin_subcategory_create_submit');
  Route::post('/subcategories/edit/{id}/submit', [SubCategoryController::class, 'edit_submit'])->name('admin_subcategory_edit_submit');


  Route::get('/posts', [BookController::class, 'show'])->name('admin_post_show');
  Route::get('/posts/create', [BookController::class, 'create'])->name('admin_post_create');
  Route::get('/posts/edit/{id}', [BookController::class, 'edit'])->name('admin_post_edit');
  Route::get('/posts/delete/{id}', [BookController::class, 'delete'])->name('admin_post_delete');

  Route::post('/posts/create/submit', [BookController::class, 'create_submit'])->name('admin_post_create_submit');
  Route::post('/posts/edit/{id}/submit', [BookController::class, 'edit_submit'])->name('admin_post_edit_submit');
});