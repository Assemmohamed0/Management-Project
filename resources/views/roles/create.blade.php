@if(str_contains(Auth::user()->userRole->permissions, 'role-create') !== true)
    <script>window.location = "/home";</script>
@endif
@extends('layouts.app')
<html>
    <title>Create Role</title>
</html>
@section('content')
    <h1>Create New Role</h1>
    <a href="{{route('roles.index')}}" class="btn btn-primary py-2 px-3 mt-3 mb-4">Back to Roles List</a>
    <form method="POST" action="{{route('roles.store')}}">
        @csrf
        <div class="mb-3">
            <label for="form-control" class="form-label">Name</label>
            <input required type="text" name="name" class="form-control" id="name">

            <label for="form-control" class="form-label">ID</label>
            <input required type="text" name="id" class="form-control" id="ID">

            <div class="form-check">
                <input  type="checkbox" name="permissions[]" class="form-check-input" id="user-list" value="user-list" >
                <label for="user-list" class="form-check-label">user-list</label>
            </div>
            <div class="form-check">
                <input  type="checkbox" name="permissions[]" class="form-check-input" id="user-create" value="user-create" >
                <label for="user-create" class="form-check-label">user-create</label>
            </div>
            <div class="form-check">
                <input  type="checkbox" name="permissions[]" class="form-check-input" id="user-edit" value="user-edit" >
                <label for="user-edit" class="form-check-label">user-edit</label>
            </div>
            <div class="form-check">
                <input  type="checkbox" name="permissions[]" class="form-check-input" id="user-delete" value="user-delete" >
                <label for="user-delete" class="form-check-label">user-delete</label>
            </div>
            <div class="form-check">
                <input  type="checkbox" name="permissions[]" class="form-check-input" id="role-list" value="role-list" >
                <label for="role-list" class="form-check-label">role-list</label>
            </div>
            <div class="form-check">
                <input  type="checkbox" name="permissions[]" class="form-check-input" id="role-create" value="role-create" >
                <label for="role-create" class="form-check-label">role-create</label>
            </div>
            <div class="form-check">
                <input  type="checkbox" name="permissions[]" class="form-check-input" id="role-edit" value="role-edit" >
                <label for="role-edit" class="form-check-label">role-edit</label>
            </div>
            <div class="form-check">
                <input  type="checkbox" name="permissions[]" class="form-check-input" id="role-delete" value="role-delete" >
                <label for="role-delete" class="form-check-label">role-delete</label>
            </div>
            <div class="form-check">
                <input  type="checkbox" name="permissions[]" class="form-check-input" id="movie-list" value="movie-list" >
                <label for="movie-list" class="form-check-label">movie-list</label>
            </div>
            <div class="form-check">
                <input  type="checkbox" name="permissions[]" class="form-check-input" id="movie-create" value="movie-create" >
                <label for="movie-create" class="form-check-label">movie-create</label>
            </div>
            <div class="form-check">
                <input  type="checkbox" name="permissions[]" class="form-check-input" id="movie-edit" value="movie-edit" >
                <label for="movie-edit" class="form-check-label">movie-edit</label>
            </div>
            <div class="form-check">
                <input  type="checkbox" name="permissions[]" class="form-check-input" id="movie-delete" value="movie-delete" >
                <label for="movie-delete" class="form-check-label">movie-delete</label>
            </div>
        </div>
        <div class="text-center">
            <button type="submit" class="btn btn-success">Submit Form</button>
        </div>
    </form>
@endsection