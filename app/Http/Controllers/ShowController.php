<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\Article;

class ShowController extends Controller
{
    public function show(){
        $data=Article::all();
        return view('home',compact('data'));
    }

    public function edit($id)
    {
        $data=Article::find($id);
        return view('edit',compact('data'));
    }

    public function update(Request $request,$id)
    {
        $data=Article::find($id);
        $data->title=$request->input('title');
        $data->body=$request->input('body');
        $data->update();
        return redirect('home')->with('status',"Data updated successfully");
    }

    public function delete($id)
    {
        $data=Article::find($id);
        $data->delete();
        return redirect('home')->with('status','data Successfully deleted');
    }

    public function view(){
        $data=Article::all();
        return view('view',compact('data'));
    }

}


