<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\User;
use App\Models\role;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;

class UserController extends Controller
{
/**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $AllUsers = User::all();
        return view('users.index' , compact('AllUsers')); //['users'=>$AllUsers]
    }

    public function create()
    {
        $AllRoles = role::all();
        return view('users.create', ['AllRoles'=>$AllRoles]);
    } 

    public function show($user)
    {
        $SingleUser = User::findOrFail($user);
        return view('users.show' , ['user'=>$SingleUser]);
    }

    public function store(Request $request)
    {
        $user = new User;
        $user->name = $request->name;
        $user->email = $request->email;
        $user->password = Hash::make($request->password);
        $user->roles_id = $request->roles_id;
        $user->save();
        return redirect()->route('users.index');
    }

    public function edit($user)
    {
        $SingleUser = User::findOrFail($user);
        $AllRoles = role::all();
        return view('users.edit' , ['user'=>$SingleUser , 'AllRoles'=>$AllRoles]);
    }

    public function update($user , Request $request)
    {
        $user = User::findOrFail($user);
        $user->name = $request->name;
        $user->email = $request->email;
        if($request->password)
        {
            $user->password = Hash::make($request->password);
        }
        $user->roles_id = $request->roles_id;
        $user->save();
        return redirect()->route('users.index');
    }

    public function destroy($user)
    {
        
        if(str_contains(Auth::user()->userRole->permissions, 'user-delete') !== true)
        {
            return redirect()->route('home');
        }
        $SingleUser = User::findOrFail($user);
        if(Auth::user()->id != $user)
        {
            $SingleUser->delete();
        }
        
        return redirect()->route('users.index');
    } 
}
