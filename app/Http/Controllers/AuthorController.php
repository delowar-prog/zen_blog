<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Author;
class AuthorController extends Controller
{
    public function index(){
        return view('admin.author.author',[
            'authors'=>Author::all()
        ]);
    }
    public function store(Request $request){
        Author::saveAuthor($request);
        return back()->with('message','Author Added Successfully..');
    }

    public function edit($id){
        return view('admin.author.edit',[
            'author'=>Author::find($id)
        ]);
    }
    public function update(Request $request){
        Author::updateAuthor($request);
        return redirect()->route('author')->with('message','Author Updated Successfully..');
    }
}
