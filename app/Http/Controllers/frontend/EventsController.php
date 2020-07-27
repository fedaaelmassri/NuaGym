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
use App\programs;
 use App\subscriptions;
use App\transactions;


class EventsController extends Controller
{
    //
    public function index()
    { 

 
 
        return view('frontend.events')->with([
            'Events' => Events::with('coaches')->get(),

        ]);
    }
    public function viewById($e_id){
        // $id=request()->query('id');
        $events= Events::where('id', $e_id)->first() ;
     
        // return response()->json(['events'=>$events]);
        return view('frontend.classdetails')->with(['events'=>$events]);

         

    }
     public function eventsformember(){
        $eid=Session::get('EventId');
         $mid= Auth::guard('members')->user()->id;
        $event = subscriptions::where('member_id', $mid)
        ->where('payable_type', 'event')
        ->orderBy('created_at', 'DESC') 
        ->get();
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
                ['member_id' =>$mid]
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

    public function eventInWeek() {
        $fromDate = strtotime( request()->query('fromDate'));
        $toDate = strtotime( request()->query('toDate'));
            $from =date('Y-m-d',$fromDate);
            $to = date('Y-m-d',$toDate);
         $events= Events::whereBetween('date', [$from, $to])->with('coaches')->get();
          return response()->json(['events'=>$events]);

 
       }
}
