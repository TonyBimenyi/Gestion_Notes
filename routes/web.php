<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CourseController;
use App\Http\Controllers\StudentController;
use App\Http\Controllers\DashboardController;

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

Auth::routes();
Route::middleware(['auth',])->group(function(){
    Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');

    //START OF COURSE
    Route::get('/course', [CourseController::class, 'index'])->name('course');

    //END OF COURSE

    //START STUDENT
    Route::get('/students', [StudentController::class, 'index'])->name('students');
    Route::get('/students/add', [StudentController::class, 'form_student'])->name('students.form');
    Route::post('/getSpec',[StudentController::class,'getSpec'])->name('students.getSpec');
    Route::get('/getFac',[StudentController::class,'getFac'])->name('students.getFac');
    Route::post('/students/create',[StudentController::class,'create_student'])->name('students.create');
    Route::get('/students/edit/{id}',[StudentController::class,'edit_student'])->name('students.edit');
    Route::put('/students/update/{id}',[StudentController::class,'update_student'])->name('students.update');
    Route::get('/students/delete_student/{id}',[StudentController::class,'delete_student'])->name('students.delete_student');
    Route::post('/students/remove_student/{id}',[StudentController::class,'remove_student'])->name('students.remove');
    //END STUDENT

});

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
