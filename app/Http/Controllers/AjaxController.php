<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Discipline;
use App\Models\Subject;
use App\Models\Course;
use App\Models\Classs;
use App\Models\Subject_teacher;
use App\Models\Students;
use App\Models\Listpoints;
use DB;

class AjaxController extends Controller
{
    public function assignment_teacher(Request $rq){
    	$id_discipline = $rq->get('id_discipline');
        $id_course = $rq->get('id_course');
        $array_class = Classs::where('id_discipline',$id_discipline)
                            ->where('id_course',$id_course) 
                            ->join('discipline','class.id_discipline' , 'discipline.id')
                            ->join('course','class.id_course' , 'course.id')
                            ->select()
                            ->getFullName()
                            ->get();
                
        return $array_class;
    	
       
    }
    public function assignment_class_subject(Request $rq){
        $id_discipline = $rq->get('id_discipline');
        $id_course = $rq->get('id_course');
        $array_class = Classs::where('id_discipline',$id_discipline)
                            ->where('id_course',$id_course) 
                            ->leftJoin('discipline','class.id_discipline' , 'discipline.id')
                            ->leftJoin('course','class.id_course' , 'course.id')
                            ->select()
                            ->getFullName()
                            ->get();
                
        return $array_class;
        
       
    }
    public function listpoint(Request $rq){
        $id_discipline = $rq->get('id_discipline');
        $id_course = $rq->get('id_course');
        $array_class = Classs::where('id_discipline',$id_discipline)
                            ->where('id_course',$id_course) 
                            ->join('discipline','class.id_discipline' , 'discipline.id')
                            ->join('course','class.id_course' , 'course.id')
                            ->select('class.id')
                            ->getFullName()
                            ->get();
                
        return $array_class;
        // đây là cái truyền ra sinh viên à
        
       
    }
    public function assignment_discipline_subject(Request $rq){
        $id = $rq->get('id');
       
        $array_subject= Subject::where('id_discipline',$id)->get();
         
        return $array_subject;
    }
    public function subject_teacher(Request $rq){
        $id = $rq->get('id');
        $array_subject_teacher= Subject_teacher::join('subject','subject_teacher.id_subject','subject.id')
                                            ->where('id_teacher',$id)
                                           
                                            ->get(['name','id']);                           
        return $array_subject_teacher;
    }
    public function assignment_class(Request $rq){
    	$id = $rq->get('id');
    	$array_class= Classs::where('id_course',$id)->get();
       
    	return $array_class;
       

    }
     public function assignment_class_td(Request $rq){
        $id = $rq->get('id');

        $array_class= Classs::where('id_course',$id)->get();
       
        return $array_class;
       

    }

    public function listpoint_subject(Request $rq){
        $id = $rq->get('id');
        $array_subject= Subject::where('id_discipline',$id)->get();

        return $array_subject;
    }
    public function listpoint_class(Request $rq){
        $id = $rq->get('id');
        $array_class= Classs::where('id_course',$id)->get();
       
        return $array_class;
       

    }

    public function listpoint_students(Request $rq){
        $id_class= $rq->get('id_class');
        $id_subject= $rq->get('id_subject');
        $listpoint=Listpoints::where(['id_subject'=>$id_subject ,'id_class'=>$id_class])->get();
        if(count($listpoint)>0)
        {
            $students=Listpoints::selectRaw("students.id,concat(students.first_name,' ',students.last_name) as name,students.date as birthday,COUNT(status) as dem, if(status=1,'nghi',if(status=2,'muon','di_hoc')) as status")
            ->join('attendancedetails','listpoints.id','=','attendancedetails.id_listpoints')
            ->join('students','students.id','=','attendancedetails.id_students')
            ->groupBy(['status','id_students'])
            ->orderBy('id_students','asc')
            ->where(['listpoints.id_subject'=>$id_subject,'listpoints.id_class'=>$id_class])
            ->get();
            foreach ($students as $key => $value) {
                if($value->status=="muon")
                {
                    if($value->dem==1)
                    {
                        $value->dem=0.3;
                        $value->status="nghi";
                    }
                    elseif($value->dem==2)
                    {
                        $value->dem=0.7;
                        $value->status="nghi";
                    }
                    elseif($value->dem==3)
                    {
                        $value->dem=1;
                        $value->status="nghi";
                    }
                    else{
                        // quển k thể =0 đc nếu = không thì nó là 3 rồi
                        if($value->dem%3==1)
                        {
                            $so_du=0.3;
                        }
                        else{
                            $so_du=0.7;
                        }
                        $value->dem=intdiv($value->dem, 3) + $so_du;
                    }
                }
                elseif($value->status=="di_hoc")
                {
                    $value->status="nghi";
                    $value->dem=0;
                }
            }

            $arr=[];
            $ajax_students=[];
            foreach ($students as $key1 => $value1) {
                if(!in_array($value1->id, $arr)){
                    foreach ($students as $key2 =>$value2) {
                       if($value1->id==$value2->id && $key1!=$key2)
                       {
                            $value1->dem+=$value2->dem;
                            $arr[]=$value1->id;
                       }
                    }
                    $ajax_students[]=$value1;
                }
            }
        }
        else{
            $ajax_students=Students::selectRaw("id,concat(first_name,' ',last_name) as name,
            date as birthday, 0 as dem, 'nghi' as status")->where('id_class',$id_class)->get();
        }
        $subject=Subject::find($id_subject);
        return [$ajax_students,$subject->time];  
        
    }
}