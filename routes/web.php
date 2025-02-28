<?php

use App\Http\Controllers\HomeController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PostController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\EnrollmentController;
/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
*/

//Route::get('/', function () {
//    return view('index'); // Display the 'index.blade.php' view
//});

Route::get('/', [HomeController::class, 'index'])->name('home');

Route::get('/posts/{id}', [PostController::class, 'show']);


Route::group(['prefix' => 'admin', 'middleware' => 'guest:admin'], function () {
    Route::get('/login', [AdminController::class, 'showLoginForm'])->name('login');
    Route::post('/login', [AdminController::class, 'login']);
});

Route::group(['prefix' => 'admin', 'middleware' => 'auth:admin'], function () {
    Route::get('/', [AdminController::class, 'admin'])->name('admin');
    Route::get('/dashboard', [AdminController::class, 'dashboard'])->name('admin.dashboard');
    Route::post('/logout', [AdminController::class, 'logout'])->name('admin.logout'); // Add a logout route
});

Route::resource('enrollments', EnrollmentController::class);