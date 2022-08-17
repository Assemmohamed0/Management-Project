@if(str_contains(Auth::user()->userRole->permissions, 'user-create') !== true)
    <script>window.location = "/home";</script>
@endif

@extends('layouts.app')
<html>
    <title>Create User</title>
</html>
@section('content')


    <h1>Create New User</h1>
    <a href="{{route('users.index')}}" class="btn btn-primary py-2 px-3 mt-3 mb-4">Back to Users List</a>

    <form id="create-user" action="{{route('users.store')}}" method="post">
        @csrf
        <div class="mb-3">
            <label class="form-label">Name:-</label>
            <input type="text" name="name" required class="form-control" placeholder="Name">
        </div>
        <div class="mb-3">
          <label class="form-label">Email:-</label>
          <input type="email" name="email" required class="form-control" placeholder="Email">
        </div>

        <div class="mb-3">
          <label class="form-label">Password:-</label>
          <input id="password" name="password" type="password" required class="form-control" onkeyup="checkPassword()" placeholder="Password">
        </div>
        <div class="mb-3">
            <label class="form-label">Confirm Password:-</label>
            <input id="confirm_password" type="password" required class="form-control" onkeyup="checkPassword()" placeholder="Confirm Password">
        </div>

        <div class="form-floating">
            <span class="form-label">Role:-</span>
            <select class="form-select my-3 py-0" name="roles_id" required id="floatingSelect" aria-label="Floating label select example">
                <option value="" selected disabled>Select Role</option>
                @foreach ($AllRoles as $role)
                    <option value="{{$role->id}}" required>{{$role->name}}</option>
                @endforeach
            </select>
        </div>
        <div class="text-center">
            <button id="submit-btn" disabled type="submit" class="btn btn-success py-2 px-3">Submit Form</button>
        </div>
      </form>


    <script>

        function checkPassword()
        {
            let pass1 = document.getElementById('password');
            let pass2 = document.getElementById('confirm_password');
            //Store the Confimation Message Object ...
            
            if(pass1.value == pass2.value){
                document.getElementById('submit-btn').removeAttribute("disabled");
            }else{
                document.getElementById('submit-btn').setAttribute("disabled" , "true");
            }
        }
    </script>
@endsection