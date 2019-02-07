@extends('layouts.app')
@section('content')
    <h1>Edit Users</h1>
    <div class="col-md-3">
        <img src="/images/{{$user->photo->file}}" class="img-thumbnail" alt="">
    </div>
    <div class="col-md-9">
        <form action="{{route('users.update', $user->id)}}" method = "POST" enctype="multipart/form-data">
            @csrf
            <input name="_method" type="hidden" value="PUT">
            <div class="form-group">
                <label for="name">Name</label>
                <input value="{{$user->name}}" type="text" id="name" name="name" placeholder="Name" class="form-control">
            </div>
            <div class="form-group">
                <label for="name">Email</label>
                <input value="{{$user->email}}"  type="email" id="email" name="email" placeholder="Email" class="form-control">
            </div>
            <div class="input-group mb-3">
                <div class="input-group-append">
                    <label class="input-group-text" for="inputGroupSelect02">Role</label>
                </div>
                <select name="role_id" class="custom-select">
                    @foreach ($roles as $role)
                        <option {{$user->role->id == $role->id ? "selected" : null}} value={{$role->id}}>{{$role->name}}</option>                    
                    @endforeach
                </select>
            </div>
            <div class="input-group mb-3">
                    <div class="input-group-append">
                        <label class="input-group-text" for="inputGroupSelect02">Status</label>
                    </div>
                    <select name="is_active" class="custom-select">
                        <option {{$user->is_active == 1 ? "selected" : null}} value="1">Active</option>
                        <option {{$user->is_active == 0 ? "selected" : null}} value="0">Not Active</option>
                    </select>
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
                <div class="form-group">
                    <label for="name">Password</label>
                    <input type="password" id="password" name="password" placeholder="Password" class="form-control">
                </div>
            <input type="submit"  name="submit" placeholder="Create User" class="btn btn-primary">
        </form>
    </div>
@endsection