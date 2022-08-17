@if(str_contains(Auth::user()->userRole->permissions, 'movie-create') !== true)
    <script>window.location = "/home";</script>
@endif
@extends('layouts.app')
<html>
    <title>Create Movie</title>
</html>
<style>
    textarea {
        resize: none !important;
    }
</style>
@section('content')
    <h1>Create New Movie</h1>
    <a href="{{route('movies.index')}}" class="btn btn-primary py-2 px-3 mt-3 mb-4">Back to Movies List</a>
    <form method="POST" action="{{route('movies.store')}}">
        @csrf
        <div class="mb-3">
            <label class="form-label">Name</label>
            <input required type="text" name="name" class="form-control">

            <label class="form-label">Type</label>
            <input required type="text" name="type" class="form-control">

            <label class="form-label">Rating</label>
            <input required type="number" name="rating" min=0 max=10 step="0.01" class="form-control">

            <label class="form-label">Description</label>
            {{-- <input required type="text" name="description" class="form-control"> --}}
            <textarea class="form-control" required name="description" id="" cols="30" rows="5"></textarea>
        </div>
        <div class="text-center">
            <button type="submit" class="btn btn-success">Submit Form</button>
        </div>
        
    </form>
@endsection