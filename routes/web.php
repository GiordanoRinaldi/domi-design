<?php

use App\Http\Controllers\Admin\CategoryController;
use App\Http\Controllers\Admin\PageController;
use App\Http\Controllers\Admin\ProjectController;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\FrontendController;
use Illuminate\Support\Facades\Route;

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

Route::get('/', [FrontendController::class, 'index']);

Route::get('/lavoro', [FrontendController::class, 'show'])->name('lavoro');
Route::get('/projects', [FrontendController::class, 'projects'])->name('projects');

// Authentication Routes...
Route::middleware('guest')->group(function (){
    Route::get('/login', [LoginController::class, 'showLoginForm'])->name('login');
    Route::post('/login', [LoginController::class, 'login']);
});
// Logout
Route::post('logout', [LoginController::class, 'logout'])->name('logout');

// Admin Routes
Route::middleware('auth')->prefix('admin')->group(function (){
    Route::name('admin.')->group(function (){
        Route::get('/home', [PageController::class, 'index'])->name('home');
    });
    Route::resource('categories', CategoryController::class)->except('index', 'show');
    Route::resource('projects', ProjectController::class)->except('index',);
});
