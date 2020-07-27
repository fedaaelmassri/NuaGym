<?php

namespace App\Http\Controllers\backend;
use Illuminate\Support\Facades\Validator;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use App\Http\Controllers\Controller;
use App\Coaches;
class CoacheController extends Controller
{
    public function index()
    {

        return view('backend.Coaches.index')->with([
            'coaches' => coaches::get()
        ]);
    }
    public function create()
    {
         return view('backend.Coaches.addCoache');
    }


    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'name_ar' => 'required|string|max:255',
            'email' => 'required|string|email|max:255 ',
            'mobile' => 'required|numeric|min:10',
            'identity' => 'required|numeric|min:9',
            'city' => 'required|string|max:255',
            'country' => 'required|string|max:255',
            'address' => 'required|string|max:255',
            'description' => 'required',
            'description_ar' => 'required',
            'image' => 'required|image',
            'password' => 'required|string|min:8|confirmed',

        ]);

        if ($request->hasFile('image')) {
            $image = $request->file('image');
            $path = $image->store('coaches', 'public');
        } else {

            $path = null;
        }

        // $image=$request->file('image');
        // $path= $image->store('coaches','public');//->storeAs('images','image.jpg');

        $coache=new Coaches();
        $coache->name = $request->input('name');
        $coache->name_ar = $request->input('name_ar');
        $coache->email = $request->input('email');
        $coache->mobile = $request->input('mobile');
        $coache->identity = $request->input('identity');
        $coache->city = $request->input('city');
        $coache->country = $request->input('country');
        $coache->address = $request->input('address');
        $coache->description = $request->input('description');
        $coache->description_ar = $request->input('description_ar');
        $coache->image = $path;
        $coache->password=Hash::make($request->input('password'));
        $coache->save();
        if ($coache->save()) {
            return redirect(route('admin.Coache'))->with([
                'message' => sprintf('Coache: "%s" add success !', $coache->name),
                'alert-type' => 'success'
            ]);
        } else {
            return redirect()->back()->with([
                'message' => sprintf('Coache: "%s" can not add success !', $coache->name),
                'alert-type' => 'error'
            ])->withInput();
        }


    }
    public function createChoache(array $data)
    {
        // $request = request();
        // if ($request->hasFile('image')) {
        //     $path = $request->file('image')->store('coaches', 'public');
        // } else {
        //     $path = null;
        // }


        return Coaches::create([
            'name' => $data['name'],
            'name_ar' => $data['name_ar'],
            'email' => $data['email'],
            'mobile' => $data['mobile'],
            'identity' => $data['identity'],
            'city' => $data['city'],
            'country' => $data['country'],
            'address' => $data['address'],
            'description' => $data['description'],
            'description_ar' => $data['description_ar'],
            'image'=>'image.png',
            'password' => Hash::make($data['password']),
        ]);
    }
    public function editcoache($id)
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
        $image = $request->file('image');

        if ($image && $image->isValid()) {
            $path = $image->storeAs('coaches', basename($coache->image), 'public');
            $coache->image = $path;
        }

 
        $coache->name = $request->input('name');
        $coache->name_ar = $request->input('name_ar');
        $coache->email = $request->input('email');
        $coache->mobile = $request->input('mobile');
        $coache->identity = $request->input('identity');
        $coache->city = $request->input('city');
        $coache->country = $request->input('country');
        $coache->address = $request->input('address');
        $coache->description = $request->input('description');
        $coache->description_ar = $request->input('description_ar');

        // $coache->image = $path;
        // $coache->password=Hash::make($request->input('password'));
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
     public function delete($id)
    {
        $coache = Coaches::findOrfail($id);

        if (!$coache) {
            return redirect()->back()->with([
                'message' => sprintf('The Coache can not found!'),
                'alert-type' => 'error'
            ]);
        }

        $coache->delete();
        return response()->json(['message' => sprintf('The Coache: "%s" deleted success !', $coache->name)]);
    }

}
