<?php

namespace App\Http\Controllers;

use App\Models\Teacher;
use Illuminate\Http\Request;

class TeacherController extends Controller
{
    public function index()
    {
        $teacher=Teacher::all();

        return view('teacher.teacher',['teacher'=>$teacher]);
    }


    public function list_teacher()
    {
        $course=Course::all();

        return view('teacher.create_teacher',['course'=>$course]);
    }
}
