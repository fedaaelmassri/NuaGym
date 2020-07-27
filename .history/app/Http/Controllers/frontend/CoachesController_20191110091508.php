<?php

namespace App\Http\Controllers\frontend;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;
use App\members;
use App\programs;
use App\Coaches;
use App\member_programs;
use Auth;
use Session;

class CoachesController extends Controller
{
    //
    public function index(){
        return view('frontend.coaches')->with([
            'coaches' => Coaches::get()
        ]);
    }
    public function coatchesForProgram($p_id){
        Session::set('ProgramID', $p_id);
        return view('frontend.home-7')->with([
            'coaches' => programs::where([['id','=', $p_id]])->with('coaches')->get(),
        ]);

    }
}
