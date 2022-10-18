<?php

namespace App\Http\Controllers;

use App\Models\Course;
use Illuminate\Http\Request;
use App\Models\Specialisation;

class CourseController extends Controller
{
    public function index()
    {
        $course = Course::all();
        $specs = Specialisation::get();

        return view('course.course',['course'=>$course]);
    }
    public function list_course()
    {
        $specs = Specialisation::get();

        return view('course.create_course',['create_course'=>$specs]);
    }
    public function add_course(Request $request)
    {
        $course = new Course();
        $course->code=$request->input('code');
        $course->name=$request->input('namecourse');
        $course->semester=$request->input('semester');
        $course->class=$request->input('class');
        $course->vh=$request->input('volume');
        $course->id_spec=$request->input('specialisation');
        $course->save();

        return redirect('create_course')->with('alert', 'Course added successfully!');
    }
    public function edit_Course($id)
    {
        $course=Course::findOrFail($id);
        
        // $specs = Specialisation::get();

        return view('course.edit_course',['list_course'=>$course]);
    }
}
