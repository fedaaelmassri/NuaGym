<?php

namespace App\Http\Controllers\frontend;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;
use Session;
use Cookie;
use App\Events;
use Carbon\Carbon;

class EventsController extends Controller
{
    //
    public function index()
    {

        return view('frontend.events')->with([
            'Events' => Events::get(),

        ]);
    }
    public function subscripeEvent($eventid){

        if(!auth()->guard('members')->check()){
            Session::put('EventId', $eid);
             return redirect(route('member.login'));

        }
        else{
            $mid= Auth::guard('members')->user()->id;
            $report = events_members::where('event_id', '=', $eventid)
            ->where('member_id', '=', $mid)
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
