<?php

namespace App\Http\Controllers;

use App\Models\Role;
use Illuminate\Http\Request;

class RoleController extends Controller
{
    public function index(){
        // return view index
        $title = 'danh sách vai trò';

        $roles = Role::all();

        return view('pages.role.index', ['roles' => $roles, 'title' => $title]);
    }

    public function create(){
        // Return view create role
         $title = 'thêm vai trò';

         return view('pages.role.create', ['title'=>$title]);
    }

    public function store(Request $request){
        // Validation
        $request->validate([
            'name' => 'required',
            'display_name' => 'required',

        ]);

        // Create role
        $role = new Role;
        $role->name = $request->name;
        $role->display_name = $request->display_name;
        $role->save();

         return redirect()->route('role.index')->with('msg','tạo thành công');
    }

    public function edit($id){
        // Return view update role
        $title = 'Sửa vai trò';

        $roles = Role::findOrfail($id);

        return view('pages.role.edit', ['roles' => $roles, 'title' => $title]);
    }

    public function update(Request $request,$id){
        // Validation
        $request->validate([
            'name' => 'required',
            'display_name' => 'required',

        ]);

        // Update role
        $updataRole = Role::find($id);
        $updataRole->name = $request->name;
        $updataRole->display_name = $request->display_name;
        $updataRole->save();

        return redirect()->route('role.index')->with('msg','update thành công');

    }

    public function delete($id){
        // delete role
        $deleteRole = Role::find($id);
        $deleteRole->delete($id);
        return redirect()->route('role.index')->with('msg','delete thành công');

    }
}
