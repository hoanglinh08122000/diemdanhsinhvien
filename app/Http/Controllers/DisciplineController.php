<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use App\Models\Discipline;
use App\Http\Requests\DisciplineRequest;

class DisciplineController extends Controller
{
    public function index_discipline(Request $rq){
        $search = $rq->search;
        $array_list = Discipline::where('name','like',"%$search%")->paginate(10);
        return view('discipline.index_discipline',[
         'array_list'=> $array_list,
         'search'=> $search
        ]);

    }
   public function show_discipline(Request $rq){
        $search = $rq->search;
    	$array_list = Discipline::where('name','like',"%$search%")->paginate(10);
        return view('discipline.show_discipline',[
         'array_list'=> $array_list,
         'search'=> $search
        ]);

    }
    public function view_insert_discipline(){
    	return view('discipline.insert');
    }
    public function process_insert_discipline(DisciplineRequest $rq){
    	
        
        Discipline::create($rq->all()); 

    	return redirect()->route('discipline.show_discipline');

    }
    public function delete($id)
    {


        Discipline::find($id)->delete();
    	return redirect()->route('discipline.show_discipline');

    }
    public function view_update_discipline($id){
    	
        $discipline= Discipline::find($id);
    	return view('discipline.edit',[
    		'discipline'=> $discipline,
    	]);

    }
    public function process_update_discipline(DisciplineRequest $rq,$id){
        $name    = $rq->name;
        $name_collapse = $rq->name_collapse;
        DB::table('discipline')->where('id',$id)->update([
    		'name'=> $name,
            'name_collapse'=> $name_collapse,
    	]);
        // SinhVienLop::find($id)->update($rq->all());
       
    	return redirect()->route('discipline.show_discipline');
    }
}
