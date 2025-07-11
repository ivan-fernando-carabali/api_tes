<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

use App\Http\Controllers\TrainingCenterController;
use App\Http\Controllers\CourseController;
use App\Http\Controllers\TeacherController;
use App\Http\Controllers\AprendiceController;
use App\Http\Controllers\AreaController;
use App\Http\Controllers\ComputerController;



route::get('/training-centers', [TrainingCenterController::class, 'index'])->name('training-centers.index');
route::post('/training-centers', [TrainingCenterController::class, 'store'])->name('training-centers.store');
route::get('/training-centers/{id}', [TrainingCenterController::class, 'show'])->name('training-centers.show');
route::put('/training-centers/{id}', [TrainingCenterController::class, 'update'])->name('training-centers.update');
route::delete('/training-centers/{id}', [TrainingCenterController::class, 'destroy'])->name('training-centers.destroy');

route::get('/courses', [CourseController::class, 'index'])->name('courses.index');
route::post('/courses', [CourseController::class, 'store'])->name('courses.store');
route::get('/courses/{id}', [CourseController::class, 'show'])->name('courses.show');
route::put('/courses/{id}', [CourseController::class, 'update'])->  name('courses.update');
route::delete('/courses/{id}', [CourseController::class, 'destroy'])->name('courses.destroy');

route::get('/teachers', [TeacherController::class, 'index'])->name('teachers.index');
route::post('/teachers', [TeacherController::class, 'store'])->name('teachers.store');
route::get('/teachers/{id}', [TeacherController::class, 'show'])->name('teachers.show');
route::put('/teachers/{id}', [TeacherController::class, 'update'])->name('teachers.update');
route::delete('/teachers/{id}', [TeacherController::class, 'destroy'])->name('teachers.destroy');

route::get('/aprendices', [AprendiceController::class, 'index'])->name('aprendices.index');
route::post('/aprendices', [AprendiceController::class, 'store'])->name('aprendices.store');
route::get('/aprendices/{id}', [AprendiceController::class, 'show'])->name('aprendices.show');
route::put('/aprendices/{id}', [AprendiceController::class, 'update'])->name('aprendices.update');
route::delete('/aprendices/{id}', [AprendiceController::class, 'destroy'])->name('aprendices.destroy');

route::get('/areas', [AreaController::class, 'index'])->name('areas.index');
route::post('/areas', [AreaController::class, 'store'])->name('areas.store');
route::get('/areas/{id}', [AreaController::class, 'show'])->name('areas.show');
route::put('/areas/{id}', [AreaController::class, 'update'])->name('areas.update');
route::delete('/areas/{id}', [AreaController::class, 'destroy'])->name('areas.destroy');

route::get('/computers', [ComputerController::class, 'index'])->name('computers.index');
route::post('/computers', [ComputerController::class, 'store'])->name('computers.store');
route::get('/computers/{id}', [ComputerController::class, 'show'])->name('computers.show');
route::put('/computers/{id}', [ComputerController::class, 'update'])->name('computers.update');
route::delete('/computers/{id}', [ComputerController::class, 'destroy'])->name('computers.destroy');

