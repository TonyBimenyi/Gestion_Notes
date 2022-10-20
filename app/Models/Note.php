<?php

namespace App\Models;

use App\Models\Course;
use App\Models\Student;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Note extends Model
{
    use HasFactory;
    protected $fillable = ['id_course','id_student','notes'];
    
    public function student(){
        return  $this->belongsTo(Student::class,'id_student');
     }

     public function course(){
        return  $this->belongsTo(Course::class,'id_course');
     }
     
     


}

