<?php

namespace App\Http\Controllers\frontend;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;
use App\members;
use App\programs;
use App\member_programs;
use Auth;

class ProgramsController extends Controller
{
    //
    public function index(){
        return view('frontend.home-2')->with([
            'programs' => programs::get()
        ]);


    }

    public function payPrograms($pid,$cid){


        if(!auth()->guard('members')->check()){
            return redirect(route('member.login'));

         }
         else{
            // $mp = member_programs::find($id);
             $program = member_programs::updateOrCreate(
                ['program_id' => $pid],
                ['coache_id'=>$cid],
                ['member_id' =>  Auth::guard('members')->user()->id ]
            );


            return redirect(route('memberdashboard'));


        }

    }
}
