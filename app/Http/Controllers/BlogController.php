<?php

namespace App\Http\Controllers;

use App\Models\Author;
use App\Models\Blog;
use App\Models\Category;
use Illuminate\Http\Request;
use DB;
class BlogController extends Controller
{
    public function index(){
        $categories=Category::all();
        $authors=Author::all();
        return view('admin.blog.add_blog', compact('categories','authors'));
    }
    public function saveBlog(Request $request){
        $blog=new Blog();
        $blog->category_id=$request->category_id;
        $blog->author_id=$request->author_id;
        $blog->title=$request->title;
        $blog->slug=$this->makeSlug($request);
        $blog->description=$request->description;
        $blog->image=$this->saveUrl($request);
        $blog->date=$request->date;
        $blog->blog_type=$request->blog_type;
        $blog->status=$request->status;
        $blog->save();
        return back()->with('message','Blog Added Successfully..');
    }
    public function saveUrl($req){
        $image=$req->file('image');
        $imageName=rand().'.'.$image->getClientOriginalExtension();
        $directory='adminAsset/upload-image/blog-image/';
        $imageUrl=$directory.$imageName;
        $image->move($directory,$imageName);
        return $imageUrl;
    }
    public function makeSlug($request){
       if($request->slug){
           $str=$request->slug;
           return preg_replace('/\s+/u', '-', trim($str));
       }
       $str=$request->title;
       return preg_replace('/\s+/u', '-', trim($str));
    }
    public function manageBlog(){
       $blogs=DB::table('blogs')->join('categories', 'blogs.category_id','=','categories.id')
       ->join('authors', 'blogs.author_id','=','authors.id')
        ->select('blogs.*','categories.category_name','authors.author_name')
        ->get();
        return view('admin.blog.manage', compact('blogs'));
    }
    public function edit($id){
        $categories=Category::all();
        $authors=Author::all();
        $blog=DB::table('blogs')->join('categories', 'blogs.category_id','=','categories.id')
            ->join('authors', 'blogs.author_id','=','authors.id')
            ->select('blogs.*','categories.category_name','authors.author_name')
            ->where('blogs.id','=',$id)->first();
     return view('admin.blog.edit', compact('categories','authors','blog'));
    }
    public function update(Request $request){
        $blog=Blog::find($request->blog_id);
        $blog->category_id=$request->category_id;
        $blog->author_id=$request->author_id;
        $blog->title=$request->title;
        $blog->slug=$this->makeSlug($request);
        $blog->description=$request->description;
        if($request->file('image')){
            if($blog->image!=null){
                unlink($blog->image);
            }
            $blog->image = $this->saveUrl($request);
        }
        $blog->date=$request->date;
        $blog->blog_type=$request->blog_type;
        $blog->status=$request->status;
        $blog->save();
        return redirect()->route('manage.blog')->with('message','Blog Updated Successfully..');
    }
    public function delete(Request $request){
       Blog::find($request->blog_id)->delete();
       return redirect()->route('manage.blog')->with('message','Blog Deleted Successfully..');
    }
    public function status($id){
        $blog=Blog::find($id);
        if($blog->status==1){
           $blog->status=0;
        }else{
           $blog->status=1;
        }
        $blog->save();
        return back();
    }

}
