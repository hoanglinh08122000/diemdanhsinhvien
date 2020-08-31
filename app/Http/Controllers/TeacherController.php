<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use App\Models\Teacher;
use App\Imports\TeacherImport;
use App\Models\Subject;
use App\Models\Subject_teacher;
use Excel;
use App\Http\Requests\TeacherRequest;

class TeacherController extends Controller
{
    public function index_teacher(Request $rq){
        $search = $rq->search;
        $array_list = Teacher::where('last_name','like',"%$search%")->paginate(10);
        return view('teacher.index_teacher',[
         'array_list'=> $array_list,
         'search'=> $search
        ]);

    }
    public function show_teacher(Request $rq){
        $search = $rq->search;
    	$array_list = Teacher::where('last_name','like',"%$search%")->paginate(10);
        return view('teacher.show_teacher',[
         'array_list'=> $array_list,
         'search'=> $search
        ]);

    }
    public function subject_teacher(){
        $subjects= Subject::get();
        $subject_teacher= Subject_teacher::get();


        return view('teacher.teacher_subject',[
            'subject_teacher'=> $subject_teacher,
            'subjects'=> $subjects,
        ]);
    }
    public function view_insert_teacher(){
    	return view('teacher.insert');
    }
    public function process_insert_teacher(TeacherRequest $rq){
    	
        
        Teacher::create($rq->all()); 

    	return redirect()->route('teacher.show_teacher');

    }
    public function view_insert_teacher_excel(){
        return view('teacher.view_insert_teacher_excel');
    }
    public function process_insert_teacher_excel(Request $rq){
          Excel::import(new TeacherImport, $rq->file('excel_teacher')->path());
          return redirect()->route('teacher.show_teacher');

    }
    public function delete($id)
    {


        Teacher::find($id)->delete();
    	return redirect()->route('teacher.show_teacher');

    }
    public function view_update_teacher($id){
    	
        $teacher= Teacher::find($id);
    	return view('teacher.edit',[
    		'teacher'=> $teacher,
    	]);

    }
    public function process_update_teacher(TeacherRequest $rq,$id){
        $first_name    = $rq->first_name;
        $last_name    = $rq->last_name;
        $date    = $rq->date;
        $address = $rq->address;
        $gender  = $rq->gender;
        // $email   = $rq->email;
        $phone   = $rq->phone;
        
        $password = $rq->password;
    	DB::table('teacher')->where('id',$id)->update([
    		'first_name'=> $first_name,
            'last_name'=> $last_name,
    		'date'=> $date,
    		'address'=> $address,
    		'gender'=> $gender,
            // 'email' => $email,
            'phone' => $phone,
           
            'password' => $password,
    	]);
        // SinhVienLop::find($id)->update($rq->all());
       
    	return redirect()->route('teacher.show_teacher');
    }


    public function assignment_subject_teacher(){
        $subjects= Subject::get();

        $teachers= Teacher::all();
       
        return view('teacher.assignment_subject_teacher',[
         'subjects'=> $subjects,
         'teachers'=> $teachers
        ]);
    }
    public function process_assignment_subject_teacher(Request $rq){

       
        $input = $rq -> all();
        $id_teacher = $rq -> get('id_teacher');
       
        Subject_teacher::where('id_teacher',$id_teacher)->delete();
        foreach ($rq->check as $id_subject) {
        

             Subject_teacher::insert([
                'id_teacher' => $rq->id_teacher,
                'id_subject' => $id_subject,
             ]);
        }
        return redirect()->route('teacher.subject_teacher');
    }   
}
        
       
