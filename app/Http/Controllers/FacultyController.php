<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Faculty;

class FacultyController extends Controller
{
    public function index()
    {
        
        $faculty=Faculty::all();
        return view('faculty.faculty',['faculty'=>$faculty]);
    }

    public function Form_faculty()
    {
        return view('faculty.createfaculty');
    }
}
