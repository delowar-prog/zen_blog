<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    use HasFactory;
    private static $category;
    public static function saveCategory($request){
        Self::$category=new Category();
        Self::$category->category_name=$request->category_name;
        Self::$category->save();
    }
    public static function updateCategory($request){
        Self::$category=Category::find($request->cat_id);
        Self::$category->category_name=$request->category_name;
        Self::$category->status=$request->status;
        Self::$category->save();
    }
}
