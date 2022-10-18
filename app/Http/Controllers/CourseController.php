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

        return view('course.course',['course'=>$course]);
    }
    public function list_course()
    {
        return view('course.create_course');
    }
    public function add_course(Request $request)
    {
        $specs = new Specialisation();
        $course = new Course();
        $course->code=$request->input('code');
        $course->name=$request->input('namecourse');
        $course->semester=$request->input('semester');
        $course->class=$request->input('class');
        $course->vh=$request->input('volume');
        $course->id_spec=$request->input('specialisation');
        $course->save();

        return redirect('course.create_course')->with('alert', 'Course added successfully!');
    }
}
