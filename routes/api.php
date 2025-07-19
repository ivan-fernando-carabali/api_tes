<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

use App\Http\Controllers\TrainingCenterController;
use App\Http\Controllers\CourseController;
use App\Http\Controllers\TeacherController;
use App\Http\Controllers\AprendiceController;
use App\Http\Controllers\AreaController;
use App\Http\Controllers\ComputerController;

Route::prefix('v1')->group(function () {
    Route::get('/computers', [ComputerController::class, 'index']);
    Route::post('/computers', [ComputerController::class, 'store']);
    Route::get('/computers/{id}', [ComputerController::class, 'show']);
    Route::put('/computers/{id}', [ComputerController::class, 'update']);
    Route::delete('/computers/{id}', [ComputerController::class, 'destroy']);
});
Route::prefix('v1')->group(function () {
Route::get('/training-centers', [TrainingCenterController::class, 'index'])->name('training-centers.index');
Route::post('/training-centers', [TrainingCenterController::class, 'store'])->name('training-centers.store');
Route::get('/training-centers/{id}', [TrainingCenterController::class, 'show'])->name('training-centers.show');
Route::put('/training-centers/{id}', [TrainingCenterController::class, 'update'])->name('training-centers.update');
Route::delete('/training-centers/{id}', [TrainingCenterController::class, 'destroy'])->name('training-centers.destroy');
});
Route::prefix('v1')->group(function () {
Route::get('/courses', [CourseController::class, 'index'])->name('courses.index');
Route::post('/courses', [CourseController::class, 'store'])->name('courses.store');
Route::get('/courses/{id}', [CourseController::class, 'show'])->name('courses.show');
Route::put('/courses/{id}', [CourseController::class, 'update'])->name('courses.update');
Route::delete('/courses/{id}', [CourseController::class, 'destroy'])->name('courses.destroy');
});
Route::prefix('v1')->group(function () {
Route::get('/teachers', [TeacherController::class, 'index'])->name('teachers.index');
Route::post('/teachers', [TeacherController::class, 'store'])->name('teachers.store');
Route::get('/teachers/{id}', [TeacherController::class, 'show'])->name('teachers.show');
Route::put('/teachers/{id}', [TeacherController::class, 'update'])->name('teachers.update');
Route::delete('/teachers/{id}', [TeacherController::class, 'destroy'])->name('teachers.destroy');
});
Route::prefix('v1')->group(function () {
Route::get('/aprendices', [AprendiceController::class, 'index'])->name('aprendices.index');
Route::post('/aprendices', [AprendiceController::class, 'store'])->name('aprendices.store');
Route::get('/aprendices/{id}', [AprendiceController::class, 'show'])->name('aprendices.show');
Route::put('/aprendices/{id}', [AprendiceController::class, 'update'])->name('aprendices.update');
Route::delete('/aprendices/{id}', [AprendiceController::class, 'destroy'])->name('aprendices.destroy');
});
Route::prefix('v1')->group(function () {
Route::get('/areas', [AreaController::class, 'index']);
Route::post('/areas', [AreaController::class, 'store']);
Route::get('/areas/{id}', [AreaController::class, 'show']);
Route::put('/areas/{id}', [AreaController::class, 'update']);
Route::delete('/areas/{id}', [AreaController::class, 'destroy']);
});








