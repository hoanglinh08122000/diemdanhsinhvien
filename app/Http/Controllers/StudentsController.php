<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use App\Models\Students;
use App\Imports\StudentImport;
use Excel;
use DataTables;
use App\Http\Requests\StudentRequest;

class StudentsController extends Controller
{
	public function show_students(Request $rq){
        $search = $rq->search;
    	$array_list = Students::where('last_name','like',"%$search%")->paginate(15);
        return view('Students.show_students',[
         'array_list'=> $array_list,
         'search'=> $search
        ]);

    }
    public function view_all(Request $rq) {


        if ($rq->ajax()) {
            $students = Students::get();
            return DataTables::of($students)
                ->addIndexColumn()
                ->addColumn('action', function ($student) {
                    return
                        '<button type="button" class="edit btn btn-primary btn-sm">
                        <a href="" style="color:#fff; text-decoration: none;">
                        <i class="fas fa-cogs text-dark-pastel-blue"></i>Edit</a></button>
                        <button type="button" name="delete" id="" class="delete btn btn-danger btn-sm"><i class="fas fa-times text-orange-white"></i>Delete</button>
                        <button type="button" class="btn btn-xs btn-info btn-sm"><i class="fas fa-redo-alt text-orange-white"></i>Hoàn tác</button>
                        ';
                        // '<button type="button" class="edit btn btn-primary btn-sm">
                        // <a href="' . route('students.view_update', $student->id) . '" style="color:#fff; text-decoration: none;">
                        // <i class="fas fa-cogs text-dark-pastel-blue"></i>Edit</a></button>
                        // <button type="button" name="delete" id="' . $student->id . '" class="delete btn btn-danger btn-sm"><i class="fas fa-times text-orange-white"></i>Delete</button>
                        // <button type="button" class="btn btn-xs btn-info btn-sm"><i class="fas fa-redo-alt text-orange-white"></i>Hoàn tác</button>
                        // ';
                })
                ->rawColumns(['action'])
                ->make(true);
       }
       return view('datatable.datatable');




    }
    public function view_insert_students(){
    	return view('students.view_insert_students');
    }
    public function process_insert_students(StudentRequest $rq){
    	
        
        Students::create($rq->all()); 

    	return redirect()->route('students.show_students');

    }
    public function view_insert_students_excel(){
        return view('students.view_insert_students_excel');
    }
    public function process_insert_students_excel(Request $rq){
          Excel::import(new StudentImport, $rq->file('excel_student')->path());
          return redirect()->route('students.show_students');

    }
    public function delete($id)
    {


        Students::find($id)->delete();
    	return redirect()->route('students.show_students');

    }
    public function view_update_students($id){
    	
        $students= Students::find($id);
    	return view('students.view_update_students',[
    		'students'=> $students,
    	]);

    }
    public function process_update_students(StudentRequest $rq,$id){
        $name    = $rq->name;
        $date    = $rq->date;
        $address = $rq->address;
        $gender  = $rq->gender;
        // $email   = $rq->email;
        $phone   = $rq->phone;
        
        $password = $rq->password;
    	DB::table('students')->where('id',$id)->update([
    		'name'=> $name,
    		'date'=> $date,
    		'address'=> $address,
    		'gender'=> $gender,
            // 'email' => $email,
            'phone' => $phone,
           
            'password' => $password,
    	]);
        // SinhVienLop::find($id)->update($rq->all());
       
    	return redirect()->route('students.show_students');
    }
}
