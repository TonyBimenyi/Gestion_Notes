<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Course extends Model
{
    use HasFactory;
    protected $fillable = ['id','code','name','semester','class','vh','id_spec'];
    
    protected $table='courses';

    public function Specialisation(){
        return $this->HasMany();
    }
}
