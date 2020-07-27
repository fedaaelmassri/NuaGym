<?php

namespace App\Http\Controllers\backend;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;
use App\members;

class MemberController extends Controller
{
    //

    public function index()
    {

        return view('backend.Members.index')->with([
            'members' => members::get()
        ]);
    }

     
   
// public function delete($id)
// {
//     $program = members::findOrfail($id);
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
//         $parentid= DB::table('members')
//         ->where('parent_id', $id);
//         //if success delete
//          if($program->delete()){
//             //edit to no parent program
//             $parentprogram= DB::table('members')
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
   

  



}
