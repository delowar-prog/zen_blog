@extends('admin.master')
@section('content')
    <div class="row">
        <div class="col-xl-12 mx-auto">
            <hr/>
            <div class="card">
                <div class="card-body">
                    <h5>Manage Blog</h5>
                    <h6 style="color:darkred; margin-left:50px;">{{session('message')}}</h6>
                    <table id="example" class="table table-striped table-bordered table-hover">
                        <thead>
                        <tr>
                            <th>sl</th>
                            <th>Category Name</th>
                            <th>Author Name</th>
                            <th>Title</th>
                            <th>Slug</th>
                            <th>Description</th>
                            <th>Image</th>
                            <th>Date</th>
                            <th>Blog Type</th>
                            <th>Status</th>
                            <th>Action</th>
                        </tr>
                        </thead>
                        @php $i=1; @endphp
                        <tbody>
                        @foreach($blogs as $blog)
                            <tr>
                                <td>{{$i++}}</td>
                                <td>{{$blog->category_name}}</td>
                                <td>{{$blog->author_name}}</td>
                                <td>{{$blog->title}}</td>
                                <td>{{$blog->slug}}</td>
                                <td>{{substr($blog->description,0,30)}}</td>
                                <td><img src="{{asset($blog->image)}}" class="img-fluid" alt=""></td>
                                <td>{{$blog->date}}</td>
                                <td>{{$blog->blog_type}}</td>
                                <td>{{$blog->status==1?'published':'unpublished'}}</td>
                                <td>
                                    <a href="{{route('edit.blog',['id'=>$blog->id])}}" class="btn btn-primary btn-sm" data-bs-toggle="tooltip" data-bs-placement="bottom" title="" data-bs-original-title="Edit info" aria-label="Edit"><i class="bi bi-pencil-fill"></i></a>
                                    <form action="{{route('delete.blog')}}" method="post" id="deleteBlog">
                                        @csrf
                                        <input type="hidden" name="blog_id" value="{{$blog->id}}">
                                        <button type="submit" class="btn btn-danger btn-sm" data-bs-toggle="tooltip" data-bs-placement="bottom" title="" data-bs-original-title="Delete" aria-label="Delete"><i class="bi bi-trash-fill"></i></button>
                                    </form>
                                    @if($blog->status==1)
                                    <a href="{{route('status',['id'=>$blog->id])}}" class="btn btn-warning btn-sm">Unpublished</a>
                                    @else
                                    <a href="{{route('status',['id'=>$blog->id])}}" class="btn btn-success btn-sm">Published</a>
                                    @endif
                                </td>
{{--                                <td width="10">--}}
{{--                                    <a href="{{route('edit.category',['id'=>$category->id])}}" class="btn btn-primary">Edit</a>--}}
{{--                                    --}}{{--                              <a href=""></a>--}}
{{--                                </td>--}}
{{--                                <td width="10">--}}
{{--                                    <form action="{{route('delete')}}" method="post">--}}
{{--                                        @csrf--}}
{{--                                        <input type="hidden" name="cat_id" value="{{$category->id}}">--}}
{{--                                        <button type="submit" class="btn btn-danger">Delete</button>--}}
{{--                                    </form>--}}
{{--                                </td>--}}

                            </tr>
                        @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
@endsection


