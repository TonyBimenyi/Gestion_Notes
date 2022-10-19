<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Faculty;
use Illuminate\Support\Facades\DB;

class FacultyController extends Controller
{
    public function index()
    {
        
        $faculty=Faculty::all();
        return view('faculty.faculty',['faculty'=>$faculty]);
    }

    public function list_faculty()
    {
        return view('faculty.createfaculty');
    }

    public function add_faculty(Request $request)
    {
        $faculty = new Faculty();
        $faculty->name=$request->input('namefaculty');
       
        $faculty->save();

        return redirect('createfaculty')->with('alert', 'Faculty added successfully!');
    }

    public function edit_faculty($id)
    {
        $faculty=Faculty::where('id',$id)->first();
       return view('faculty.edit_faculty',['faculty'=>$faculty]);
    }

    public function update_faculty(Request $request,$id)
    {
        
        $faculty=DB::table('faculties')
        ->where('id',$id)
        ->update([
                    'name'=>$request->input('namefaculty'),
                    
                    ]
    );
    return redirect('faculty')->with('alert',"Faculty has been Updated!");

    }

    public function delete_faculty($id)
    {
        $faculty=Faculty::where('id',$id)->delete();

        return redirect('faculty')->with('alert',"Faculty has been Deleted!");
    }

}
