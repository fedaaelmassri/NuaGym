<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use app\Events;
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
            'description' => 'required|max:255',
            'image' => 'required|image',
            'cost' => 'required',
        ]);


        if ($request->hasFile('image')) {
            $image = $request->file('image');
            $path = $image->store('events', 'public');
        } else {

            $path = null;
        }

        $Events = new Eventss();
        $Events->name = $request->input('name');
        $Events->description = $request->input('description');
        $Events->image = $path;
        $Events->cost = $request->input('cost');

        $Events->save();
        if ($Events->save()) {
            return redirect(route('admin.Events'))->with([
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
        $Eventss = Eventss::findOrfail($id);

        if (!$Eventss) {
            return redirect()->back()->with([
                'message' => sprintf('The Events can not found!'),
                'alert-type' => 'error'
            ]);
        }

        $Eventss->delete();
        return response()->json(['message' => sprintf('The Events: "%s" deleted success !', $Eventss->name)]);
    }
    public function editEvents($id)
    {
        $Events = Eventss::findOrfail($id);
        if (!$Events) {
            return redirect()->back()->with([
                'message' => sprintf('The Events can not found!'),
                'alert-type' => 'error'
            ]);
        }

        return  view('backend.Eventss.update', [
            'Events' =>  $Events,


        ]);
    }


    public function updateEvents(Request $request, $id)
    {
        $Events = Eventss::findOrfail($id);


        $image = $request->file('image');

        if ($image && $image->isValid()) {
            $path = $image->storeAs('Eventss', basename($Events->image), 'public');
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
