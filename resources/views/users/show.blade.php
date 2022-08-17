@if(str_contains(Auth::user()->userRole->permissions, 'user-list') !== true)
    <script>window.location = "/home";</script>
@endif

@extends('layouts.app')
<html>
    <title>User Details</title>
</html>
@section('content')

    <div class="text-center m-2">
        <h1>User Details</h1>
    </div>
    <div class="d-flex justify-content-center">
        <div class="card border-primary">
            <div class="card-body">
                <div class=" py-2 border-bottom border-primary d-flex justify-content-between">
                    <h5 class="card-title mx-3">Name:- {{$user->name}}</h5>
                    <h5 class="card-title mx-3">ID:- {{$user->id}}</h5>
                </div>
                <div class="text-center p-3">
                    <h5 class="card-text">Email:- {{$user->email}}</h5>
                    <h5 class="card-text">Role:- {{$user->userRole->name}}</h5>
                    <h5 class="card-text">Created At:- {{$user->created_at->format('Y-m-d')}}</h5>
                    <h5 class="card-text">Updated At:- {{$user->updated_at->format('Y-m-d')}}</h5>
                    <a class="d-inline-block my-2  btn btn-primary" href="{{route('users.index')}}" class="card-link">Return to Users List</a>
                </div>
                
            </div>
        </div>
    </div>


@endsection