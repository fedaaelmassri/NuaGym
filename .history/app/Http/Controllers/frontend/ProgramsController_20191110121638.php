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
    public function index(){
        return view('frontend.home-2')->with([
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
    $programs = members::where('id', '=', $mid)->with(['coaches','programs'])->get();
     return view('frontend.member.index')->with([
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
            // $mp = member_programs::find($id);
             $program = member_programs::updateOrCreate(
                ['program_id' => $pid,
                'coache_id'=>$cid],
                ['member_id' =>$mid],
             );


            return redirect(route('memberdashboard'));


        }

    }
}
