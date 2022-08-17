@if(str_contains(Auth::user()->userRole->permissions, 'role-list') !== true)
    <script>window.location = "/home";</script>
@endif

@extends('layouts.app')
<html>
    <title>Roles Management</title>
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
  
  </style>
@section('content')
        <h1>Roles Management</h1>

        @if(str_contains(Auth::user()->userRole->permissions, 'role-create') == true)
          <div class="mb-3 mt-4">
            <a href="{{route('roles.create')}}"><button class="btn btn-success" type="submit">Create New Role</button></a>
          </div>
        @endif

        <table class="table text-white table-hover">
        <thead class="text-muted">
            <tr>
                <th scope="col">ID</th>
                <th scope="col">Name</th>
                <th scope="col">Permissions</th>
                @if(str_contains(Auth::user()->userRole->permissions, 'role-edit') == true || str_contains(Auth::user()->userRole->permissions, 'role-delete') == true)
                  <th scope="col">Action</th>
                @endif
            </tr>
        </thead>
        <tbody class="table-group-divider text-black">
            @foreach($roles as $role)
                <tr>
                    <th scope="row">{{$role->id}}</th>
                    <td>{{$role->name}}</td>
                    <td>{{$role->permissions}}</td>

                    @if(str_contains(Auth::user()->userRole->permissions, 'role-edit') == true || str_contains(Auth::user()->userRole->permissions, 'role-delete') == true)
                      <td>
                          <div class="action d-flex">
                            @if(str_contains(Auth::user()->userRole->permissions, 'role-edit') == true)
                                <a href="{{route('roles.edit',['role'=>$role->id])}}"><i class="fa-solid fa-pen-to-square text-primary p-1"></i></a>
                            @endif
                            @if(str_contains(Auth::user()->userRole->permissions, 'role-delete') == true)
                                <a href="{{route('roles.destroy',['role'=>$role->id])}}"><i class="fa-solid fa-trash-can delete text-danger p-1" ></i></a>
                            @endif
                          </div>
                      </td>
                    @endif
                </tr>
            @endforeach
        </tbody>

    </table>


@endsection