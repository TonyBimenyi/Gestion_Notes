<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\NoteController;
use App\Http\Controllers\CourseController;
use App\Http\Controllers\FacultyController;
use App\Http\Controllers\StudentController;
use App\Http\Controllers\TeacherController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\SpecialisationController;

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

    Route::post('/getSpec',[StudentController::class,'getSpec'])->name('students.getSpec');
    Route::get('/getFac',[StudentController::class,'getFac'])->name('students.getFac');
    Route::post('/students/create',[StudentController::class,'create_student'])->name('students.create');
    Route::get('/students/edit/{id}',[StudentController::class,'edit_student'])->name('students.edit');
    Route::put('/students/update/{id}',[StudentController::class,'update_student'])->name('students.update');
    Route::get('/students/delete_student/{id}',[StudentController::class,'delete_student'])->name('students.delete_student');
    Route::post('/students/remove_student/{id}',[StudentController::class,'remove_student'])->name('students.remove');


    //END STUDENT


    //START OF FACULTY
    Route::get('/faculty', [FacultyController::class, 'index'])->name('faculty');
    Route::get('/createfaculty', [FacultyController::class, 'list_faculty'])->name('createfaculty');
    Route::post('/add_faculty', [FacultyController::class, 'add_faculty'])->name('add_faculty');
    Route::get('/edit_faculty/{id}', [FacultyController::class, 'edit_faculty'])->name('edit_faculty');
    Route::put('/update_faculty/{id}', [FacultyController::class, 'update_faculty'])->name('update_faculty');
    Route::get('/delete_faculty/{id}', [FacultyController::class, 'delete_faculty'])->name('delete_faculty');
    //END OF FACULTY

    //START OF TEACHER
    Route::get('/teacher', [TeacherController::class, 'index'])->name('teacher');
    Route::get('/createteacher', [TeacherController::class, 'list_teacher'])->name('createteacher');
    Route::post('/add_teacher', [TeacherController::class, 'insertTeacher'])->name('addteacher');
    Route::get('/edit_teacher/{id}', [TeacherController::class, 'edit_teacher'])->name('editteacher');
    Route::put('/update_teacher/{id}', [TeacherController::class, 'update_teacher'])->name('updateteacher');
    Route::get('/delete_teacher/{id}', [TeacherController::class, 'delete'])->name('deleteteacher');

    //END OF TEACHER

    //START NOTES
    Route::get('/notes',[NoteController::class,'index'])->name('notes');
    Route::get('/add_notes',[NoteController::class,'add_notes'])->name('notes.add_notes');
    Route::post('/getSpec',[NoteController::class,'getSpec'])->name('students.getSpec');
    Route::get('/searchNote',[NoteController::class,'searchNote'])->name('notes.search');
    Route::get('/placeNote',[NoteController::class,'placeNote'])->name('notes.place');
    Route::get('/viewNote',[NoteController::class,'viewNote'])->name('notes.viewNote');
    Route::get('/advanced_search',[NoteController::class,'advanced_search'])->name('notes.advanced_search');
    Route::get('/average',[NoteController::class,'average'])->name('notes.average');
    Route::get('/average_result',[NoteController::class,'average_result'])->name('notes.average_result');
    Route::get('/advanced_search_result',[NoteController::class,'advanced_search_result'])->name('notes.advanced_search_result');
    Route::get('/search_note_matricule',[NoteController::class,'searchNoteMatricule'])->name('notes.searchNoteMatricule');

    //END NOTES




    //START OF SPECIALIZATION
    Route::get('/specialization', [SpecialisationController::class, 'index'])->name('specialisation');
    Route::get('/createspecialization', [SpecialisationController::class, 'list_specs'])->name('createspecialization');
    Route::post('/add_specialization', [SpecialisationController::class, 'add_specialization'])->name('add_specialization');
    Route::get('/edit_specialization/{id}', [SpecialisationController::class, 'edit_specialization'])->name('edit_specialization');
    Route::put('/update_specialization/{id}', [SpecialisationController::class, 'update_specialization'])->name('update_specialization');
    Route::get('/delete_specialization/{id}', [SpecialisationController::class, 'delete_specialization'])->name('delete_specialization');
    //END OF SPECIALIZATION
});

Route::get('/home', [App\Http\Controllers\HomeController::class,'index'])->name('home');
