<?php

namespace App\Http\Controllers;

use App\Models\Course;
use App\Models\Faculty;
use App\Models\Student;
use App\Models\Teacher;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function index()
    {
        $count_student = Student::count('id');
        $count_teacher = Teacher::count('id');
        $count_course = Course::count('id');
        $faculty=Faculty::get();
        
        return view('admin.dashboard',compact('count_student','count_teacher','count_course','faculty'));
    }
}
