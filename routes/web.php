<?php

use App\Http\Controllers\AuthenticationController;
use App\Http\Controllers\CalculatorController;
use App\Http\Controllers\FormController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\CategoryController; // Thêm controller cho danh mục
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;

// Authentication routes
Route::get('/login', [AuthenticationController::class, 'login'])->name('login'); 
Route::post('/postLogin', [AuthenticationController::class, 'postLogin'])->name('postLogin');
Route::get('/logout', [AuthenticationController::class, 'logout'])->name('logout'); 
Route::get('/register', [AuthenticationController::class, 'register'])->name('register');
Route::post('/postRegister', [AuthenticationController::class, 'postRegister'])->name('postRegister');

// Admin routes with middleware
Route::group([
    'prefix' => 'admin',
    'as' => 'admin.',
    'middleware' => ['auth', 'checkAdmin']
], function () {
    Route::get('/dashboard', function () {
        return view('admin.dashboard'); // resources/views/admin/dashboard.blade.php
    })->name('dashboard');

    // Product routes
    Route::prefix('products')->name('products.')->group(function () {
        Route::get('list', [ProductController::class, 'index'])->name('list'); // Danh sách sản phẩm
        Route::get('create', [ProductController::class, 'create'])->name('create'); // Form thêm sản phẩm
        Route::post('add', [ProductController::class, 'store'])->name('store'); // Lưu sản phẩm
        Route::get('edit/{id}', [ProductController::class, 'edit'])->name('edit'); // Form chỉnh sửa sản phẩm
        Route::put('update/{id}', [ProductController::class, 'update'])->name('update'); // Cập nhật sản phẩm
        Route::delete('destroy/{id}', [ProductController::class, 'destroy'])->name('destroy'); // Xóa mềm sản phẩm

        // Trashed products
        Route::get('trashed', [ProductController::class, 'trashed'])->name('trashed'); // Danh sách sản phẩm đã xóa mềm
        Route::post('restore/{id}', [ProductController::class, 'restore'])->name('restore'); // Khôi phục sản phẩm
        Route::delete('force-delete/{id}', [ProductController::class, 'forceDelete'])->name('force-delete'); // Xóa vĩnh viễn sản phẩm
    });

    // // Category routes
    Route::prefix('categories')->name('categories.')->group(function () {
        Route::get('/', [CategoryController::class, 'index'])->name('index'); // Danh sách danh mục
        Route::get('create', [CategoryController::class, 'create'])->name('create'); // Form thêm danh mục
        Route::post('store', [CategoryController::class, 'store'])->name('store'); // Lưu danh mục
        Route::get('edit/{id}', [CategoryController::class, 'edit'])->name('edit'); // Form chỉnh sửa danh mục
        Route::put('update/{id}', [CategoryController::class, 'update'])->name('update'); // Cập nhật danh mục
        Route::delete('delete/{id}', [CategoryController::class, 'destroy'])->name('destroy'); // Soft delete
        Route::get('trashed', [CategoryController::class, 'trashed'])->name('trashed'); // Danh sách danh mục đã xóa
        Route::post('restore/{id}', [CategoryController::class, 'restore'])->name('restore'); // Khôi phục danh mục
        Route::delete('force-delete/{id}', [CategoryController::class, 'forceDelete'])->name('force-delete'); // Xóa vĩnh viễn
    });
});