<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\ProductController;

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

Route::get('/', function () {
    return view('welcome');
});
Route::get('signup',[AuthController::class, 'create'])->name('signup.create');
Route::post('signup', [AuthController::class, 'store'])->name('signup.store');
Route::get('login',[AuthController::class, 'index'])->name('login.index');
Route::post('login', [AuthController::class, 'login'])->name('login.login');
// Route::post('dashbord', [AuthController::class, 'dashbord'])->name('dashbord');
Route::resource('categories', CategoryController::class);
Route::resource('products', ProductController::class);
