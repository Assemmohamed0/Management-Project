@if(str_contains(Auth::user()->userRole->permissions, 'movie-list') !== true)
    <script>window.location = "/home";</script>
@endif
@extends('layouts.app')
<html>
    <title>Movie Details</title>
</html>
@section('content')
    <div class="text-center m-2">
        <h1>Movie Details</h1>
    </div>
    <div class="d-flex justify-content-center">
        <div class="card border-primary">
            <div class="card-body">
                <div class=" py-2 border-bottom border-primary d-flex justify-content-between">
                    <h5 class="card-title mx-3">Name:- {{$movie->name}}</h5>
                    <h5 class="card-title mx-3">ID:- {{$movie->id}}</h5>
                </div>
                <div class="text-center p-3">
                    <h5 class="card-text">Type:- {{$movie->type}}</h5>
                    <h5 class="card-text">Rating:- {{$movie->rating}} <i class="fa-solid fa-star text-warning"></i></h5>
                    <h5 class="card-text">Created At:- {{$movie->created_at}}</h5>
                    <h5 class="card-text">Description:- <span class="text-muted">{{$movie->description}}</span></h5>
                    <a class="d-inline-block my-2  btn btn-primary" href="{{route('movies.index')}}" class="card-link">Return to Movies List</a>
                </div>
            </div>
        </div>
    </div>


  @endsection