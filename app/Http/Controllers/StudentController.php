<?php

namespace App\Http\Controllers;

use Carbon\Carbon;
use App\Models\Faculty;
use App\Models\Student;
use Illuminate\Http\Request;
use DB;

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
        $count = Student::count()+1;
        $faculties = Faculty::get();

        return view('students.add_student',compact('date','count','faculties'));
    }
    public function getSpec(Request $request)
    {
        # code...
        $fid = $request->post('fid');
        $spec = DB::table('specialisations')->where('id_fac',$fid)
        ->get();
        $html='<option name="spec" value="" disabled>Select Specialisation</option>';
        foreach($spec as $list){
          $html.= '<option value="'.$list->id.'">'.$list->name.'</option>';
         }
        echo $html;
    }
    public function create_student(Request $request)
    {
        $request->validate([
            'fname'=>['required','unique:students']
        ]);
        # code...
        $student = new Student();
        $student->matricule = $request->input('matricule');
        $student->fname = $request->input('fname');
        $student->lname = $request->input('lname');
        $student->sexe = $request->input('sexe');
        $student->email = $request->input('email');
        $student->class = $request->input('class');
        $student->spec_id = $request->input('spec');
        $student->save();
        return redirect('/students')->with('alert',"Student saved successfully");;

    }
    public function edit_student($id)
    {
        # code...
        $student = Student::findOrFail($id);
        $faculties = Faculty::get();
        return view('students.edit_student',compact('student','faculties'));
    }
    public function update_student(Request $request, $id)
    {
        # code...
       

        $student = DB::table('students')
        ->where('id',$id)
        ->update([
        'matricule' => $request->input('matricule'),
        'fname' => $request->input('fname'),
        'lname' => $request->input('lname'),
        'sexe' => $request->input('sexe'),
        'email' => $request->input('email'),
        'class' => $request->input('class'),
        'spec_id' => $request->input('spec'),
        ]);
      
        return redirect('/students')->with('alert',"Student updated successfully");


    }
    public function delete_student($id)
    {
        # code...
        $student = Student::findOrFail($id);
        $faculties = Faculty::get();
        return view('students.delete_student',compact('student','faculties'));
    }
    public function remove_student($id)
    {
        # code...
        $student = Student::findOrFail($id);
        $student->delete();

        return redirect('/students')->with('alert',"Student deleted successfully");

    }
}
