@extends('layouts.app')
@section('content')
    <h1>Edit Post</h1>
    <form action="{{route('posts.update', $post->id)}}" method = "POST" enctype="multipart/form-data">
        @csrf
        <input type="hidden" name="_method" value="PUT">
        <div class="form-group">
            <label for="title">Title</label>
            <input value="{{$post->title}}" type="text" id="title" name="title" placeholder="Title" class="form-control">
        </div>
        <div class="form-group">
            <label for="name">Description</label>
            <textarea name="body" cols="70" rows="5" class="form-control" placeholder="Description">{{$post->body}}</textarea>
        </div>
        <div class="form-group">
            <label for="name">Categories</label>
            <div class="form-check">
                @foreach ($categories as $category)
                    <input {{$post->categories->contains($category->id) ? 'checked' : ''}} class="form-check-input" type="checkbox" name="category[]" id="category" value="{{$category->id}}">
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
        <input type="submit" name="submit" value="Edit Post" class="btn btn-primary">
    </form>
@endsection