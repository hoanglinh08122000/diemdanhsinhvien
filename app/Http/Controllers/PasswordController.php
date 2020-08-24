<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Teacher;
use App\Models\Admin;
use Session;

class PasswordController extends Controller
{
   public function view_update_password(){
   	$id=Session::get('id');
   	
   	$teacher= Teacher::find($id);

   	return view('password.view_update_password',[ 'teacher'=> $teacher] );
   

   }
}
