<?php

namespace App\Http\Controllers\Backend;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Coaches;
class CoacheController extends Controller
{
    public function index()
    {

        return view('backend.Coaches.index')->with([
            'programs' => programs::get()
        ]);
    }
    public function create()
    {
         return view('backend.Programs.addProgram');
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
            $path = $image->store('programs', 'public');
        } else {

            $path = null;
        }

        $program = new programs();
        $program->name = $request->input('name');
        $program->description = $request->input('description');
        $program->image = $path;
        $program->cost = $request->input('cost');

        $program->save();
        if ($program->save()) {
            return redirect(route('admin.Program'))->with([
                'message' => sprintf('program: "%s" add success !', $program->name),
                'alert-type' => 'success'
            ]);
        } else {
            return redirect()->back()->with([
                'message' => sprintf('Coache: "%s" can not add success !', $program->name),
                'alert-type' => 'error'
            ])->withInput();
        }


    }

}
