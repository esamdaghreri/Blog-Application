@extends('layouts.admin')
@section('content')
<h1 class="text-center">Edit Categoreis</h1>
    <hr>
    <div class="col-sm-6 float-left">
        <form action="{{route('categories.update', $category->id)}}" method = "POST" enctype="multipart/form-data">
            @csrf
            <input type="hidden" name="_method" value="PUT">
            <div class="form-group">
                <label for="title">Category</label>
                <input value="{{$category->name}}" type="text" id="category" name="category" placeholder="category" class="form-control ">
            </div>
            <input type="submit" name="submit" value="Update Category" class="btn btn-primary float-left">
        </form>
        <form action="{{route('categories.destroy', $category->id)}}" method="POST">
                @csrf
                <input name="_method" type="hidden" value="DELETE">
                <input type="submit"  name="submit" value="Delete Category" class="btn btn-danger float-right">
        </form>
    </div>
    
@endsection