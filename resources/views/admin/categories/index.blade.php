@extends('layouts.app')
@section('content')
    <h1 class="text-center">Categoreis</h1>
    <hr>
    <div class="col-sm-6 float-left">
        <h3> Create Categories</h3>
        <form action="{{route('categories.store')}}" method = "POST" enctype="multipart/form-data">
            @csrf
            <div class="form-group">
                <label for="title">Category</label>
                <input type="text" id="category" name="category" placeholder="category" class="form-control">
            </div>
            <input type="submit" name="submit" value="Create Category" class="btn btn-primary">
        </form>
    </div>
    <div class="col-sm-6 float-left">
        @if(count($categories) > 0)
            <table class="table">
                <thead>
                    <tr>
                    <th scope="col">ID</th>
                    <th scope="col">Name</th>
                    <th scope="col">Created_at</th>
                    <th scope="col">Updated_at</th>
                    </tr>
                </thead>
                @if($categories)
                    @foreach($categories as $category)
                        <tbody>
                            <tr>
                                <td>{{$category->id}}</td>
                                <th scope="row"><a href="{{route('categories.edit', $category->id)}}">{{$category->name}}</a></th>
                                <td>{{$category->created_at->diffForHumans()}}</td>
                                <td>{{$category->updated_at->diffForHumans()}}</td>
                            </tr>
                        </tbody>
                    @endforeach
                @endif
            </table>
        @else
            <h1>There is not Categories available</h1>
        @endif
    </div>
@endsection