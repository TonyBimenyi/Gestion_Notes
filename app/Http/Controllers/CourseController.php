<?php

namespace App\Http\Controllers;

use Carbon\Carbon;
use App\Models\Course;
use Illuminate\Http\Request;
use App\Models\Specialisation;
use Illuminate\Support\Facades\DB;

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
        $date = Carbon::now()->format('Y');
        $count = Course::count()+1;
        $specs = Specialisation::get();

        // return view('course.create_course',['create_course'=>$specs],['date'=>$date],['count'=>$count]);
        return view('course.create_course',compact('specs','date','count'));
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
        //$courses=Course::findOrFail($id);
         $course=Course::where('id',$id)->first();
         $specs = Specialisation::get();


        return view('course.edit_course',['course'=>$course],['specs'=>$specs]);
    }
    
    public function update_course(Request $request,$id)
    {
        $course=DB::table('courses')
        ->where('id',$id)
        ->update(['code'=>$request->input('code'),
                    'name'=>$request->input('namecourse'),
                    'semester'=>$request->input('semester'),
                    'class'=>$request->input('class'),
                    'vh'=>$request->input('volume'),
                    'id_spec'=>$request->input('specialisation')
                    ]
    );
    return redirect('course')->with('alert',"Course has been Updated!");
    }

    public function delete_course($id)
    {
        $course=Course::where('id',$id)->delete();

        return redirect('course')->with('alert',"Course has been Deleted!");
    }
}
