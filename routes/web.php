<?php

use App\Http\Controllers\ClasseController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CourseController;


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

Route::get('/', function () {
    return view('welcome');
});

//Cursos
Route::get('/index-course', [CourseController::class, 'index'])->name('course.index');
Route::get('/show-course/{course}', [CourseController::class, 'show'])->name('course.show');
Route::get('/create-course', [CourseController::class, 'create'])->name('course.create');
Route::post('/store-course', [CourseController::class, 'store'])->name('course.store');
Route::get('/edit-course/{course}', [CourseController::class, 'edit'])->name('course.edit');
Route::put('/update-course/{course}', [CourseController::class, 'update'])->name('course.update');
Route::delete('/destroy-course/{course}', [CourseController::class, 'destroy'])->name('course.destroy');

//Aulas
Route::get('/index-classe/{course}', [ClasseController::class, 'index'])->name('classe.index');
Route::get('/show-classe/{classe}', [ClasseController::class, 'show'])->name('classe.show');
Route::get('/create-classe/{course}', [ClasseController::class, 'create'])->name('classe.create');
Route::post('/store-classe', [ClasseController::class, 'store'])->name('classe.store');
Route::get('/edit-classe/{classe}', [ClasseController::class, 'edit'])->name('classe.edit');
Route::put('/update-classe/{classe}', [ClasseController::class, 'update'])->name('classe.update');