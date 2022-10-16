<?php

namespace App\Http\Controllers;

use App\Models\Student;
use Illuminate\Http\Request;

class StudentController extends Controller
{
    public function index()
    {
        $students = Student::all();
        return view('students.students',['students'=>$students]);
    }
    public function form_student()
    {
        # code...
        return view('students.add_student');
    }
}
