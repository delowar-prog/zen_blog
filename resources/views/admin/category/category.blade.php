@extends('admin.master')
@section('content')
    <div class="row">
        <div class="col-xl-9 mx-auto">
            <hr/>
            <div class="card">
                <div class="card-body">
                    <form action="{{route('category.create')}}" method="post">
                    @csrf
                    <div class="border p-4 rounded">
                        <div class="card-title d-flex align-items-center">
                            <h5 class="mb-0">Add Category</h5>
                            <h6 style="color:darkred; margin-left:50px;">{{session('message')}}</h6>
                        </div>
                        <hr/>
                        <div class="row mb-3">
                            <label for="inputEnterYourName" class="col-sm-3 col-form-label">Category Name</label>
                            <div class="col-sm-9">
                                <input type="text" name="category_name" class="form-control" id="inputEnterYourName" placeholder="Enter Category Name">
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
    <div class="row">
        <div class="col-xl-9 mx-auto">
            <hr/>
            <div class="card">
                <div class="card-body">
                    <h6 style="color:darkred; margin-left:50px;">{{session('del_message')}}</h6>
                  <table class="table table-striped table-bordered table-hover">
                      <tr>
                          <th>sl</th>
                          <th>Category Name</th>
                          <th>Status</th>
                          <th colspan="2">Action</th>
                      </tr>
                      @php $i=1 @endphp
                      @foreach($categories as $category)
                      <tr>
                          <td>{{$i++}}</td>
                          <td>{{$category->category_name}}</td>
                          <td>{{$category->status==1?'published':'unpublished'}}</td>
                          <td width="10">
                              <a href="{{route('edit.category',['id'=>$category->id])}}" class="btn btn-primary">Edit</a>
{{--                              <a href=""></a>--}}
                          </td>
                          <td width="10">
                              <form action="{{route('delete')}}" method="post">
                                  @csrf
                                  <input type="hidden" name="cat_id" value="{{$category->id}}">
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

