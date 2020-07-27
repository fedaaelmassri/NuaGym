<?php

namespace App\Http\Controllers\backend;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\ECatalogues;
use Storage;
use Carbon\Carbon;

class EcataloguesController extends Controller
{
    //
    public function index(){

        return view ('backend.Ecatalogues.index')->with([
            'ecatalogues' => ECatalogues::get()
            ]);


    }

    public function create(){

        return view ('backend.Ecatalogues.addEcatalogue');


    }

    public function store(Request $request){

        $request->validate([

            'name' => 'required',
            'file' => 'required',
             'image' => 'required|image',

        ]);
        $filename = $request->input('name');
        if($request->hasfile('file')){
            $file = $request->file('file');
            $mimetype =$file->getClientMimeType();
    		$size = $file->getClientSize();
             $file_path =$file->store('eCatalogues/files');
         // $file = $filename . '.' . $file->getClientOriginalExtension();
             //storage_path('/eCatalogues');
            // $filename = $file['filename']->getClientOriginalExtension();
         //   Storage::make($file)->save( public_path('/storage/eCatalogues/' . $filename) );

            // Storage::disk('local')->putFile($file_path, new File($request->file), $file);
            //$path = $request->file('file')->store( storage_path('/storage/loonstrookjes/'));
            //$path = Storage::putFile(storage_path('/loonstrookjes/'), $filename);
            //dd($upload);

            //return $put;
        }

    	//$file = $request->file('file');

        if ($request->hasFile('image')) {
            $image = $request->file('image');
            $image_path = $image->store('ecatalogues/images', 'public');
        } else {

            $image_path = null;
        }
        $description=$request->input('description');
    	ECatalogues::create([
            'name' => $filename,
            'description'=> $description,
            'image'=>$image_path,
    		'filepath' => $file_path,
    		'mimetype' => $mimetype,
    		'size' => $size,
     		'downloads' => 0,
    	]);

        // if ($request->hasFile('image')) {
        //     $image = $request->file('image');
        //     $path = $image->store('eCatalogues', 'public');
        // } else {

        //     $path = null;
        // }

        // $eCatalogues = new ECatalogues();
        // $eCatalogues->name = $request->input('name');
        // $eCatalogues->description = $request->input('description');
        // $eCatalogues ->image = $path;

        // $eCatalogues ->save();


        return redirect(route('admin.ecatalogues'))->with([
            'message' => sprintf(' The ECatalogue: "%s" add success !', $filename),
            'alert-type' => 'success'
        ]);



    }

    public function delete($id)
    {
         $ecatalogues = ECatalogues::findOrfail($id);

        if (!$ecatalogues) {
            return redirect()->back()->with([
                'message' => sprintf('The ECatalogue can not found!'),
                'alert-type' => 'error'
            ]);
        }

        $ecatalogues->delete();
        return response()->json(['message' => sprintf(' The ECatalogue: "%s" deleted success !', $ecatalogues->name)]);
    }

    public function editECatalogues($id)
    {
        $ecatalogues = ECatalogues::findOrfail($id);
        if (!$ecatalogues) {
            return redirect()->back()->with([
                'message' => sprintf('The Ecatalogue can not found!'),
                'alert-type' => 'error'
            ]);
        }
        $extfile = basename(storage_path('eCatalogues/files/' . $ecatalogues->filepath) );
        $extimg = basename(storage_path('eCatalogues/images/' . $ecatalogues->image) );

        return  view('backend.ECatalogues.update', [
            'ecatalogues' =>  $ecatalogues,
            'extfile'=>$extfile,
            'extimg'=>$extimg


        ]);
    }

    public function updateECatalogues(Request $request, $id)
    {
        $ecatalogues = ECatalogues::findOrfail($id);
        $image = $request->file('image');

        if ($image && $image->isValid()) {
            $path = $image->storeAs('eCatalogues/images', basename($ecatalogues->image), 'public');
            $ecatalogues->image = $path;
        }
         $file = $request->file('file');
        if($file&&$file->isValid()){
            $path = $file->storeAs('eCatalogues/files', basename($ecatalogues->file), 'public');
             $ecatalogues->filepath = $path;
    		$ecatalogues->mimetype =$file->getClientMimeType();
    		$ecatalogues->size = $file->getClientSize();

    }
        $ecatalogues->name = $request->input('name');
        $ecatalogues->description = $request->input('description');

        $ecatalogues->save();

        if ($ecatalogues->save()) {
            return redirect(route('admin.ecatalogues'))->with([
                'message' => sprintf(' The ECatalogue: "%s" edit success !', $ecatalogues->name),
                'alert-type' => 'success'
            ]);
        } else {
            return redirect()->back()->with([
                'message' => sprintf(' The ECatalogue: "%s" can not edit success !', $ecatalogues->name),
                'alert-type' => 'error'
            ])->withInput();
        }
    }

}
