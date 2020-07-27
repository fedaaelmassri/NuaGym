<?php

namespace App\Http\Controllers\frontend;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;
use App\members;
use App\programs;
use App\member_programs;
use App\Coaches;
use Auth;
use Session;

class ProgramsController extends Controller
{
    //
    public function index($cid=null){
        if($cid==null){
        return view('frontend.home-2')->with([
            'programs' => programs::get()
        ]);
        }else{
            Session::put('CoachID', $cid);
            $programs= Coaches::where([['id','=', $cid]])->with('programs')->get();
            $programs=$programs->programs->toArray();

          return view('frontend.home-2')->with([
            'programs' => $programs,

        ]);
      }

    }
    public function allprograms(){
        return view('frontend.programs')->with([
            'programs' => programs::get()
        ]);


    }
    public function gitspicificraw(){
        $p_id=Session::get('ProgramID');
        $program = programs::findOrfail($p_id);
        $c_id=request()->route('c_id');
        $Coache = Coaches::findOrfail($c_id);
        return view('frontend.home-8')->with([
            'program' => $program,
            'coache'=>$Coache
        ]);
        // return response()->json(['program' =>$program,
        // 'coache'=>$Coache
        // ] );


    }

   public function memberdash(){
    $pid=Session::get('ProgramID');
    $cid=Session::get('CoachID');
    return view('frontend.member.index')->with([
        'pid' => $pid,
        'cid'=>$cid
    ]);

   }
   public function programsformember(){
    $pid=Session::get('ProgramID');
    $cid=Session::get('CoachID');
    $mid= Auth::guard('members')->user()->id;
    $programs = member_programs::get();
      return view('frontend.member.programs')->with([
        'programs' => $programs,
     ]);

   }
    public function payPrograms($pid,$cid){

            if(!auth()->guard('members')->check()){
                Session::put('ProgramID', $pid);
                Session::put('CoachID', $cid);
                return redirect(route('member.login'));

            }
            else{
                $mid= Auth::guard('members')->user()->id;
                $report = member_programs::where('program_id', '=', $pid)
                ->where('member_id', '=', $mid)
                ->where('coache_id', '=', $cid)
                ->first();

                // $mp = member_programs::find($id);
                if(!$report){

                $program = member_programs::updateOrCreate(
                    ['program_id' => $pid,
                    'coache_id'=>$cid],
                    ['member_id' =>$mid],
                );


                return redirect(route('memberdashboard'))->with([ 'message' => sprintf('Great! You have  successfully participated in the program "%s"', $program->program_id),
                'alert-type' => 'success'
                ]);;
                }
                else{
                    return redirect( route('memberdashboard') )->with([ 'message' => sprintf('Oops! You have   Aleardy participated in the program ' ),
                    'alert-type' => 'success'
                    ]);
                }

            }

    }
}
