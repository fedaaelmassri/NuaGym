<?php

namespace App\Http\Controllers\backend;
use Illuminate\Support\Facades\Hash;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Auth;
use App\User;
class UserprofileController extends Controller
{
    //

    public function index()
    {
           return view('backend.index');

    }
    public function settings()
    {
           return view('backend.UserProfile.settings');

    }
    public function edit()
    {
        $id=auth()->user()->id;

        $userdata = User::findOrfail($id);
        if (!$userdata) {
            return redirect()->back()->with([
                'message' => sprintf('The User can not found!'),
                'alert-type' => 'error'
            ]);
        }

        return  view('backend.UserProfile.update', [
            'userdata' =>  $userdata,


        ]);
    }
    public function update(Request $request, $id){
        $user =  User::findOrfail($id);

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
            return redirect(route('admin.userprofile.edit'))->with([
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
