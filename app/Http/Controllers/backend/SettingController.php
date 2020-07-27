<?php

namespace App\Http\Controllers\backend;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

use App\Settings;

class SettingController extends Controller
{
    //

    public function index()
    {
        return view('backend.UserProfile.settings')->with([

             'facebook' => Settings::where('constant', 'facebook')->first(),
            'instagram' => Settings::where('constant', 'instagram')->first(),
            'twitter' => Settings::where('constant', 'twitter')->first(),
            'whatsapp' => Settings::where('constant', 'whatsapp')->first(),
            'telephone' => Settings::where('constant', 'telephone')->first(),
            'location' => Settings::where('constant', 'location')->first(),
            'about_title' => Settings::where('constant', 'about_title')->first(),
            'about_description' => Settings::where('constant', 'about_description')->first(),
            
            'home_title' => Settings::where('constant', 'home_title')->first(),
            'home_description' => Settings::where('constant', 'home_description')->first(),

            'about_title_ar' => Settings::where('constant', 'about_title_ar')->first(),
            'about_description_ar' => Settings::where('constant', 'about_description_ar')->first(),

            'home_title_ar' => Settings::where('constant', 'home_title_ar')->first(),
            'home_description_ar' => Settings::where('constant', 'home_description_ar')->first(),
            'video_url'=> Settings::where('constant', 'video_url')->first(),
            'apikey' => Settings::where('constant', 'apikey')->first(),
            'username' => Settings::where('constant', 'username')->first(),
            'password' => Settings::where('constant', 'password')->first(),

        ]);
    }



    public function update(Request $request)
    {
 
 
         
        $result =   Settings::where('constant', 'facebook')->update(['value' => $request->input('facebook')]);
        $result =   Settings::where('constant', 'instagram')->update(['value' => $request->input('instagram')]);
        $result =  Settings::where('constant', 'twitter')->update(['value' => $request->input('twitter')]);
        $result =  Settings::where('constant', 'whatsapp')->update(['value' => $request->input('whatsapp')]);
        $result =  Settings::where('constant', 'telephone')->update(['value' => $request->input('telephone')]);
        $result =  Settings::where('constant', 'location')->update(['value' => $request->input('location')]);
        $result =   Settings::where('constant', 'about_title')->update(['value' => $request->input('about_title')]);
        $result =   Settings::where('constant', 'about_description')->update(['value' => $request->input('about_description')]);
        $result =   Settings::where('constant', 'home_title')->update(['value' => $request->input('home_title')]);
        $result =   Settings::where('constant', 'home_description')->update(['value' => $request->input('home_description')]);
        $result =   Settings::where('constant', 'about_title_ar')->update(['value' => $request->input('about_title_ar')]);
        $result =   Settings::where('constant', 'about_description_ar')->update(['value' => $request->input('about_description_ar')]);
        $result =   Settings::where('constant', 'home_title_ar')->update(['value' => $request->input('home_title_ar')]);
        $result =   Settings::where('constant', 'home_description_ar')->update(['value' => $request->input('home_description_ar')]);
        $result= Settings::where('constant', 'video_url')->update(['value' => $request->input('video_url')]);
        $result =   Settings::where('constant', 'apikey')->update(['value' => $request->input('apikey')]);
        $result =   Settings::where('constant', 'username')->update(['value' => $request->input('username')]);
        $result =  Settings::where('constant', 'password')->update(['value' => $request->input('password')]);
         if ($result == 1) {
            return redirect()->back()->with([
                'message' => sprintf('Edit  success !' ),
                'alert-type' => 'success'
            ]);
        } else {

            return redirect()->back()->with([
                'message' => sprintf('Fail  Edit !!' ),
                'alert-type' => 'error'
            ]);
        }


        // return redirect(route('admin.tag'))->with('message', sprintf('Tag: "%s" add success !', $tag->name));
    }
}
