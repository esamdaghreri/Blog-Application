@extends('layouts.admin')
@section('content')
    <h1>Create Post</h1>
    <form action="{{route('posts.store')}}" method = "POST" enctype="multipart/form-data">
        @csrf
        <div class="form-group">
            <label for="title">Title</label>
            <input type="text" id="title" name="title" placeholder="Title" class="form-control">
        </div>
        <div class="form-group">
            <label for="name">Description</label>
            <textarea class="ckeditor" name="body" cols="70" rows="5" class="form-control" placeholder="Description"></textarea>
        </div>
        <div class="form-group">
            <label for="name">Categories</label>
            <div class="form-check">
                @foreach ($categories as $category)
                    <input class="form-check-input" type="checkbox" name="category[]" id="category" value="{{$category->id}}">
                    <label class="form-check-label" for="category">
                        {{$category->name}} 
                    </label>
                    <br>
                @endforeach
            </div>              
        </div>
        <div class="input-group mb-3">
            <div class="input-group-prepend">
                <span class="input-group-text" id="inputGroupFileAddon01">Upload</span>
            </div>
            <div class="custom-file">
                <input type="file" name="photo_id" class="custom-file-input" id="inputGroupFile01" aria-describedby="inputGroupFileAddon01">
                <label class="custom-file-label" for="inputGroupFile01">Choose Photo</label>
            </div>
        </div>
        <input type="submit" name="submit" value="Create Post" class="btn btn-primary">
    </form>
@endsection

@section('scripts')
    @include('partials.ckeditor') 
@endsection