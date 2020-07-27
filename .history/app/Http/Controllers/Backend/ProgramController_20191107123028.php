<?php

namespace App\Http\Controllers\backend;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;
use App\programs;
use App\CoachesPrograms;
use App\Coaches;
use Session;
use Cookie;

class ProgramController extends Controller
{
    //

    public function index()
    {

        return view('backend.Programs.index')->with([
            'programs' => programs::get(),
             'coaches'=> Coaches::get(), //::with(['programs']),

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

    public function delete($id)
    {
        $programs = programs::findOrfail($id);

        if (!$programs) {
            return redirect()->back()->with([
                'message' => sprintf('The Program can not found!'),
                'alert-type' => 'error'
            ]);
        }

        $programs->delete();
        return response()->json(['message' => sprintf('The Program: "%s" deleted success !', $programs->name)]);
    }
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
            $path = $image->storeAs('programs', basename($programs->image), 'public');
            $programs->image = $path;
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


     public function AddCoach($p_id, $c_id)
    {
        $program = programs::findOrfail($p_id);
        $Coaches = Coaches::findOrfail($c_id);
        $checkCoachesPrograms = CoachesPrograms::where([['program_id','=', $p_id],['coache_id','=', $c_id]])->first();
        if($checkCoachesPrograms){
        $CoachesPrograms = CoachesPrograms::updateOrCreate(
            ['program_id' => $p_id,
           'coache_id' => $c_id ]
        );

        return response()->json(['message' => sprintf('The  Caoch:  "%s"  has been assigned to The  : "%s" program success !',$Coaches->name,$program->name)]);

    }
     }
     public function checkfoundcoach($p_id){
        $CoachesPrograms=CoachesPrograms::where('program_id', $p_id)->get();

            return response()->json(['data' =>$CoachesPrograms] );


     }
    public function getallcoach(){
        $coaches= Coaches::with('programs')->get();


        return response()->json(['data' =>$coaches] );

    }
     public function RemoveCoach($p_id, $c_id)
     {
        $program = programs::findOrfail($p_id);
        $Coaches = Coaches::findOrfail($c_id);
        //  $CoachesPrograms=CoachesPrograms::findOrfail();
        $CoachesPrograms=CoachesPrograms::where('program_id', $p_id)->where('coache_id', $c_id)->delete();
        // )->where(function ($query) {
        //     $query->where('program_id', '=', $p_id)
        //           ->where('coache_id', '=', $c_id);
        // })->delete();

        //  $CoachesPrograms->delete();
               if($CoachesPrograms){

         return response()->json(['message' => sprintf('The  Caoch:  "%s"  has been Deleted from The  : "%s" program success !',$Coaches->name,$program->name)]);
        }

      }

}
