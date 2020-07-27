<?php

namespace App\Http\Controllers\frontend;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;
use Session;
use Cookie;
use App\Eventsport;
use App\events_member;
use Carbon\Carbon;
use Auth;
use App\programs;
 use App\subscriptions;
use App\transactions;


class EventsportController extends Controller
{
    //
    public function index()
    { 

        $mytime = Carbon::now();
  
        return view('frontend.events-sport')->with([
            'Events' => Eventsport::where('date','>=',$mytime)->limit(7)->get(),

        ]);
    }
    public function viewById($e_id){
        // $id=request()->query('id');
        $events= Eventsport::where('id', $e_id)->first() ;
         $currentSubscribers=$events->no_of_attendees;
         $requiredSubscribers=$events->required_subscribers;
        // return response()->json(['events'=>$events]);
        return view('frontend.eventdetails')->with([
            'events'=>$events,
            'currentSubscribers'=>$currentSubscribers,
            'requiredSubscribers'=>$requiredSubscribers,

        ]);

         

    }
     public function eventsformember(){
        $eid=Session::get('EventId');
         $mid= Auth::guard('members')->user()->id;
        $event = subscriptions::where('member_id', $mid)
        ->where('payable_type', 'eventsport')
        ->orderBy('created_at', 'DESC') 
        ->get();
          return view('frontend.member.eventsport')->with([
            'Events' => $event,
         ]);

       }
    

    public function eventInWeek() {
        $fromDate = strtotime( request()->query('fromDate'));
        $toDate = strtotime( request()->query('toDate'));
            $from =date('Y-m-d',$fromDate);
            $to = date('Y-m-d',$toDate);
         $events= Eventsport::whereBetween('date', [$from, $to])->with('coaches')->get();
          return response()->json(['events'=>$events]);

 
       }
}
