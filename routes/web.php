<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\UserController;

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::middleware('auth')->prefix('admin')->name('admin.')->group(function() {
    Route::get("/index", [AdminController::class, "index"])->name('index');
    Route::put("/status/{id}", [AdminController::class, "status"])->name('status');
    Route::put("/reply/{id}", [AdminController::class, "reply"])->name('reply');
    Route::delete("/delete/{id}", [AdminController::class, "delete"])->name('delete');
});

Route::name('user.')->prefix('user')->group(function() {
    Route::get('/index', [UserController::class, 'index'])->name('index');
    Route::post('/store', [UserController::class, 'store'])->name('store');
});
