<?php

namespace App\Models;

use App\Models\Student;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;


class Specialisation extends Model
{
    use HasFactory;
    protected $fillable = ['name','id_fac'];
    
    public function students(){
        return $this->hasOne(Student::class);
    }
}
