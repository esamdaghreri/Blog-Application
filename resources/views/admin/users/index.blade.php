@extends('layouts.app')
@section('content')
    <h1>Users</h1>
    @if(count($users) > 0)
<table class="table">
    <thead>
        <tr>
        <th scope="col">ID</th>
        <th scope="col">Name</th>
        <th scope="col">Email</th>
        <th scope="col">Role</th>
        <th scope="col">Status</th>
        <th scope="col">Created_at</th>
        <th scope="col">Updated_at</th>
        </tr>
    </thead>
    @if($users)
        @foreach($users as $user)
            <tbody>
                <tr>
                    <th scope="row">{{$user->id}}</th>
                    <td>{{$user->name}}</td>
                    <td>{{$user->email}}</td>
                    <td>{{$user->role->name}}</td>
                    <td>{{$user->is_active == 1 ? 'Active' : 'Not Active'}}</td>
                    <td>{{$user->created_at->diffForHumans()}}</td>
                    <td>{{$user->updated_at->diffForHumans()}}</td>
                </tr>
            </tbody>
        @endforeach
    @endif
    </table>
    @else
        <h1>There is not users available</h1>
    @endif
@endsection