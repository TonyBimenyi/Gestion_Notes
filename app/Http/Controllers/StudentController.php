<?php

namespace App\Http\Controllers;

use App\Models\Student;
use Illuminate\Http\Request;
use Carbon\Carbon;

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
        $date = Carbon::now()->format('Y');
        $count = Student::count();

        return view('students.add_student',['date'=>$date],['count'=>$count]);
    }
}
