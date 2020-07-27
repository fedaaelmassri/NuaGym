<?php


namespace App\Http\Controllers\backend;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;
use Session;
use Cookie;
use App\Events;
use Carbon;
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
        $Events->duration = $request->input('duration');
        $Events->date = Carbon::parse($request->input('date'));
        $Events->time = Carbon::parse($request->input('time'));
        $Events->image = $path;
        $Events->cost = $request->input('cost');

        $Events->save();
        if ($Events->save()) {
            return redirect(route('admin.Event'))->with([
                'message' => sprintf('Events: "%s" add success !', $Events->name),
                'alert-type' => 'success'
            ]);
        } else {
            return redirect()->back()->with([
                'message' => sprintf('Events: "%s" can not add success !', $Events->name),
                'alert-type' => 'error'
            ])->withInput();
        }


    }

    public function delete($id)
    {
        $Events = Events::findOrfail($id);

        if (!$Events) {
            return redirect()->back()->with([
                'message' => sprintf('The Events can not found!'),
                'alert-type' => 'error'
            ]);
        }

        $Events->delete();
        return response()->json(['message' => sprintf('The Events: "%s" deleted success !', $Events->name)]);
    }
    public function editEvents($id)
    {
        $Events = Events::findOrfail($id);
        if (!$Events) {
            return redirect()->back()->with([
                'message' => sprintf('The Events can not found!'),
                'alert-type' => 'error'
            ]);
        }

        return  view('backend.Events.update', [
            'Events' =>  $Events,


        ]);
    }


    public function updateEvents(Request $request, $id)
    {
        $Events = Events::findOrfail($id);


        $image = $request->file('image');

        if ($image && $image->isValid()) {
            $path = $image->storeAs('Events', basename($Events->image), 'public');
            $Events->image = $path;
        }

        $Events->name = $request->input('name');
        $Events->description = $request->input('description');
        $Events->cost = $request->input('cost');

        $Events->save();
        if ($Events->save()) {
            return redirect(route('admin.Events'))->with([
                'message' => sprintf(' The Events: "%s" edit success !', $Events->name),
                'alert-type' => 'success'
            ]);
        } else {
            return redirect()->back()->with([
                'message' => sprintf(' The Events : "%s" can not edit success !', $Events->name),
                'alert-type' => 'error'
            ])->withInput();
        }
     }


}
