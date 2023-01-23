<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\Http\Request;
use DB;
class ZenBlogController extends Controller
{
    public function index(){
        $blogs=DB::table('blogs')->join('categories','blogs.category_id', 'categories.id')
            ->select('blogs.*', 'categories.category_name')
            ->where('blogs.status',1)
//          ->where('blog_type','popular')
                //->skip(1)
//            ->take(2)
            ->get();
           return view('frontEnd.home.home',compact('blogs'));
    }
    public function blog($slug){

        $blog=DB::table('blogs')->join('categories','blogs.category_id', 'categories.id')
            ->join('authors','blogs.author_id', 'authors.id')
            ->select('blogs.*', 'categories.category_name','authors.author_name')
            ->where('blogs.slug',$slug)
            ->first();
        $catId=$blog->category_id;
        $relatedBlogs=DB::table('blogs')->join('categories','blogs.category_id', 'categories.id')
            ->join('authors','blogs.author_id', 'authors.id')
            ->select('blogs.*', 'categories.category_name','authors.author_name')
            ->where('blogs.status',1)
            ->where('category_id',$catId)
            ->get();
        return view('frontEnd.blog.blog-details',compact('blog','relatedBlogs'));
    }
    public function about(){
        return view('frontEnd.about.about');
    }
    public function contact(){
        return view('frontEnd.contact.contact');
    }
    public function categoryWiseBlogs($catId){
        $blogsByCat=DB::table('blogs')->join('categories','blogs.category_id','categories.id')
            ->join('authors','blogs.author_id','authors.id')
            ->select('blogs.*', 'categories.category_name','authors.author_name')
            ->where('blogs.status',1)
            ->where('category_id',$catId)
            ->get();
            return view('frontEnd.categories.category',[
                'blogsByCats'=>$blogsByCat,
            ]);

//        if($blogsByCat!=null){
//            return view('frontEnd.categories.category',[
//                'blogsByCats'=>$blogsByCat,
//            ]);
//        }else{
//            return view('frontEnd.error.404');
//        }

    }
}
