<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Teacher;
use App\Models\Admin;
use Session;
use Hash;
use DB;
use App\Http\Requests\PasswordRequest;

class PasswordController extends Controller
{
   public function view_update_password(){


   	return view('password.view_update_password');
   

   }
   public function view_change_password(){


   	return view('password.view_change_password');
   

   }
   public function process_change_password(PasswordRequest $rq){

   	$password = $rq->password;
   	$new_password = $rq->new_password;
   	$admin = Admin::where('email', Session::get('email'))->first();
   	$teacher = Teacher::where('email', Session::get('email'))->first();

   	if(isset($admin) && Hash::check($password, Session::get('password'))){
   		DB::table('admin')
   		->Where('id', Session::get('id'))
   		->update([
   			'password' => Hash::make($new_password)
   		]);
   	}else if(isset($teacher) && Hash::check($password, Session::get('password'))){
   		DB::table('teacher')
   		->Where('id', Session::get('id'))
   		->update([
   			'password' => Hash::make($new_password)
   		]);
   	}else{
   		echo "loi";
   	}

   	return view('password.view_update_password');
   

   }
}
