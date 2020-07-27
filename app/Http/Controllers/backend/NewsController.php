<?php

namespace App\Http\Controllers\backend;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

use App\News;

class NewsController extends Controller
{
    //

    public function index(){

        return view ('backend.News.index')->with([
            'news' => News::get()
            ]);


    }

    public function create(){

        return view ('backend.News.addNews');


    }

    public function store(Request $request){

        $request->validate([

            'name' => 'required',
            'description' =>'required ',
            'image' => 'required|image',

        ]);


        if ($request->hasFile('image')) {
            $image = $request->file('image');
            $path = $image->store('news', 'public');
        } else {

            $path = null;
        }

        $news = new News();
        $news->name = $request->input('name');
        $news->description = $request->input('description');
        $news ->image = $path;

        $news ->save();

        if ($news->save()) {
            return redirect(route('admin.news'))->with([
                'message' => sprintf('The New: "%s" add success !', $news->name),
                'alert-type' => 'success'
            ]);
        } else {
            return redirect()->back()->with([
                'message' => sprintf('The New: "%s" can not add success !', $news->name),
                'alert-type' => 'error'
            ])->withInput();
        }


    }


    public function delete($id)
    {
        $news = News::findOrfail($id);

        if (!$news) {
            return redirect()->back()->with([
                'message' => sprintf('The New can not found!'),
                'alert-type' => 'error'
            ]);
        }

        $news->delete();
        return response()->json(['message' => sprintf(' The New: "%s" deleted success !', $news->name)]);
    }



    public function editNews($id)
    {
        $news = News::findOrfail($id);
        if (!$news) {
            return redirect()->back()->with([
                'message' => sprintf('The New can not found!'),
                'alert-type' => 'error'
            ]);
        }

        return  view('backend.News.update', [
            'news' =>  $news,


        ]);
    }

    public function updateNews(Request $request, $id)
    {
        $news = News::findOrfail($id);


        $image = $request->file('image');

        if ($image && $image->isValid()) {
            $path = $image->storeAs('news', basename($news->image), 'public');
            $news->image = $path;
        }

        $news->name = $request->input('name');
        $news->description = $request->input('description');

        $news->save();
        if ($news->save()) {
            return redirect(route('admin.news'))->with([
                'message' => sprintf(' The New: "%s" edit success !', $news->name),
                'alert-type' => 'success'
            ]);
        } else {
            return redirect()->back()->with([
                'message' => sprintf(' The New: "%s" can not edit success !', $news->name),
                'alert-type' => 'error'
            ])->withInput();
        }
     }


}
