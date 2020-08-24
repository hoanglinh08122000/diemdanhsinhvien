<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Discipline extends Model
{
   protected $table = 'discipline';
   protected $primaryKey = 'id'; 
   protected $fillable = ['name','name_collapse'];  
   public $timestamps = false; 
   public function Subject()
    {
        return $this->hasMany('App\Models\Subject', 'id_discipline', 'id');
    }
}
