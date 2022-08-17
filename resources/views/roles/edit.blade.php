@if(str_contains(Auth::user()->userRole->permissions, 'role-edit') !== true)
    <script>window.location = "/home";</script>
@endif
@extends('layouts.app')
<html>
    <title>Update Role</title>
</html>
@section('content')
    <h1>Update Role</h1>
    <a href="{{route('roles.index')}}" class="btn btn-primary py-2 px-3 mt-3 mb-4">Back to Roles List</a>

    <form method="POST" action="{{route('roles.update',['role'=>$role->id])}}">
        @csrf
        @method('PUT')
        <div class="mb-3">
            <label for="form-control" class="form-label">Name</label>
            <input required type="text" name="name" value="{{$role->name}}" class="form-control" id="name">

            <label for="form-control" class="form-label">ID</label>
            <input required type="text" name="id" value="{{$role->id}}" class="form-control" id="ID">

            <div class="form-check">
                <input  type="checkbox" name="permissions[]" class="form-check-input" id="user-list" value="user-list"
                {{str_contains($role->permissions, 'user-list')==true ? 'checked' : ''}}
                >
                <label for="user-list" class="form-check-label">user-list</label>
            </div>
            <div class="form-check">
                <input  type="checkbox" name="permissions[]" class="form-check-input" id="user-create" value="user-create" {{str_contains($role->permissions, 'user-create')==true ? 'checked' : ''}}>
                <label for="user-create" class="form-check-label">user-create</label>
            </div>
            <div class="form-check">
                <input  type="checkbox" name="permissions[]" class="form-check-input" id="user-edit" value="user-edit"{{str_contains($role->permissions, 'user-edit')==true ? 'checked' : ''}} >
                <label for="user-edit" class="form-check-label">user-edit</label>
            </div>
            <div class="form-check">
                <input  type="checkbox" name="permissions[]" class="form-check-input" id="user-delete" value="user-delete" {{str_contains($role->permissions, 'user-delete')==true ? 'checked' : ''}} >
                <label for="user-delete" class="form-check-label">user-delete</label>
            </div>
            <div class="form-check">
                <input  type="checkbox" name="permissions[]" class="form-check-input" id="role-list" value="role-list" {{str_contains($role->permissions, 'role-list')==true ? 'checked' : ''}} >
                <label for="role-list" class="form-check-label">role-list</label>
            </div>
            <div class="form-check">
                <input  type="checkbox" name="permissions[]" class="form-check-input" id="role-create" value="role-create" {{str_contains($role->permissions, 'role-create')==true ? 'checked' : ''}}>
                <label for="role-create" class="form-check-label">role-create</label>
            </div>
            <div class="form-check">
                <input  type="checkbox" name="permissions[]" class="form-check-input" id="role-edit" value="role-edit" {{str_contains($role->permissions, 'role-edit')==true ? 'checked' : ''}}>
                <label for="role-edit" class="form-check-label">role-edit</label>
            </div>
            <div class="form-check">
                <input  type="checkbox" name="permissions[]" class="form-check-input" id="role-delete" value="role-delete" {{str_contains($role->permissions, 'role-delete')==true ? 'checked' : ''}}>
                <label for="role-delete" class="form-check-label">role-delete</label>
            </div>
            <div class="form-check">
                <input  type="checkbox" name="permissions[]" class="form-check-input" id="movie-list" value="movie-list" {{str_contains($role->permissions, 'movie-list')==true ? 'checked' : ''}}>
                <label for="movie-list" class="form-check-label">movie-list</label>
            </div>
            <div class="form-check">
                <input  type="checkbox" name="permissions[]" class="form-check-input" id="movie-create" value="movie-create" {{str_contains($role->permissions, 'movie-create')==true ? 'checked' : ''}}>
                <label for="movie-create" class="form-check-label">movie-create</label>
            </div>
            <div class="form-check">
                <input  type="checkbox" name="permissions[]" class="form-check-input" id="movie-edit" value="movie-edit" {{str_contains($role->permissions, 'movie-edit')==true ? 'checked' : ''}}>
                <label for="movie-edit" class="form-check-label">movie-edit</label>
            </div>
            <div class="form-check">
                <input  type="checkbox" name="permissions[]" class="form-check-input" id="movie-delete" value="movie-delete" {{str_contains($role->permissions, 'movie-delete')==true ? 'checked' : ''}}>
                <label for="movie-delete" class="form-check-label">movie-delete</label>
            </div>
            

        </div>
        <div class=" text-center">
            <button type="submit" class="btn btn-success">Submit Changes</button>
        </div>
    </form>
@endsection