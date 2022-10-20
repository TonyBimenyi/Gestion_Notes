<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Course extends Model
{
    use HasFactory;
    protected $fillable = ['id','code','name','semester','class','vh','id_spec'];
    
    protected $table='courses';

    public function specialisation(){
        return $this->belongsTo(related:Specialisation::class,foreignKey:'id_spec');
    }
    public function note(){
        return $this->hasMany(Notes::class,'id','id_course');
    }
}
