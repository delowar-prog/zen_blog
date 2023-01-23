@extends('admin.master')
@section('content')
    <div class="row">
        <div class="col-xl-9 mx-auto">
            <hr/>
            <div class="card">
                <div class="card-body">
                    <form action="{{route('update.blog')}}" method="post" enctype="multipart/form-data">
                        @csrf
                        <input type="hidden" name="blog_id" value="{{$blog->id}}">
                        <div class="border p-4 rounded">
                            <div class="card-title d-flex align-items-center">
                                <h5 class="mb-0">Add Blog</h5>
                                <h6 style="color:darkred; margin-left:50px;">{{session('message')}}</h6>
                            </div>
                            <hr/>
                            <div class="row mb-3">
                                <label for="inputEnterYourName" class="col-sm-3 col-form-label">Category</label>
                                <div class="col-sm-9">
                                    <select name="category_id" id="" class="form-control">
                                        @foreach($categories as $category)
                                            <option
                                                @if ($blog->category_id==$category->id) selected @endif value="{{$category->id}}">{{$category->category_name}}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                            <div class="row mb-3">
                                <label for="author" class="col-sm-3 col-form-label">Author</label>
                                <div class="col-sm-9">
                                    <select name="author_id" id="author" class="form-control">
                                        @foreach($authors as $author)
                                            <option
                                                @if ($blog->author_id==$author->id) selected @endif value="{{$author->id}}">{{$author->author_name}}
                                            </option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                            <div class="row mb-3">
                                <label for="inputEnterYourName" class="col-sm-3 col-form-label">Blog Title</label>
                                <div class="col-sm-9">
                                    <input type="text" name="title" class="form-control" id="inputEnterYourName" value="{{$blog->title}}">
                                </div>
                            </div>
                            <div class="row mb-3">
                                <label for="inputEnterYourName" class="col-sm-3 col-form-label">Slug</label>
                                <div class="col-sm-9">
                                    <input type="text" name="slug" class="form-control" id="inputEnterYourName" value="{{$blog->slug}}">
                                </div>
                            </div>
                            <div class="row mb-3">
                                <label for="description" class="col-sm-3 col-form-label">Description</label>
                                <div class="col-sm-9">
                                    <textarea name="description" id="description" cols="10" rows="5" class="form-control">{{$blog->description}}</textarea>
                                </div>
                            </div>
                            <div class="row mb-3">
                                <label for="image" class="col-sm-3 col-form-label">Image</label>
                                <div class="col-sm-9">
                                    <img src="{{asset($blog->image)}}"  width="80" alt="" class="mb-2">
                                    <input type="file" name="image" id="image" class="form-control">
                                </div>
                            </div>
                            <div class="row mb-3">
                                <label for="date" class="col-sm-3 col-form-label">Date</label>
                                <div class="col-sm-9">
                                    <input type="date" name="date" id="date" value="{{$blog->date}}">
                                </div>
                            </div>
                            <div class="row mb-3">
                                <label for="blogType" class="col-sm-3 col-form-label">Blog Type</label>
                                <div class="col-sm-9">
                                    <select name="blog_type" id="blogType" class="form-control">
                                        <option @if ($blog->blog_type==1) selected @endif value="1">Popular</option>
                                        <option @if ($blog->blog_type==2) selected @endif value="2">Treand</option>
                                        <option @if ($blog->blog_type==3) selected @endif value="3">Official</option>
                                    </select>
                                </div>
                            </div>
                            <div class="row mb-3">
                                <label for="status" class="col-sm-3 col-form-label">Status</label>
                                <div class="col-sm-9">
                                    <input type="radio" name="status" @if ($blog->status==1) checked @endif value="1" id="status"> Published &nbsp;
                                    <input type="radio" name="status" @if ($blog->status==0) checked @endif value="0" id="status"> Unpublished
                                </div>
                            </div>
                            <div class="row">
                                <label class="col-sm-3 col-form-label"></label>
                                <div class="col-sm-9">
                                    <button type="submit" class="btn btn-primary px-5">Save Category</button>
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection



