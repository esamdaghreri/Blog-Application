@extends('layouts.app')
@section('content')
    <h1>Users</h1>
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
        <th scope="col">Created_at</th>
        <th scope="col">Updated_at</th>
        </tr>
    </thead>
    @if($posts)
        @foreach($posts as $post)
            <tbody>
                <tr>
                    <th scope="row"><a href="{{route('posts.edit', $post->id)}}">{{$post->id}}</a></th>
                    <td><img height="50" src="/images/{{$post->photo->file}}"></td>
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
                    <td>{{str_limit($post->body, 12)}}</td>
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
@endsection