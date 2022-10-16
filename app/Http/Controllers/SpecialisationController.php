<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class SpecialisationController extends Controller
{
    public function index()
    {
        # code...
        $specs = Specialisation::all();
        return view('students.students',['students'=>$specs]);
    }
}
