<?php

namespace App\Http\Controllers;

use App\Models\Permission;
use Illuminate\Http\Request;

class PermissionController extends Controller
{
    public function index(){
        // return view index
        $title = 'danh sách quyền';

        $permissions = Permission::all();

        return view('pages.permission.index', ['permissions' => $permissions, 'title' => $title]);
    }

    public function create(){
        // Return view create permission
         $title = 'thêm quyền';

         return view('pages.permission.create', ['title'=>$title]);
    }

    public function store(Request $request){
        // Validation
        $request->validate([
            'name' => 'required',
            'display_name' => 'required',

        ]);

        // Create permission
        $permission = new Permission();
        $permission->name = $request->name;
        $permission->display_name = $request->display_name;
        $permission->save();

         return redirect()->route('permission.index')->with('msg','tạo thành công');
    }

    public function edit($id){
        // Return view update user
        $title = 'thay đổi quyền';

        $permissions = Permission::findOrfail($id);

        return view('pages.permission.edit', ['permissions' => $permissions, 'title' => $title]);
    }

    public function update(Request $request,$id){
        // Validation
        $request->validate([
            'name' => 'required',
            'display_name' => 'required',

        ]);

        // Update role
        $updataPermission = Permission::find($id);
        $updataPermission->name = $request->name;
        $updataPermission->display_name = $request->display_name;
        $updataPermission->save();

        return redirect()->route('permission.index')->with('msg','update thành công');

    }

    public function delete($id){
        // delete role
        $deletePermission = Permission::find($id);
        $deletePermission->delete($id);
        return redirect()->route('permission.index')->with('msg','delete thành công');

    }
}
