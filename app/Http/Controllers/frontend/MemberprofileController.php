<?php

namespace App\Http\Controllers\frontend;

use Illuminate\Support\Facades\Hash;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;
use Auth;
use App\members;
use App\subscriptions;
use App\transactions;

class MemberprofileController extends Controller
{
    //
    public function edit()
    {
        $id=Auth::guard('members')->user()->id;

        $userdata = members::findOrfail($id);
        if (!$userdata) {
            return redirect()->back()->with([
                'message' => sprintf('The User can not found!'),
                'alert-type' => 'error'
            ]);
        }

        return  view('frontend.member.memberprofile', [
            'userdata' =>  $userdata,


        ]);
    }
    public function update(Request $request, $id){
        $user =  members::findOrfail($id);
        $image = $request->file('image');
    
        if ($image && $image->isValid()) {
            if($user->image!='')
            $path = $image->storeAs('member', basename($user->image), 'public');
        else
            $path = $image->store('member', 'public');
            $user->image = $path;
        }

       
        $user->name = $request->input('name');
        $user->email = $request->input('email');
        $user->mobile = $request->input('mobile');
        $user->identity = $request->input('identity');
        $user->city = $request->input('city');
        $user->country = $request->input('country');
        $user->address = $request->input('address');
        // $user->image = 'image.jpg';
        $user->password=Hash::make($request->input('password'));

        $user->save();
        if ($user->save()) {
            return redirect(route('member.memberprofile.edit'))->with([
                'message' => sprintf(' The user: "%s" edit success !', $user->name),
                'alert-type' => 'success'
            ]);
        } else {
            return redirect()->back()->with([
                'message' => sprintf(' The user : "%s" can not edit success !', $user->name),
                'alert-type' => 'error'
            ])->withInput();
        }
     }
     public function paymentMethod(){
        $id=Auth::guard('members')->user()->id;
        $paymentMethod =  DB::table('transactions')->distinct()->where('member_id', $id) 
         ->get(['PaymentGateway']);
     return  view('frontend.member.paymentmethod', [
        'paymentMethod' =>  $paymentMethod,


    ]);

     }
     public function memberTransaction(){
        $id=Auth::guard('members')->user()->id;
     $transactions = DB::table('transactions')->where('member_id', $id)
    //    ->groupBy('member_id')
       
      ->orderBy('created_at', 'DESC')
     ->get();
     return  view('frontend.member.transactions', [
        'transactions' =>  $transactions,


    ]);

     }
}
