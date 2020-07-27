<?php

namespace App\Http\Controllers\frontend;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;
use App\members;
use App\programs;
use App\Events;
use App\Coaches;
use App\member_programs;
use App\Settings;
use Auth;
use Session;

class CoachesController extends Controller
{
    //
    public function index(){
        
        return view('frontend.coaches')->with([
            'coaches' => Coaches::get(),
            'firstcoache'=>Coaches::first(),
            'videoUrl'=>$this->getvideo_url(Settings::where('constant','video_url')->first('value')->value)

        ]);
    }
    public function coatchesForProgram($p_id){
        Session::put('ProgramID', $p_id);
        return view('frontend.home-7')->with([
            'coaches' => programs::where([['id','=', $p_id]])->with('coaches')->get(),
        ]);

    }
    public function coachesForclass($e_id){
        Session::put('EventID', $e_id);
        // $coaches= Events::where([['id','=', $e_id]])->with('coaches')->get();
        // dd($coaches);
        // exit;

        return view('frontend.coachforclass')->with([
            'coaches' => Events::where([['id','=', $e_id]])->with('coaches')->get(),
        ]);

    }

    public function viewById(){
        $id=request()->query('id');
        $coaches= Coaches::where('id', $id)->first() ;
     
        return response()->json(['coaches'=>$coaches]);
    
         

    }
    function getvideo_url($url)
    { 
        if(strlen($url) > 11)
        {
            if (preg_match('%(?:youtube(?:-nocookie)?\.com/(?:[^/]+/.+/|(?:v|e(?:mbed)?)/|.*[?&]v=)|youtu\.be/)([^"&?/ ]{11})%i', $url, $match))
            {
                return $match[1];
            }
            else
                return false;
        }

        return $url;
    
}
    
}
