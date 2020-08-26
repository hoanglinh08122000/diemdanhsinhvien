<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;

use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Routing\Controller as BaseController;
use App\Models\Students;


class Controller{
	
	public function master()
	{
		return view('layouts.master');
	}
	public function index()
	{
		$dihoc=Students::where('status',0)
				->join('attendancedetails','students.id','attendancedetails.id_students')
				->get()
				->count();
		
		return view('index',[
			'dihoc'=> $dihoc,
		]);

	}


}
