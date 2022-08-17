<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\Movie;
use Illuminate\Support\Facades\Auth;

class MovieController extends Controller
{

    public function index(){
        $movies = Movie ::all();
        return view('movies.index',['movies'=>$movies]);
    }

    public function show($movie)
    {
        $singleMovie = Movie::findOrFail($movie);
        return view('movies.show',['movie'=>$singleMovie]);
    }

    public function create()
    {
        return view('movies.create');
    }

    public function store(Request $request){
        $movie = new Movie;
        $movie->name = $request->name;
        $movie->type = $request->type;
        $movie->rating = $request->rating;
        $movie->description = $request->description;
        $movie->save();
        return redirect()->route('movies.index');
    }

    public function edit($movie){
        $editMovie = Movie::findOrFail($movie);
        return view('movies.edit',['movie'=>$editMovie]);

    }

    public function update($movie ,Request $request){
        $editMovie = Movie::findOrFail($movie);
        $editMovie->name = $request->name;
        $editMovie->type = $request->type;
        $editMovie->rating = $request->rating;
        $editMovie->description = $request->description;
        $editMovie->save();
        return redirect()->route('movies.index');
    }

    public function destroy($movie){
        if(str_contains(Auth::user()->userRole->permissions, 'movie-delete') !== true)
        {
            return redirect()->route('home');
        }
        
        $deleteMovie = Movie::findOrFail($movie);
        $deleteMovie->delete();
        return redirect()->route('movies.index');

    }











    public function __invoke(Request $request)
    {
        //
    }
}
