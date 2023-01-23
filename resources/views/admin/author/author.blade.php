@extends('admin.master')
@section('content')
    <div class="row">
        <div class="col-xl-9 mx-auto">
            <hr/>
            <div class="card">
                <div class="card-body">
                    <form action="{{route('store.author')}}" method="post">
                        @csrf
                        <div class="border p-4 rounded">
                            <div class="card-title d-flex align-items-center">
                                <h5 class="mb-0">Add Author</h5>
                                <h6 style="color:darkred; margin-left:50px;">{{session('message')}}</h6>
                            </div>
                            <hr/>
                            <div class="row mb-3">
                                <label for="inputEnterYourName" class="col-sm-3 col-form-label">Author Name</label>
                                <div class="col-sm-9">
                                    <input type="text" name="author_name" class="form-control" id="inputEnterYourName" placeholder="Enter Author Name">
                                </div>
                            </div>
                            <div class="row">
                                <label class="col-sm-3 col-form-label"></label>
                                <div class="col-sm-9">
                                    <button type="submit" class="btn btn-primary px-5">Save Author</button>
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-xl-9 mx-auto">
            <hr/>
            <div class="card">
                <div class="card-body">
                    <h6 style="color:darkred; margin-left:50px;"></h6>
                    <table class="table table-striped table-bordered table-hover">
                        <tr>
                            <th>sl</th>
                            <th>Author Name</th>
                            <th colspan="2">Action</th>
                        </tr>
                        @php $i=1 @endphp
                        @foreach($authors as $author)
                            <tr>
                                <td>{{$i++}}</td>
                                <td>{{$author->author_name}}</td>
                                <td width="10">
                                    <a href="{{route('edit.author',['id'=>$author->id])}}" class="btn btn-primary">Edit</a>
                                    {{--                              <a href=""></a>--}}
                                </td>
                                <td width="10">
                                    <form action="" method="post">
                                        @csrf
                                        <input type="hidden" name="cat_id" value="">
                                        <button type="submit" class="btn btn-danger">Delete</button>
                                    </form>
                                </td>
                            </tr>
                        @endforeach
                    </table>
                </div>
            </div>
        </div>
    </div>
@endsection


