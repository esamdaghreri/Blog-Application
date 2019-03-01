@extends('layouts.admin')
@section('content')
 
    <h1>Posts</h1>
    @if(count($posts) > 0)
<table class="table">
    <thead>
        <tr>
        <th scope="col">ID</th>
        <th scope="col">Photo</th>
        <th scope="col">Owner</th>
        <th scope="col">Categories</th>
        <th scope="col">Title</th>
        <th scope="col">Body</th>
        <th scope="col">Post link</th>
        <th scope="col">Comments</th>
        <th scope="col">Created_at</th>
        <th scope="col">Updated_at</th>
        </tr>
    </thead>
    @if($posts)
        @foreach($posts as $post)
            <tbody>
                <tr>
                    <th scope="row"><a href="{{route('posts.edit', $post->id)}}">{{$post->id}}</a></th>
                    <td><img height="50" src="{{ isset($post->photo->file) ?  "/images/".$post->photo->file   : "https://via.placeholder.com/750x200" }}"></td>
                    <td>{{$post->user->name}}</td>
                    @if(count($post->categories) > 0)
                        <td>
                            @foreach($post->categories as $category)
                                -{{$category->name}}-
                            @endforeach
                        </td>
                    @else
                        <td>Uncategorized</td>
                    @endif
                    <td>{{str_limit($post->title, 12)}}</td>
                    <td>{!! str_limit($post->body, 12)!!}</td>
                    <td><a href="{{route('home.post', $post->slug)}}">View post</a></td>
                    <td><a href="{{route('comments.show', $post->id)}}">Comments</a></td>
                    <td>{{$post->created_at->diffForHumans()}}</td>
                    <td>{{$post->updated_at->diffForHumans()}}</td>
                </tr>
            </tbody>
        @endforeach
        
    @endif
    </table>
    @else
        <h1>There is not Post available</h1>
    @endif
    <div class="row d-flex justify-content-center">
        {{ $posts->links()}}
    </div>
@endsection