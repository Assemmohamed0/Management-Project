@if(str_contains(Auth::user()->userRole->permissions, 'movie-list') !== true)
    <script>window.location = "/home";</script>
@endif


@extends('layouts.app')
<html>
    <title>Movies Management</title>
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



    <h1>Movies Management</h1>
    @if(str_contains(Auth::user()->userRole->permissions, 'movie-create') == true)
      <div class="mb-3 mt-4">
          <a href="{{route('movies.create')}}"><button class="btn btn-success" type="submit">Create New Movie</button></a>
      </div>
    @endif

    <table class="table text-white table-hover">
        <thead class="text-muted">
            <tr>
                <th scope="col">ID</th>
                <th scope="col">Name</th>
                <th scope="col">Type</th>
                <th scope="col">Rating</th>
                <th scope="col">Created At</th>
                @if(str_contains(Auth::user()->userRole->permissions, 'movie-edit') == true || str_contains(Auth::user()->userRole->permissions, 'movie-delete') == true)
                  <th scope="col">Action</th>
                @endif
            </tr>
        </thead>
        <tbody class="table-group-divider text-black">
            @foreach($movies as $movie)
                <tr onclick="window.location.href='{{route('movies.show',['movie'=>$movie->id])}}'">
                    <th scope="row">{{$movie->id}}</th>
                    <td>{{$movie->name}}</td>
                    <td>{{$movie->type}}</td>
                    <td>{{$movie->rating}} <i class="fa-solid fa-star text-warning"></i></td>
                    <td>{{$movie->created_at->format('Y-m-d')}}</td>
                    @if(str_contains(Auth::user()->userRole->permissions, 'movie-edit') == true || str_contains(Auth::user()->userRole->permissions, 'movie-delete') == true)
                    <td>
                        <div class="action d-flex">
                          @if(str_contains(Auth::user()->userRole->permissions, 'movie-edit') == true)
                            <a href="{{route('movies.edit',['movie'=>$movie->id])}}"><i class="fa-solid fa-pen-to-square text-primary p-1"></i></a>
                          @endif
                          @if(str_contains(Auth::user()->userRole->permissions, 'movie-delete') == true)
                            <a href="{{route('movies.destroy',['movie'=>$movie->id])}}"><i class="fa-solid fa-trash-can delete text-danger p-1" ></i></a>
                          @endif
                          </div>
                    </td>
                    @endif

                </tr>
            @endforeach
        </tbody>

    </table>




@endsection