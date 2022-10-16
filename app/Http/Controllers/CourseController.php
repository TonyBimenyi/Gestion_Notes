<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class CourseController extends Controller
{
    public function index()
    {
        return view('course.course');
    }
    public function add_course()
    {
        return view('course.create_course');
    }
}
