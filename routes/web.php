<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CourseController;
use App\Http\Controllers\StudentController;
use App\Http\Controllers\TeacherController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\FacultyController;
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
    Route::put('/update_course/{id}', [CourseController::class, 'update_course'])->name('updatecourse');
    Route::get('/delete_course/{id}', [CourseController::class, 'delete_course'])->name('deletecourse');

    //END OF COURSE

    //START STUDENT
    Route::get('/students', [StudentController::class, 'index'])->name('students');
    Route::get('/students/add', [StudentController::class, 'form_student'])->name('students.form');
    //END STUDENT

<<<<<<< HEAD
    //START OF FACULTY
    Route::get('/faculty', [FacultyController::class, 'index'])->name('faculty');
    Route::get('/createfaculty', [FacultyController::class, 'form_faculty'])->name('createfaculty');
    //END OF FACULTY
=======
    //START OF TEACHER
    Route::get('/teacher', [TeacherController::class, 'index'])->name('teacher');
    Route::get('/createteacher', [TeacherController::class, 'list_teacher'])->name('createteacher');
    Route::post('/add_teacher', [TeacherController::class, 'insertTeacher'])->name('addteacher');
    Route::get('/edit_teacher/{id}', [TeacherController::class, 'edit_teacher'])->name('editteacher');
    Route::put('/update_teacher/{id}', [TeacherController::class, 'update_teacher'])->name('updateteacher');
    Route::get('/delete_teacher/{id}', [TeacherController::class, 'delete'])->name('deleteteacher');

    //END OF TEACHER
>>>>>>> 257da6b119f6636708c1653743485cb109b96b68

});

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
