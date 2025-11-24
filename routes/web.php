<?php

use App\Http\Controllers\ClassController;
use App\Http\Controllers\CourseController;
use App\Http\Controllers\GradeController;
use App\Http\Controllers\StudentController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\TeacherController;
use App\Http\Controllers\SubjectController;
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




Route::get('/', [DashboardController::class, 'index'])->name('dashboard');

Route::prefix('teacher')->name('teacher.')->group(function () {
    Route::get('/', [TeacherController::class, 'index'])->name('teacher.index');
    Route::get('/add', [TeacherController::class, 'add'])->name('teacher.add');
    Route::get('/edit', [TeacherController::class, 'edit'])->name('teacher.edit');
    Route::get('/show', [TeacherController::class, 'show'])->name('teacher.show');
    Route::post('/store', [TeacherController::class, 'store'])->name('teacher.store');
});

Route::prefix('student')->name('student.')->group(function () {
    Route::get('/', [StudentController::class, 'index'])->name('index');
    Route::get('/create', [StudentController::class, 'create'])->name('create');
    Route::get('/edit', [StudentController::class, 'edit'])->name('edit');
    Route::get('/show', [StudentController::class, 'show'])->name('show');
    Route::post('/store', [StudentController::class, 'store'])->name('store');
});

route::prefix('course')->name('course.')->group(function () {
    Route::get('/', [CourseController::class, 'index'])->name('index');
    Route::get('/create', [CourseController::class, 'create'])->name('create');
    Route::get('/edit', [CourseController::class, 'edit'])->name('edit');
    Route::get('/show', [CourseController::class, 'show'])->name('show');
    Route::post('/store', [CourseController::class, 'store'])->name('store');
});

Route::prefix('subject')->name('subject.')->group(function () {
    Route::get('/', [SubjectController::class, 'index'])->name('index');
    Route::get('/create', [SubjectController::class, 'create'])->name('create');
});

Route::prefix('class')->name('class.')->group(function () {
    Route::get('/', [ClassController::class, 'index'])->name('index');
    Route::get('/create', [ClassController::class, 'create'])->name('create');
    Route::post('/store', [ClassController::class, 'store'])->name('store');
});

Route::prefix('grade')->name('grade.')->group(function () {
    Route::get('/', [GradeController::class, 'index'])->name('index');
    Route::get('/create', [GradeController::class, 'create'])->name('create');
});
