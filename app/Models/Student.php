<?php

namespace App\Models;

use App\Models\Faculty;
use App\Models\Specialisation;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Student extends Model
{
    use HasFactory;
    protected $fillable = ['matricule','fname','lname','sexe','email','class','spec_id'];

    public function specialisation(){
      return   $this->belongsTo(related:Specialisation::class,foreignKey:'spec_id');
    }
    public function faculty(){
      return  $this->belongsTo(Faculty::class,'spec_id');
   }
  
}
