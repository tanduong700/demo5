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
        $user = User::all();
        $roles = Role::all();
        $permissions = Permission::all();
        return view('pages.role_permission',['title' => $title,'roles'=>$roles,'users' => $user, 'permissions'=>$permissions]);
    }

    public function edit($id){
        $title = 'vai trò và quyền của người dùng';
        $user = User::findOrfail($id);
        $roles = Role::all();
        $permissions = Permission::all();
        return view('pages.role_permission',['title' => $title,'roles'=>$roles,
             'users' => $user, 'permissions'=>$permissions,]);
    }

    public function update(Request $request,$id){
        $request->validate([
            'name' => 'required',
            'roles' => 'required|array|min:1',
            'permissions' => 'required|array|min:1'
        ]);
        // update User
        $updataUser = User::find($id);
        $updataUser->name = $request->name;
        $updataUser->save();
        //update
        $updataUser->syncRoles($request->roles);
        $updataUser->syncPermissions($request->permissions);
        return redirect()->route('user.index')->with('msg','update thành công');
    }

}
