<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\role;
use Illuminate\Support\Facades\Auth;

class RoleController extends Controller
{
    /**
     * Handle the incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */



    public function index(){
        $roles = role ::all();
        return view('roles.index',['roles'=>$roles]);
    }
    public function create()
    {
        return view('roles.create');
    }

    public function store(Request $request){
        $roles = new role;
        $roles->id = $request->id;
        $roles->name = $request->name;
        $roles->permissions = implode(',', $request->permissions);

        $roles->save();
        return redirect('roles');
    }

    public function edit($role){
        $editRole = role::findOrFail($role);
        return view('roles.edit',['role'=>$editRole]);

    }
    public function update($role , Request $request){
        $editRole = role::findOrFail($role);
        $editRole->name = $request->name;
        $editRole->permissions = implode(',', $request->permissions);
        $editRole->save();
        return redirect('roles');
    }

    public function destroy($role){
        if(str_contains(Auth::user()->userRole->permissions, 'role-delete') !== true)
        {
            return redirect()->route('home');
        }
        $deleteRole = role::findOrFail($role);
        $deleteRole->delete();
        return redirect('roles');

    }






    public function __invoke(Request $request)
    {
        //
    }
}
