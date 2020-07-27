<?php

namespace App\Http\Controllers\backend;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;
use App\members;
use App\transactions;
class MemberController extends Controller
{
    //

    public function index()
    {

        return view('backend.Members.index')->with([
            'members' => members::get()
        ]);
    }
    public function viewById($id){
        $member = members::findOrfail($id);
        return view('backend.Members.memberdetails')->with([
            'member' =>$member
        ]);
        
     }
     public function transactionById($id){
        $transactions = transactions::findOrfail($id);
        return view('backend.Members.transactiondetails')->with([
            'transactions' =>$transactions
        ]);
     }

     public function memberTransaction(){
        return view('backend.Transactions.transactions')->with([
            'transactions' => transactions::orderBy('created_at', 'DESC')->get()
        ]);

     }
     public function accountStatement(){
        return view('backend.Transactions.accountStatement')->with([
            'transactions' => transactions::get(),
            'payable_type'=>transactions::distinct('payable_type')->get('payable_type')
        ]);

     }
     public function accountStatementfilter(){
        $payable_type=request()->query('payable_type');
        $fromDate=request()->query('fromDate');
        $toDate=request()->query('toDate');
        $transactions= (new transactions)->newQuery();
        if($payable_type){
            $transactions->where('payable_type', $payable_type);
        }
        if ($fromDate){
        $transactions->where('TransactionDate','>=', $fromDate);
    
        }
        if ($toDate){
            $transactions->where('TransactionDate','<=', $toDate);
        
            }
    
        return response()->json(['transactions'=>$transactions->get()]);

 

     }
    public function Activate($id){
        $status='1';
        $member = members::findOrfail($id);
             if ($member->status === '0') {
              $status = '1';
              } if ( $member->status=== '1') {
                $status = '0';
                   }
                   $member->status = $status;
              if ($member->save()) {
                  return redirect(route('admin.Member'))->with([
                      'message' => sprintf(' The member: "%s" Activated success !', $member->name),
                      'alert-type' => 'success'
                  ]);
              } else {
                  return redirect()->back()->with([
                      'message' => sprintf(' The member : "%s" can not Activated success !', $member->name),
                      'alert-type' => 'error'
                  ])->withInput();
              }

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
