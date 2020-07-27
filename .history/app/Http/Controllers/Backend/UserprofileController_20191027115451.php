<?php

namespace App\Http\Controllers\Backend;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Auth;

class UserprofileController extends Controller
{
    //
    public function edit($id)
    {
        $coache = Coaches::findOrfail($id);
        if (!$coache) {
            return redirect()->back()->with([
                'message' => sprintf('The Coache can not found!'),
                'alert-type' => 'error'
            ]);
        }

        return  view('backend.Coaches.update', [
            'coache' =>  $coache,


        ]);
    }
    public function updatecoache(Request $request, $id){
        $coache = Coaches::findOrfail($id);

        $coache->name = $request->input('name');
        $coache->email = $request->input('email');
        $coache->mobile = $request->input('mobile');
        $coache->identity = $request->input('identity');
        $coache->city = $request->input('city');
        $coache->country = $request->input('country');
        $coache->address = $request->input('address');
        $coache->image = 'image.jpg';
        $coache->password=Hash::make($request->input('password'));

        $coache->save();
        if ($coache->save()) {
            return redirect(route('admin.Coache'))->with([
                'message' => sprintf(' The coache: "%s" edit success !', $coache->name),
                'alert-type' => 'success'
            ]);
        } else {
            return redirect()->back()->with([
                'message' => sprintf(' The coache : "%s" can not edit success !', $coache->name),
                'alert-type' => 'error'
            ])->withInput();
        }
     }
}
