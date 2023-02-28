<?php

namespace App\Http\Controllers;

use App\Models\Permission;
use App\Models\Role;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class RolePermissionController extends Controller
{
    public function index(){
        $title = 'vai trò và quyền của người dùng';
        $users = User::all();
        $roles = Role::all();
        $permissions = Permission::all();
        return view('pages.role_permission',['title' => $title,'roles'=>$roles,'users' => $users, 'permissions'=>$permissions]);
    }

    public function edit($id){
        $title = 'vai trò và quyền của người dùng';
        $users = User::findOrfail($id);
        $roles = Role::all();
        $permissions = Permission::all();
        $users -> hasRole('display_name');
        return view('pages.role_permission',['title' => $title,'roles'=>$roles,
             'users' => $users, 'permissions'=>$permissions,]);
    }

    public function update(Request $request,$id){
        $request->validate([
            'name' => 'required',
        ]);
        // update User
        $updataUser = User::find($id);
        $updataUser->name = $request->name;
        $updataUser->save();
        //update
        $updataUser->attachRole($request->display_name);
        return redirect()->route('user.index')->with('msg','update thành công');
    }

}
