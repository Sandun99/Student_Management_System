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
    Route::get('/create', [TeacherController::class, 'create'])->name('teacher.create');
    Route::post('/store', [TeacherController::class, 'store'])->name('teacher.store');
    Route::get('delete/{id}', [TeacherController::class, 'delete'])->name('teacher.delete');
    Route::get('edit/{id}', [TeacherController::class, 'edit'])->name('teacher.edit');
    Route::post('update/{id}', [TeacherController::class, 'update'])->name('teacher.update');
    Route::get('/{teacher}/view', [TeacherController::class, 'show'])->name('show');
});

Route::prefix('student')->name('student.')->group(function () {
    Route::get('/', [StudentController::class, 'index'])->name('index');
    Route::get('/create', [StudentController::class, 'create'])->name('create');
    Route::post('/store', [StudentController::class, 'store'])->name('store');
    Route::get('/delete/{id}', [StudentController::class, 'delete'])->name('delete');
    Route::get('/edit/{id}', [StudentController::class, 'edit'])->name('edit');
    Route::put('/update/{id}', [StudentController::class, 'update'])->name('update');
    Route::get('/{student}/view', [StudentController::class, 'show'])->name('show');
});

route::prefix('course')->name('course.')->group(function () {
    Route::get('/', [CourseController::class, 'index'])->name('index');
    Route::get('/create', [CourseController::class, 'create'])->name('create');
    Route::post('/store', [CourseController::class, 'store'])->name('store');
    Route::get('/delete/{id}', [CourseController::class, 'delete'])->name('delete');
    Route::get('/edit/{id}', [CourseController::class, 'edit'])->name('edit');
    Route::post('/update/{id}', [CourseController::class, 'update'])->name('update');
    Route::get('/course/{course}/view', [CourseController::class, 'show'])->name('show');
});

Route::prefix('subject')->name('subject.')->group(function () {
    Route::get('/', [SubjectController::class, 'index'])->name('index');
    Route::get('/create', [SubjectController::class, 'create'])->name('create');
    Route::post('/store', [SubjectController::class, 'store'])->name('store');
    Route::get('/delete/{id}', [SubjectController::class, 'delete'])->name('delete');
    Route::get('/edit/{id}', [SubjectController::class, 'edit'])->name('edit');
    Route::post('/update/{id}', [SubjectController::class, 'update'])->name('update');
});

Route::prefix('class')->name('class.')->group(function () {
    Route::get('/', [ClassController::class, 'index'])->name('index');
    Route::get('/create', [ClassController::class, 'create'])->name('create');
    Route::post('/store', [ClassController::class, 'store'])->name('store');
    Route::get('/delete/{id}', [ClassController::class, 'delete'])->name('delete');
    Route::get('/edit/{id}', [ClassController::class, 'edit'])->name('edit');
    Route::post('/update/{id}', [ClassController::class, 'update'])->name('update');
});

Route::prefix('grade')->name('grade.')->group(function () {
    Route::get('/', [GradeController::class, 'index'])->name('index');
    Route::get('/create', [GradeController::class, 'create'])->name('create');
    Route::post('/store', [GradeController::class, 'store'])->name('store');
    Route::get('/delete/{id}', [GradeController::class, 'delete'])->name('delete');
    Route::get('/edit/{id}', [GradeController::class, 'edit'])->name('edit');
    Route::post('/update/{id}', [GradeController::class, 'update'])->name('update');
});
