<?php


namespace App\Http\Controllers\backend;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;
use Session;
use Cookie;
use App\Eventsport;
 use Carbon\Carbon;
class EventsportController extends Controller
{
    //
    public function index()
    {

        return view('backend.Eventsport.index')->with([
            'Events' => Eventsport::get(),

        ]);
    }
    public function create()
    {
         return view('backend.Eventsport.addEvent');
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
            'required_subscribers'=>'required',
            'duration' => 'required',
            'image' => 'required|image',
            'cost' => 'required',
        ]);


        if ($request->hasFile('image')) {
            $image = $request->file('image');
            $path = $image->store('eventsport', 'public');
        } else {

            $path = null;
        }

        $Events = new Eventsport();
        $Events->name = $request->input('name');
        $Events->name_ar = $request->input('name_ar');
        $Events->description = $request->input('description');
        $Events->description_ar = $request->input('description_ar');
        $Events->duration = $request->input('duration');
        $Events->date = Carbon::parse($request->input('date'));
         $Events->time = Carbon::parse($request->input('time'));
         $Events->required_subscribers=$request->input('required_subscribers');
        $time=$request->input('time');
        // $Events->time =  Carbon::createFromTime('H:i:s', request->input('time')$)->toTimeString();
        // $Events->time =   Carbon::createFromFormat('Y-m-d H:i:s', $time);

        $Events->image = $path;
        $Events->cost = $request->input('cost');

        $Events->save();
        if ($Events->save()) {
            return redirect(route('admin.Eventsport'))->with([
                'message' => sprintf('Event: "%s" add success !', $Events->name),
                'alert-type' => 'success'
            ]);
        } else {
            return redirect()->back()->with([
                'message' => sprintf('Event: "%s" can not add success !', $Events->name),
                'alert-type' => 'error'
            ])->withInput();
        }


    }

    public function delete($id)
    {
        $Events = Eventsport::findOrfail($id);

        if (!$Events) {
            return redirect()->back()->with([
                'message' => sprintf('The Event can not found!'),
                'alert-type' => 'error'
            ]);
        }

        $Events->delete();
        return response()->json(['message' => sprintf('The Event: "%s" deleted success !', $Events->name)]);
    }
    public function editEvent($id)
    {
        $Events = Eventsport::findOrfail($id);
        if (!$Events) {
            return redirect()->back()->with([
                'message' => sprintf('The Event can not found!'),
                'alert-type' => 'error'
            ]);
        }

        return  view('backend.Eventsport.update', [
            'Event' =>  $Events,


        ]);
    }


    public function updateEvent(Request $request, $id)
    {
        $Events = Eventsport::findOrfail($id);


        $image = $request->file('image');

        if ($image && $image->isValid()) {
            $path = $image->storeAs('eventsport', basename($Events->image), 'public');
            $Events->image = $path;
        }

         $Events->name = $request->input('name');
         $Events->name_ar = $request->input('name_ar');
         $Events->description = $request->input('description');
         $Events->description_ar = $request->input('description_ar'); 
        $Events->duration = $request->input('duration');
        $Events->date = Carbon::parse($request->input('date'));
         $Events->time = Carbon::parse($request->input('time'));
         $Events->required_subscribers=$request->input('required_subscribers');
        $time=$request->input('time');
         if ($Events->save()) {
            return redirect(route('admin.Eventsport'))->with([
                'message' => sprintf(' The Event: "%s" edit success !', $Events->name),
                'alert-type' => 'success'
            ]);
        } else {
            return redirect()->back()->with([
                'message' => sprintf(' The Event : "%s" can not edit success !', $Events->name),
                'alert-type' => 'error'
            ])->withInput();
        }
     }

   
}
