{{-- @if(Auth::user()->roles_id == 1)

    <script>window.location = "";</script>
    
@endif --}}
@extends('layouts.app')
<html>
    <title>Home Page</title>
</html>
<style>
    .welcome-message {
       height: 75vh; 
    }
</style>
@section('content')


    <div class="text-danger d-flex align-items-center justify-content-center welcome-message text-center">
        <h1> Welcome, <span class="text-primary">{{Auth::user()->name}},</span> your are logged in!</h1>
    </div>


@endsection
