<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

use App\Http\Controllers\AuthController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\StudentController;
use App\Http\Controllers\LecturerController;
use App\Http\Controllers\EnrollmentController;
use App\Http\Controllers\SubjectController;
use App\Http\Controllers\ClassController;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "api" middleware group. Make something great!
|
*/

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

Route::prefix('v1')->group(function () {
    // AuthController
    Route::prefix('auth')->group(function () {
        Route::post('login', [AuthController::class, 'login']);
        Route::post('/token/validate', [AuthController::class, 'validateToken'])->name('api.auth.token.validate');
    });

    // BaseController UwU
    Route::apiResource('users', UserController::class);
    Route::apiResource('students', StudentController::class);
    Route::apiResource('lecturers', LecturerController::class);
    Route::apiResource('enrollments', EnrollmentController::class);
    Route::apiResource('subjects', SubjectController::class);
    Route::apiResource('classes', ClassController::class);
});