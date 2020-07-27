<?php

namespace App\Http\Controllers\Backend;
use Illuminate\Support\Facades\Validator;
use Illuminate\Http\Request;
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
         return view('backend.Coaches.addProgram');
    }

    public function store(Request $request)
    {

        request()->validate([
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:members'],
            'mobile' => ['required', 'numeric', 'min:10'],
            'identity' => ['required', 'numeric', 'min:9'],
            'city' => ['required', 'string', 'max:255'],
            'country' => ['required', 'string', 'max:255'],
            'address' => ['required', 'string', 'max:255'],
            'password' => ['required', 'string', 'min:8', 'confirmed'],
        ]);

        // $request->validate([

        //     'name' => 'required',
        //     'description' => 'required|max:255',
        //     'image' => 'required|image',
        //     'cost' => 'required',
        // ]);


        // if ($request->hasFile('image')) {
        //     $image = $request->file('image');
        //     $path = $image->store('coaches', 'public');
        // } else {

        //     $path = null;
        // }
        createChoache
        $program = new Coaches();
        $program->name = $request->input('name');
        $program->description = $request->input('description');
        $program->image = $path;
        $program->cost = $request->input('cost');

        $program->save();
        if ($program->save()) {
            return redirect(route('admin.Coache'))->with([
                'message' => sprintf('Coache: "%s" add success !', $program->name),
                'alert-type' => 'success'
            ]);
        } else {
            return redirect()->back()->with([
                'message' => sprintf('Coache: "%s" can not add success !', $program->name),
                'alert-type' => 'error'
            ])->withInput();
        }


    }
    protected function createChoache(array $data)
    {
        return Coaches::create([
            'name' => $data['name'],
            'email' => $data['email'],
            'mobile' => $data['mobile'],
            'identity' => $data['identity'],
            'city' => $data['city'],
            'country' => $data['country'],
            'address' => $data['address'],
            'password' => Hash::make($data['password']),
        ]);
    }

}
