<?php

namespace App\Http\Controllers;

//use App\Role;
use App\User;
use Illuminate\Http\Request;

class AdminController extends Controller
{
    public function modifyUserRole(Request $request){

        $request->validate([
            'role_id'=>'exists:roles,id',
        ]);
            $user = User::findOrfail($request->id);
            $user->role_id = $request->role_id;

            $user->save();

        return redirect()->route('admin.panel.users');
    }
}
