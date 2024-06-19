<?php

use App\Http\Controllers\ClasseController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CourseController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\ForgotPasswordController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\RoleController;
use App\Http\Controllers\RolePermissionController;
use App\Http\Controllers\UserController;

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

//Login
Route::get('/login', [LoginController::class, 'index'])->name('login.index');
Route::post('/login', [LoginController::class, 'loginProcess'])->name('login.process');
Route::get('/create-user-login', [LoginController::class, 'create'])->name('login.create-user');
Route::post('/store-user-login', [LoginController::class, 'store'])->name('login.store-user');

//Recuperar senha
Route::get('/forgot-password', [ForgotPasswordController::class, 'showForgotPassword'])->name('forgot-password.show');
Route::post('/forgot-password', [ForgotPasswordController::class, 'submitForgotPassword'])->name('forgot-password.submit');
Route::post('/', [LoginController::class, 'index'])->name('password.reset');
Route::get('/reset-password/{token}', [ForgotPasswordController::class, 'showResetPassword'])->name('reset-password.show');
Route::post('/reset-password', [ForgotPasswordController::class, 'submitResetPassword'])->name('reset-password.submit');

Route::group(['middleware' => 'auth'], function(){

    //Logout
    Route::get('/logout', [LoginController::class, 'destroy'])->name('login.destroy');

    //Dashboard
    Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard.index');

    //Perfil
    Route::get('/show-profile', [ProfileController::class, 'show'])->name('profile.show');
    Route::get('/edit-profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::put('/update-profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::get('/edit-profile-password', [ProfileController::class, 'editPassword'])->name('profile.edit-password');
    Route::put('/update-profile-password', [ProfileController::class, 'updatePassword'])->name('profile.update-password');

    //Usuarios
    Route::get('/index-users', [UserController::class, 'index'])->name('user.index');
    Route::get('/show-user/{user}', [UserController::class, 'show'])->name('user.show');
    Route::get('/create-user', [UserController::class, 'create'])->name('user.create');
    Route::post('/store-user', [UserController::class, 'store'])->name('user.store');
    Route::get('/edit-user/{user}', [UserController::class, 'edit'])->name('user.edit');
    Route::put('/update-user/{user}', [UserController::class, 'update'])->name('user.update');
    Route::get('/edit-user-password/{user}', [UserController::class, 'editPassword'])->name('user.edit-password');
    Route::put('/update-user-password/{user}', [UserController::class, 'updatePassword'])->name('user.update-password');
    Route::delete('/destroy-user/{user}', [UserController::class, 'destroy'])->name('user.destroy');

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
    Route::delete('destroy-classe/{classe}', [ClasseController::class, 'destroy'])->name('classe.destroy');

    //Papéis
    Route::get('/index-role', [RoleController::class, 'index'])->name('role.index');
    Route::get('/create-role', [RoleController::class, 'create'])->name('role.create');
    Route::get('/edit-role/{role}', [RoleController::class, 'edit'])->name('role.edit');
    Route::delete('/destroy-role/{role}', [RoleController::class, 'destroy'])->name('role.destroy');
    Route::put('/update-role/{role}', [RoleController::class, 'update'])->name('role.update');
    Route::post('/store-role', [RoleController::class, 'store'])->name('role.store');

    //Permissões do papel
    Route::get('/index-role-permission/{role}', [RolePermissionController::class, 'index'])->name('role-permission.index');

});
