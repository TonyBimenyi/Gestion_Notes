<?php

namespace App\Http\Controllers;

use App\Models\Course;
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

        return view('teacher.create_teacher',['create_teacher'=>$course]);
    }

    public function insertTeacher(Request $request)
    {
        $teacher = new Teacher();
        $teacher->matricule=$request->input('matricule');
        $teacher->fname=$request->input('firstname');
        $teacher->lname=$request->input('lastname');
        $teacher->sexe=$request->input('sex');
        $teacher->email=$request->input('mail');
        $teacher->ic_course=$request->input('course');
        $teacher->save();

        return redirect('teacher')->with('alert', 'Teacher added successfully!');
    }
}
