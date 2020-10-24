<?php

namespace App\Http\Controllers;

use App\Role;
use App\User;
use Illuminate\Http\Request;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $users = User::with('role')->select('id','name','email','role_id','created_at','updated_at')->get();
        $roles = Role::all();
        return view('admin.upanel')->with('users',$users)->with('role','roleName')->with('roles',$roles);
    }



    /**
     * Display the specified resource.
     *
     * @param \App\User $user
     * @return void
     */
    public function show($user)
    {
        return User::findOrfail($user);

    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\User  $user
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $user = User::findOrfail($id);
        $roles = Role::all();
        return view('admin.ucontrol',compact('user'))->with('user',$user)->with('roles',$roles);
    }
}
