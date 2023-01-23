<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    public $category;
    public function index(){
        return view('admin.category.category',
        ['categories'=>Category::all()]);
    }
    public function store(Request $request){
        Category::saveCategory($request);
       return back()->with('message','Category Added Successfully..');
    }
    public function edit($id){
        return view('admin.category.edit',
            ['category'=>Category::find($id)]);
    }
    public function update(Request $request){
        Category::updateCategory($request);
        return redirect()->route('category')->with('message','Category Updated Successfully..');
    }
    public function delete(Request $request){
       $delete= Category::find($request->cat_id)->delete();
        return redirect()->route('category')->with('del_message','Category Deleted Successfully..');
    }
}
