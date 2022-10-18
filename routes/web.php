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
    Route::get('/create_course', [CourseController::class, 'list_course'])->name('createcourse');
    Route::post('/add_course', [CourseController::class, 'add_course'])->name('addcourse');
    Route::get('/edit_course/{id}', [CourseController::class, 'edit_Course'])->name('editcourse');

    //END OF COURSE

    //START STUDENT
    Route::get('/students', [StudentController::class, 'index'])->name('students');
    Route::get('/students/add', [StudentController::class, 'form_student'])->name('students.form');
    //END STUDENT

});

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
