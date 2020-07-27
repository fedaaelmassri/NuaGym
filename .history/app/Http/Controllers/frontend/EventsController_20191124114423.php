<?php

namespace App\Http\Controllers\frontend;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;
use Session;
use Cookie;
use App\Events;
use App\events_member;
use Carbon\Carbon;
use Auth;


class EventsController extends Controller
{
    //
    public function index()
    {

        return view('frontend.events')->with([
            'Events' => Events::get(),

        ]);
    }

    public function eventsformember(){
        $pid=Session::get('EventId');
         $mid= Auth::guard('members')->user()->id;
        $event = events_member::get();
          return view('frontend.member.events')->with([
            'Events' => $event,
         ]);

       }
    public function subscripeEvent($eventid){

        if(!auth()->guard('members')->check()){
            Session::put('EventId', $eventid);
             return redirect(route('member.login'));

        }
        else{
            $mid= Auth::guard('members')->user()->id;
            $report = events_member::where('event_id', '=', $eventid)
            ->where('member_id', '=', $mid)
            ->first();

            // $mp = member_programs::find($id);
            if(!$report){

            $event = events_member::updateOrCreate(
                ['event_id' => $eventid],
                ['member_id' =>$mid],
            );


            return redirect(route('memberevent'))->with([ 'message' => sprintf('Great! You have  successfully participated in the event "%s"', $event->event_id),
            'alert-type' => 'success'
            ]);
            }
            else{
                return redirect( route('memberevent') )->with([ 'message' => sprintf('Oops! You have   Aleardy participated in the event ' ),
                'alert-type' => 'success'
                ]);
            }

        }

}
}
