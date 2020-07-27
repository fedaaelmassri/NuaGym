<?php

namespace App\Http\Controllers\backend;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;
use App\programs;

class ProgramController extends Controller
{
    //

    public function index()
    {

        return view('backend.Programs.index')->with([
            'programs' => programs::get()
        ]);
    }

    public function create()
    {
         return view('backend.Programs.addProgram');
    }

    public function store(Request $request)
    {

        $request->validate([

            'name' => 'required',
            'description' => 'required|max:255',
            'image' => 'required|image',
            'category_id' => 'required',
        ]);


        if ($request->hasFile('image')) {
            $image = $request->file('image');
            $path = $image->store('categories', 'public');
        } else {

            $path = null;
        }

        $category = new Categories();
        $category->name = $request->input('name');
        $category->description = $request->input('description');
        $category->image = $path;
        $category->parent_id = $request->input('category_id');

        $category->save();
        if ($category->save()) {
            return redirect(route('admin.category'))->with([
                'message' => sprintf('category: "%s" add success !', $category->name),
                'alert-type' => 'success'
            ]);
        } else {
            return redirect()->back()->with([
                'message' => sprintf('category: "%s" can not add success !', $category->name),
                'alert-type' => 'error'
            ])->withInput();
        }


    }

public function delete($id)
{
    $Category = Categories::findOrfail($id);
    //if not found
    if (!$Category) {
        return redirect()->back()->with([
            'message' => sprintf('The Category can not found!'),
            'alert-type' => 'error'
        ]);
    }
    //if found
    else{
       // get child category with this id
        $parentid= DB::table('Categories')
        ->where('parent_id', $id);
        //if success delete
         if($Category->delete()){
            //edit to no parent category
            $parentCategory= DB::table('Categories')
        ->where('parent_id', $id)
        ->update(['parent_id' => 0]);
        //if edit success
             return response()->json([
                'message' => sprintf('The Category: "%s" Deleeted success !', $Category->name),
                'success' => true,
                  'parentCategory'=>$parentCategory
                ]);

    }        //if edit error
        else{
            return response()->json([
                'message' => sprintf('Error Deleeted !', $Category->name),
                'success' => false

                ]);


        }




 }

}
    public function editCategory($id)
    {
        $Category = Categories::findOrfail($id);
        if (!$Category) {
            return redirect()->back()->with([
                'message' => sprintf('The Category can not found!'),
                'alert-type' => 'error'
            ]);
        }

        return  view('backend.Programs.update', [
            'Category' =>  $Category,


        ]);
    }


    public function updateCategory(Request $request, $id)
    {
        $category = Categories::findOrfail($id);


        $image = $request->file('image');

        if ($image && $image->isValid()) {
            $path = $image->storeAs('brands', basename($brands->image), 'public');
            $brands->image = $path;
        }

        $category->name = $request->input('name');
        $category->description = $request->input('description');
        $category->parent_id = $request->input('category_id');

        $category->save();
        if ($category->save()) {
            return redirect(route('admin.program'))->with([
                'message' => sprintf(' The Category: "%s" edit success !', $category->name),
                'alert-type' => 'success'
            ]);
        } else {
            return redirect()->back()->with([
                'message' => sprintf(' The Category : "%s" can not edit success !', $category->name),
                'alert-type' => 'error'
            ])->withInput();
        }
     }



}
