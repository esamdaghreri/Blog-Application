@extends('layouts.app')
@section('content')
    <h1>Media</h1>
    @if(count($photos) > 0)
<table class="table">
    <thead>
        <tr>
        <th scope="col">ID</th>
        <th scope="col">Photo</th>
        <th scope="col">Created_at</th>
        </tr>
    </thead>
    @if($photos)
        @foreach($photos as $photo)
            <tbody>
                <tr>
                    <th scope="row"><a href="{{route('media.edit', $photo->id)}}">{{$photo->id}}</a></th>
                    <td><img height="50" src="/images/{{$photo->file}}"></td>
                    <td>{{$photo->created_at->diffForHumans()}}</td>
                    {{-- <td>{{$photo->email->diffForHumans()}}</td> --}}
                    <td>
                        <form action="{{route('media.destroy', $photo->id)}}" method="POST">
                            @csrf
                            <input  type="hidden" value="DELETE" name="_method">
                            <input name="submit" type="submit" value="DELETE" class="btn btn-danger">
                        </form>
                    </td>
                </tr>
            </tbody>
        @endforeach
    @endif
    </table>
    @else
        <h1>There is not Medias available</h1>
    @endif
@endsection