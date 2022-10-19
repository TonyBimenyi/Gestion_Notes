<?php

namespace App\Http\Controllers;

use App\Models\Course;
use App\Models\Teacher;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

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
    public function edit_teacher($id)
    {
        $teacher=Teacher::where('id',$id)->first();
         $course = Course::get();


        return view('teacher.edit_teacher',['teacher'=>$teacher],['course'=>$course]);
    }
    public function update_teacher(Request $request,$id)
    {
        $teacher=DB::table('teachers')
        ->where('id',$id)
        ->update(['matricule'=>$request->input('matricule'),
                    'fname'=>$request->input('firstname'),
                    'lname'=>$request->input('lastname'),
                    'sexe'=>$request->input('sex'),
                    'email'=>$request->input('mail'),
                    'ic_course'=>$request->input('course')
                    ]
    );
    return redirect('teacher')->with('alert',"Teacher has been Updated!");
    }
    public function delete($id)
    {
        $teacher=Teacher::where('id',$id)->delete();

        return redirect('teacher')->with('alert',"Teacher has been Deleted!");
    }
}
