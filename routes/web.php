<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\MarkController;
use App\Http\Controllers\RoleController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\StudentController;
use App\Http\Controllers\SubjectController;
use App\Http\Controllers\TeacherController;
use App\Http\Controllers\Auth\ForgotPasswordController;

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
    return view('auth.login');
});

Auth::routes();

Route::get('/teacher', [StudentController::class, 'index1'])->name('home');

Route::get('/student', [StudentController::class, 'student1'])->name('studentindex');

Route::group(['middleware' => ['auth']], function() {
    Route::resource('roles', RoleController::class , ['names' => ['index' => 'roles','create' => 'roles.create']]);
    Route::resource('users', UserController::class , ['names' => ['index' => 'users']]);
    Route::resource('teachers', TeacherController::class , ['names' => ['index' => 'teachers', 'edit' => 'teachers.edit']]);
    Route::resource('students', StudentController::class , ['names' => ['index' => 'students']]);
    Route::resource('subjects', SubjectController::class , ['names' => ['index' => 'subjects']]);
    Route::resource('marks', MarkController::class , ['names' => ['index' => 'marks']]);


});

Route::post('logout', [UserController::class, 'logout'])->name('logout');

Route::get('/student/pdf', [StudentController::class, 'createPDF']);

Route::get('forget-password', [ForgotPasswordController::class, 'showForgetPasswordForm'])->name('forget.password.get');
Route::post('forget-password', [ForgotPasswordController::class, 'submitForgetPasswordForm'])->name('forget.password.post');
Route::get('reset-password/{token}', [ForgotPasswordController::class, 'showResetPasswordForm'])->name('reset.password.get');
Route::post('reset-password', [ForgotPasswordController::class, 'submitResetPasswordForm'])->name('reset.password.post');


