<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Teacher extends Model
{
    use HasFactory;
    protected $fillable = ['matricule','fname','lname','sexe','email','ic_course'];

    public function courses()
    {
        return $this->belongsTo(related:Course::class,foreignKey:'ic_course');
    }
}
