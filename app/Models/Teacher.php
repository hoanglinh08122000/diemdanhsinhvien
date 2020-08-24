<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Hash;

class Teacher extends Model
{
    protected $table = 'teacher'; // kết nối bảng lớp
    protected $primaryKey = 'id'; // đổi khóa chính thành id

    protected $fillable = ['first_name','last_name','date','level','address','email','phone','gender','password']; //khai báo cột cần 
    
    public function getFullNameAttribute(){
            return "{$this->first_name} {$this->last_name}";
        }
    protected $attributes = [
        'level' => 2,
        'password' => 1,
    ];
    public $timestamps = false; 
    public function setPasswordAttribute($password){

        $this->attributes['password'] = Hash::make($password);
    }
    public function Subject()
    {
        return $this->hasMany('App\Models\Subject', 'id_teacher', 'id');
    }

}
