<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
// use CoenJacobs\EloquentCompositePrimaryKeys\HasCompositePrimaryKey;



class Assignment extends Model
{
    // use HasCompositePrimaryKey;

    protected $table = 'assignmen';
	// protected $primaryKey = ['id_teacher','id_subject'];
	protected $fillable = ['id_teacher','id_subject','id_class'];

	public $timestamps = false;
	public function Teacher()
    {
    	return $this->belongsTo('App\Models\Teacher', 'id_teacher');
    }
    public function Subject()
    {
    	return $this->belongsTo('App\Models\Subject', 'id_subject');
    }
    public function Classs()
    {
    	return $this->belongsTo('App\Models\Classs', 'id_class');
    }
     public function Course()
    {
    	return $this->belongsTo('App\Models\Course', 'id');
    }
     public function Discipline()
    {
    	return $this->belongsTo('App\Models\Discipline', 'id');
    }
    // protected function setKeysForSaveQuery(Builder $query)
    // {
    //     $keys = $this->getKeyName();
    //     if(!is_array($keys)){
    //         return parent::setKeysForSaveQuery($query);
    //     }

    //     foreach($keys as $keyName){
    //         $query->where($keyName, '=', $this->getKeyForSaveQuery($keyName));
    //     }

    //     return $query;
    // }
    // protected function getKeyForSaveQuery($keyName = null)
    // {
    //     if(is_null($keyName)){
    //         $keyName = $this->getKeyName();
    //     }

    //     if (isset($this->original[$keyName])) {
    //         return $this->original[$keyName];
    //     }

    //     return $this->getAttribute($keyName);
    // }
     
}
