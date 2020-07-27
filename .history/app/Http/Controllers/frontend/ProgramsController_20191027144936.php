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

    public function payPrograms($id){


        if(!auth()->guard('members')->check()){
            return redirect(route('member.login'));

         }
         else{
            $mp = member_programs::find($id);
             $program = member_programs::updateOrCreate(
                ['program_id' => $id],
                ['member_id' => Session::get('member_id')
                ]
            );


            return redirect(route('memberdashboard'));


        }

    }
}
