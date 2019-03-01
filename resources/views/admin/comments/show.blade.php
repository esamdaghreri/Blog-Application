@extends('layouts.admin')
@section('content')
    <h1 class="text-center">Comments</h1>
    @if(count($comments) > 0)
<table class="table">
    <thead>
        <tr>
        <th scope="col">ID</th>
        <th scope="col">Author</th>
        <th scope="col">Email</th>
        <th scope="col">body</th>
        <th scope="col">Created_at</th>
        <th scope="col">View Post</th>
        <th scope="col">View Replies</th>
        </tr>   
    </thead>
    @if(count($comments) > 0)
        @foreach($comments as $comment)
            <tbody>
                <tr>
                    <td>{{$comment->id}}</td>
                    <td>{{$comment->author}}</td>
                    <td>{{$comment->email}}</td>
                    <td>{{$comment->body}}</td>
                    <td>{{$comment->created_at->diffForHumans()}}</td>
                    <td><a href="{{route('home.post', $comment->post->slug)}}">View Post</a></td>
                    <td><a href="{{route('reply.show', $comment->id)}}">View Replies</a></td>
                    <td>
                        @if($comment->is_active == 1)
                            <form action="{{route('comments.update', $comment->id)}}" method="POST">
                                @csrf
                                <input type="hidden" name="_method" value="PUT">
                                <input type="hidden" name="is_active" value="0">
                                <input type="submit" class="btn btn-primary" name="submit" value="Un-approve">
                            </form>
                        @else
                            <form action="{{route('comments.update', $comment->id)}}" method="POST">
                                @csrf
                                <input type="hidden" name="_method" value="PUT">
                                <input type="hidden" name="is_active" value="1">
                                <input type="submit" class="btn btn-success" name="submit" value="Approve">
                            </form>
                        @endif  
                    </td>
                    <td>
                        <form action="{{route('comments.destroy', $comment->id)}}" method="POST">
                            @csrf
                            <input type="hidden" name="_method" value="DELETE">
                            <input type="submit" class="btn btn-danger" name="submit" value="DELETE">
                        </form>
                    </td>
                </tr>
            </tbody>
        @endforeach
    @endif
    </table>
    @else
        <h1>There is no Comments available</h1>
    @endif
@endsection