<?php

namespace App\Http\Controllers\backend;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;
use App\programs;

class ProgramController extends Controller
{
    //

    public function index()
    {

        return view('backend.Programs.index')->with([
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
                'message' => sprintf('program: "%s" can not add success !', $program->name),
                'alert-type' => 'error'
            ])->withInput();
        }


    }

// public function delete($id)
// {
//     $program = programs::findOrfail($id);
//     //if not found
//     if (!$program) {
//         return redirect()->back()->with([
//             'message' => sprintf('The program can not found!'),
//             'alert-type' => 'error'
//         ]);
//     }
//     //if found
//     else{
//        // get child program with this id
//         $parentid= DB::table('programs')
//         ->where('parent_id', $id);
//         //if success delete
//          if($program->delete()){
//             //edit to no parent program
//             $parentprogram= DB::table('programs')
//         ->where('parent_id', $id)
//         ->update(['parent_id' => 0]);
//         //if edit success
//              return response()->json([
//                 'message' => sprintf('The program: "%s" Deleeted success !', $program->name),
//                 'success' => true,
//                   'parentprogram'=>$parentprogram
//                 ]);

//     }        //if edit error
//         else{
//             return response()->json([
//                 'message' => sprintf('Error Deleeted !', $program->name),
//                 'success' => false

//                 ]);


//         }




//  }

// }
    public function editprogram($id)
    {
        $program = programs::findOrfail($id);
        if (!$program) {
            return redirect()->back()->with([
                'message' => sprintf('The program can not found!'),
                'alert-type' => 'error'
            ]);
        }

        return  view('backend.Programs.update', [
            'program' =>  $program,


        ]);
    }


    public function updateprogram(Request $request, $id)
    {
        $program = programs::findOrfail($id);


        $image = $request->file('image');

        if ($image && $image->isValid()) {
            $path = $image->storeAs('programs', basename($brands->image), 'public');
            $brands->image = $path;
        }

        $program->name = $request->input('name');
        $program->description = $request->input('description');
        $program->cost = $request->input('cost');

        $program->save();
        if ($program->save()) {
            return redirect(route('admin.Program'))->with([
                'message' => sprintf(' The program: "%s" edit success !', $program->name),
                'alert-type' => 'success'
            ]);
        } else {
            return redirect()->back()->with([
                'message' => sprintf(' The program : "%s" can not edit success !', $program->name),
                'alert-type' => 'error'
            ])->withInput();
        }
     }



}
