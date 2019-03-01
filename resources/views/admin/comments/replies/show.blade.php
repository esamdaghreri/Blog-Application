@extends('layouts.admin')
@section('content')
    <h1 class="text-center">Replies</h1>
    @if(count($replies) > 0)
<table class="table">
    <thead>
        <tr>
        <th scope="col">ID</th>
        <th scope="col">Author</th>
        <th scope="col">Email</th>
        <th scope="col">body</th>
        <th scope="col">Created_at</th>
        <th scope="col">View Comment</th>
        </tr>
    </thead>
    @if(count($replies) > 0)
        @foreach($replies as $reply)
            <tbody>
                <tr>
                    <td>{{$reply->id}}</td>
                    <td>{{$reply->author}}</td>
                    <td>{{$reply->email}}</td>
                    <td>{{$reply->body}}</td>
                    <td>{{$reply->created_at->diffForHumans()}}</td>
                    <td><a href="{{route('home.post', $reply->comment->post->slug)}}">View Post</a></td>
                    <td>
                        @if($reply->is_active == 1)
                            <form action="{{route('reply.update', $reply->id)}}" method="POST">
                                @csrf
                                <input type="hidden" name="_method" value="PUT">
                                <input type="hidden" name="is_active" value="0">
                                <input type="submit" class="btn btn-primary" name="submit" value="Un-approve">
                            </form>
                        @else
                            <form action="{{route('reply.update', $reply->id)}}" method="POST">
                                @csrf
                                <input type="hidden" name="_method" value="PUT">
                                <input type="hidden" name="is_active" value="1">
                                <input type="submit" class="btn btn-success" name="submit" value="Approve">
                            </form>
                        @endif  
                    </td>
                    <td>
                        <form action="{{route('reply.destroy', $reply->id)}}" method="POST">
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
        <h1>There is no replies available</h1>
    @endif
@endsection