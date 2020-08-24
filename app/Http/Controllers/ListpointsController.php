<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Teacher;
use App\Models\Students;
use App\Models\Discipline;
use App\Models\Course;
use App\Models\Subject;
use App\Models\Classs;
use App\Models\Listpoints;
use Session;
use DB;

class ListpointsController extends Controller
{
    public function view_listpoints(){
		$courses=Course::get();
		$disciplines=Discipline::get();
		$classs=Classs::get();
		$subjects=Subject::get();
		$teachers=Teacher::get();

		return view('listpoints.view_listpoints',[
			'courses'=> $courses,
			'disciplines'=> $disciplines,
			'classs'=> $classs,
			'subjects' => $subjects,
			'teachers' => $teachers,
		]);
	}

	// public function process_listpoint(Request $rq){
	// 	$data= json_decode($rq->data,true);
	// 	dd($data);
		
	// 	// $value=$rq->get('value');
	// 	// dd($value);
	// 	$array_list_listpont=$rq->all();

	// 	$id_class=$rq->get('id_class');
	// 	$array_list_students=Students::where('id_class',$id_class)
	// 							->join('class','class.id','students.id_class')
	// 							->select('students.id')
	// 							->get();
		

	// 	// foreach ($array_list_students as $array_list_listpont) {
	// 	// 	$array[$listpoint->$array_list_listpont]=$listpoint -> 

	// 	// 	$listpoint=Listpoints::
	// 	// }


	// }
	public function  process_post(Request $rq){
		// return $rq->all();
		$id_teacher=Session::get('id');
		$id_subject=$rq->get('id_subject');
		$id_class=$rq->get('id_class');
	
		$listpoint=Listpoints::create([
			'id_teacher'=>$id_teacher,
			'id_subject'=>$id_subject,
			'id_class'=>$id_class,
		]);
		
		foreach ($rq->except('_token','id_subject','id_class','id') as $id_student => $status) {			DB::table('attendancedetails')->insert([
				'id_students'=>$id_student,
				'id_listpoints'=>$listpoint->id,
				'status'=>$status
			]);
		}
		return redirect()->route('listpoints.view_listpoints');
	// 	return response()->json(['success' => ' thành công']);
	}
}
