@extends('layouts.app')
@section('content')
    <h1>Create Users</h1>
    <form action="{{route('users.store')}}" method = "POST">
        @csrf
        <div class="form-group">
            <label for="name">Name</label>
            <input type="text" id="name" name="name" placeholder="Name" class="form-control">
        </div>
        <div class="form-group">
            <label for="name">Email</label>
            <input type="email" id="email" name="email" placeholder="Email" class="form-control">
        </div>
        <div class="form-group">
            <label for="role">Role</label>
            <input type="text" id="role" name="role" placeholder="Role" class="form-control">
        </div>
        <div class="form-group">
            <label for="name">Status</label>
            <input type="text" id="status" name="status" placeholder="Status" class="form-control">
        </div>
        <input type="submit"  name="submit" placeholder="Create User" class="btn btn-primary">
    </form>
@endsection