<?php

namespace App\Http\Controllers;

use DB;
use App\Models\Note;
use App\Models\Course;
use App\Models\Faculty;
use App\Models\Student;
use Illuminate\Http\Request;

class NoteController extends Controller
{
    //
    public function index()
    {
        # code...
      
            $notes = Note::all();
            return view('notes.notes',compact('notes'));
       
       
    }
    public function advanced_search()
    {
        # code...
        $notes = Note::all();
        $faculties = Faculty::get();

        return view('notes.advanced_search',compact('notes','faculties'));
    }
    public function advanced_search_result(Request $request)
    {
        # code...
        $id_spec = $request->input('spec');
        $class = $request->input('class');
        $notes = Note ::select(DB::raw('notes.*,students.*,courses.*'))
        ->join('students','notes.id_student','=','students.id')
        ->join('courses','notes.id_course','=','courses.id')
        ->where('students.spec_id','=',$id_spec)
        ->orWhere('students.class','=',$class)
        ->get();
        $faculties = Faculty::get();
        $courses = Course::get();

        return view('notes.advanced_search_result',compact('notes','faculties'));

    }
    public function average()
    {
        # code...
        $notes = Note::all();
        $faculties = Faculty::get();

        return view('notes.average',compact('notes','faculties'));
    }
    public function average_result(Request $request)
    {
        # code...
        $id_spec = $request->input('spec');
        $class = $request->input('class');
        $notes = Note ::select(DB::raw('notes.*,students.*,courses.*'))
        ->join('students','notes.id_student','=','students.id')
        ->join('courses','notes.id_course','=','courses.id')
        ->where('students.spec_id','=',$id_spec)
        ->orWhere('students.class','=',$class)
        ->orWhere('notes.notes','>','10')
        ->get();
        $faculties = Faculty::get();
        $courses = Course::get();

        return view('notes.average_result',compact('notes','faculties'));
    }
    public function add_notes()
    {
        $faculties = Faculty::get();

        return view('notes.add_notes',compact('faculties'));
    }
    public function searchNote(Request $request)
    {

        # code...
        $id_spec = $request->input('spec');
        $class = $request->input('class');
        $students = Student::query()
        ->where('spec_id','LIKE',"%{$id_spec}%")
        ->orWhere('class','LIKE',"%{$class}%")
        ->get();
        $faculties = Faculty::get();
        $courses = Course::get();
    
        return view('notes.search_notes',compact('students','faculties','courses'));
    }
    public function searchNoteMatricule(Request $request)
    {

        # code...
       
        $matricule = $request->input('matricule');
       
        $notes = Note ::select(DB::raw('notes.*,students.*,courses.*'))
        ->join('students','notes.id_student','=','students.id')
        ->join('courses','notes.id_course','=','courses.id')
        ->where('students.matricule','=',$matricule)
        ->get();
        
    
        return view('notes.search_notes_matricule',compact('notes'));
    }
    public function placeNote(Request $request)
    {
        # code...
       $saveNote = new Note();
        $saveNote->id_course = $request->input('course');
        $saveNote->id_student = $request->input('id_student');
        $saveNote->notes = $request->input('note');
        $saveNote->save();
       

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
    
}
