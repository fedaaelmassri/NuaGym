<?php

namespace App\Http\Controllers\frontend;

use Illuminate\Support\Facades\Hash;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Auth;
use App\members;
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
}
