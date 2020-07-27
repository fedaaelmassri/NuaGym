<?php


namespace App\Http\Controllers\backend;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;
use Session;
use Cookie;
use App\Events;
use App\Coaches;
use App\Coache_events;
use Carbon\Carbon;
class EventController extends Controller
{
    //
    public function index()
    {

        return view('backend.Events.index')->with([
            'Events' => Events::get(),

        ]);
    }
    public function create()
    {
         return view('backend.Events.addEvent');
    }

    public function store(Request $request)
    {

        $request->validate([

            'name' => 'required',
            'name_ar' => 'required',
            'description' => 'required ',
            'description_ar' => 'required',
            'time' => 'required',
            'date' => 'required',
            'duration' => 'required',
            'image' => 'required|image',
            'cost' => 'required',
        ]);


        if ($request->hasFile('image')) {
            $image = $request->file('image');
            $path = $image->store('events', 'public');
        } else {

            $path = null;
        }

        $Events = new Events();
        $Events->name = $request->input('name');
        $Events->name_ar = $request->input('name_ar');
        $Events->description = $request->input('description');
        $Events->description_ar = $request->input('description_ar');
        $Events->duration = $request->input('duration');
        $Events->date = Carbon::parse($request->input('date'));
         $Events->time = Carbon::parse($request->input('time'));
        $time=$request->input('time');
        // $Events->time =  Carbon::createFromTime('H:i:s', request->input('time')$)->toTimeString();
        // $Events->time =   Carbon::createFromFormat('Y-m-d H:i:s', $time);

        $Events->image = $path;
        $Events->cost = $request->input('cost');

        $Events->save();
        if ($Events->save()) {
            return redirect(route('admin.Event'))->with([
                'message' => sprintf('Class: "%s" add success !', $Events->name),
                'alert-type' => 'success'
            ]);
        } else {
            return redirect()->back()->with([
                'message' => sprintf('Class: "%s" can not add success !', $Events->name),
                'alert-type' => 'error'
            ])->withInput();
        }


    }

    public function delete($id)
    {
        $Events = Events::findOrfail($id);

        if (!$Events) {
            return redirect()->back()->with([
                'message' => sprintf('The Class can not found!'),
                'alert-type' => 'error'
            ]);
        }

        $Events->delete();
        return response()->json(['message' => sprintf('The Class: "%s" deleted success !', $Events->name)]);
    }
    public function editEvent($id)
    {
        $Events = Events::findOrfail($id);
        if (!$Events) {
            return redirect()->back()->with([
                'message' => sprintf('The Class can not found!'),
                'alert-type' => 'error'
            ]);
        }

        return  view('backend.Events.update', [
            'Event' =>  $Events,


        ]);
    }


    public function updateEvent(Request $request, $id)
    {
        $Events = Events::findOrfail($id);


        $image = $request->file('image');

        if ($image && $image->isValid()) {
            $path = $image->storeAs('Events', basename($Events->image), 'public');
            $Events->image = $path;
        }

         $Events->name = $request->input('name');
         $Events->name_ar = $request->input('name_ar');
         $Events->description = $request->input('description');
         $Events->description_ar = $request->input('description_ar'); 
        $Events->duration = $request->input('duration');
        $Events->date = Carbon::parse($request->input('date'));
         $Events->time = Carbon::parse($request->input('time'));
        $time=$request->input('time');
         if ($Events->save()) {
            return redirect(route('admin.Event'))->with([
                'message' => sprintf(' The Class: "%s" edit success !', $Events->name),
                'alert-type' => 'success'
            ]);
        } else {
            return redirect()->back()->with([
                'message' => sprintf(' The Class : "%s" can not edit success !', $Events->name),
                'alert-type' => 'error'
            ])->withInput();
        }
     }

     public function getallcoach(){
        $coaches= Coaches::with('events')->get();

        return response()->json(['data' =>$coaches] );

    }
    public function AddCoach($e_id, $c_id)
    {
        $event= Events::findOrfail($e_id);
        $Coaches = Coaches::findOrfail($c_id);
        $checkCoache_events = Coache_events::where([['event_id','=', $e_id],['coache_id','=', $c_id]])->first();
        if(!$checkCoache_events){
        $Coache_events = Coache_events::updateOrCreate(
            ['event_id' => $e_id,
           'coache_id' => $c_id ]
        );
        return response()->json(['message' => sprintf('The  Caoch:  "%s"  has been assigned to The  : "%s" Class success !',$Coaches->name,$event->name)]);

    }
     }
     public function RemoveCoach($e_id, $c_id)
     {
        $event = Events::findOrfail($e_id);
        $Coaches = Coaches::findOrfail($c_id);
         $Coache_events=Coache_events::where('event_id', $e_id)->where('coache_id', $c_id)->delete();
                if($Coache_events){

         return response()->json(['message' => sprintf('The  Caoch:  "%s"  has been Deleted from The  : "%s" Class success !',$Coaches->name,$event->name)]);
        }

      }
}
