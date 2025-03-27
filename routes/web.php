<?php

use App\Http\Controllers\CalculatorController;
use App\Http\Controllers\FormController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});
Route::get('/test', function(){
    echo 'bổng dz';
});
Route::get('/products', [ProductController::class, 'index']);

// // gủi dữ liệu qua controller
// //slug
// Route::get('/get-products/{id}', [ProductController::class, 'getProduct']);

// //pramas
// Route::get('up-products', [ProductController::class, 'upProduct']);
// Route::get('student', [ProductController::class, 'student']);
// Route::get('user/{name}', [UserController::class,'showUser']);
// Route::get('/form', [FormController::class, 'showForm']);
// Route::post('/kq', [FormController::class,'handelSubmit']);
// Route::get('/calculator',[CalculatorController::class, 'showCalculator']);
// Route::post('kqca',[CalculatorController::class,'kqca']);

Route::group(['prefix' => 'users', 'as' => 'users.'], function() {
    Route::get('list-users', [UserController::class, 'list'])->name('list-users');
    Route::get('add', [UserController::class, 'addUser'])->name('addUsers');
    Route::post('add', [UserController::class, 'store'])->name('store');
    Route::get('delete/{id}', [UserController::class, 'delete'])->name('delete');

});
Route::group(['prefix'=> 'products', 'as' => 'products.'], function(){
    Route::get('list-products', [ProductController::class,'list'])->name('list-products');
    Route::get('add', [ProductController::class, 'addProducts'])->name('addProducts');
    Route::post('add', [ProductController::class, 'store'])->name('store');
    Route::get('update/{id}', [ProductController::class, 'edit'])->name('edit');
    Route::put('update/{id}', [ProductController::class, 'update'])->name('update');
    Route::delete('delete/{id}', [ProductController::class, 'deletePro'])->name('deletePro');
   
});

Route::get('test', function () {
    return view('admin.login-page.login');
});


