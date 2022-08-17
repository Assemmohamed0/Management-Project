@if(str_contains(Auth::user()->userRole->permissions, 'user-list') !== true)
    <script>window.location = "/home";</script>
@endif

@extends('layouts.app')
<html>
    <title>Users Management</title>
</html>
<style>
    .table thead {
      background-color: rgba(188, 187, 187, 0.521);
    }
  
    .show-table tbody td,
    .show-table tbody th {
      vertical-align: middle
    }
  
    tbody tr {
      cursor: pointer;
      transition: all .3s ease;
    }
  
    /* tbody tr:hover {
  
      background-color: rgba(79, 79, 79, 0.358);
    } */
  
    .action i {
      transition: all .3s ease;
    }
  
    .action i:hover {
      transform: scale(1.2);
    }

    /* .fa-ban:hover  {
      transform: scale(1);
    } */
  
  </style>
@section('content')


    <h1>Users Management</h1>

    
    @if(str_contains(Auth::user()->userRole->permissions, 'user-create') == true)
    <div class="mb-3 mt-4">
        <a href="{{route('users.create')}}"><button class="btn btn-success" type="submit">Create New User</button></a>
    </div>
    @endif
    <table class="table text-white table-hover">
        <thead class="text-muted">
        <tr>
            <th scope="col">ID</th>
            <th scope="col">Name</th>
            <th scope="col">Email</th>
            <th scope="col">Roles</th>
            @if(str_contains(Auth::user()->userRole->permissions, 'user-edit') == true || str_contains(Auth::user()->userRole->permissions, 'user-delete') == true)
              <th scope="col">Action</th>
            @endif
            
        </tr>
        </thead>
        <tbody class="table-group-divider text-black">
        @foreach ($AllUsers as $user)
        <tr onclick="window.location='{{route('users.show' , ['user'=>$user->id])}}'">
            <th scope="row">{{$user->id}}</th>
            <td>{{$user['name']}}</td>
            <td>{{$user->email}}</td>
            <td>{{$user->userRole->name}}</td>            

            @if(str_contains(Auth::user()->userRole->permissions, 'user-edit') == true || str_contains(Auth::user()->userRole->permissions, 'user-delete') == true)
              <td>
                  <div class="action d-flex">
                    @if(str_contains(Auth::user()->userRole->permissions, 'user-edit') == true)
                      <a href="{{route('users.edit' , ['user'=>$user->id])}}"><i class="fa-solid fa-pen-to-square text-primary p-1"></i></a>
                    @endif
                    @if(str_contains(Auth::user()->userRole->permissions, 'user-delete') == true && Auth::user()->id != $user->id)
                      <a href="{{route('users.destroy' , ['user'=>$user->id])}}"><i class="fa-solid fa-trash-can delete text-danger p-1" ></i></a>
                    @endif
                    @if (Auth::user()->id == $user->id)
                      <a><i class="fa-solid fa-ban text-dark p-1"></i></a>
                    @endif
                  </div>
              </td>
            @endif
            
        </tr>
        @endforeach
        </tbody>
    </table>


@endsection
