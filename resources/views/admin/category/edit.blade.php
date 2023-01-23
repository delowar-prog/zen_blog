@extends('admin.master')
@section('content')
    <div class="row">
        <div class="col-xl-9 mx-auto">
            <hr/>
            <div class="card">
                <div class="card-body">
                    <form action="{{route('update.category')}}" method="post">
                        @csrf
                        <input type="hidden" name="cat_id" value="{{$category->id}}">
                        <div class="border p-4 rounded">
                            <div class="card-title d-flex align-items-center">
                                <h5 class="mb-0">Add Category</h5>
                            </div>
                            <hr/>
                            <div class="row mb-3">
                                <label for="inputEnterYourName" class="col-sm-3 col-form-label">Category Name</label>
                                <div class="col-sm-9">
                                    <input type="text" value="{{$category->category_name}}" name="category_name" class="form-control" id="inputEnterYourName" placeholder="Enter Category Name">
                                </div>
                            </div>
                            <div class="row mb-3">
                                <label for="inputEnterStatus" class="col-sm-3 col-form-label">Category Status</label>
                                <div class="col-sm-9">
                                    <input type="radio" @if ($category->status==1) checked @endif value="1" name="status" id="inputEnterStatus"> Pbulished <br>
                                    <input type="radio" @if ($category->status==0) checked @endif value="0" name="status" id="inputEnterStatus"> Unpbulished
                                </div>
                            </div>
                            <div class="row">
                                <label class="col-sm-3 col-form-label"></label>
                                <div class="col-sm-9">
                                    <button type="submit" class="btn btn-primary px-5">Update Category</button>
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

@endsection


