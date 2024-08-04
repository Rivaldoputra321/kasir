<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\DashboardController;

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
})->middleware('auth');

Route::post('/logout', [AuthController::class, 'logout'])->name('logout');

Route::get('login', [AuthController::class, 'indexlog']);
Route::get('register', [AuthController::class, 'indexreg']);
Route::post('login',[AuthController::class, 'login'])->name('login');
Route::post('register', [AuthController::class, 'register']);

Route::get('category', [CategoryController::class, 'index']);
Route::get('categories_add', [CategoryController::class, 'add']);
Route::post('categories_add', [CategoryController::class, 'store']);


Route::get('dashboard', [DashboardController::class, 'index']);

Route::get('dashboard_staff', [DashboardController::class, 'indexstaff']);

Route::get('logout', [AuthController::class, 'logout']);

