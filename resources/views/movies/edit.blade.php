@if(str_contains(Auth::user()->userRole->permissions, 'movie-edit') !== true)
    <script>window.location = "/home";</script>
@endif
@extends('layouts.app')
<html>
    <title>Update Movie</title>
</html>
@section('content')
    <h1>Update Movie</h1>
    <a href="{{route('movies.index')}}" class="btn btn-primary py-2 px-3 mt-3 mb-4">Back to Movies List</a>
    <form method="POST" action="{{route('movies.update',['movie'=>$movie->id])}}">
        @csrf
        @method('PUT')
        <div class="mb-3">
            {{-- <input type="hidden" name='id' value="{{$movie->id}}"> --}}
            <label class="form-label">Name</label>
            <input required type="text" value="{{$movie->name}}" name="name" class="form-control">

            <label class="form-label">Type</label>
            <input required type="text" value="{{$movie->type}}" name="type" class="form-control">

            <label class="form-label">Rating</label>
            <input required type="number" step="0.01" min=0 max=10 value="{{$movie->rating}}" name="rating" class="form-control">
        
            <label class="form-label">Description</label>
            {{-- <input required type="text" name="description" class="form-control"> --}}
            <textarea class="form-control" required name="description" id="" cols="30" rows="5">{{$movie->description}}</textarea>
        </div>
        <div class=" text-center">
            <button type="submit" class="btn btn-success">Submit Changes</button>
        </div>
    </form>
@endsection