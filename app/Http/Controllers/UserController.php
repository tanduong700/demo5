<?php

namespace App\Http\Controllers;

use App\Models\Role;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use App\Models\User;

class UserController extends Controller
{
         public function index(){
        $title = 'danh sách người dùng';

        $users = User::all();

        return view('pages.user.index', compact('title','users'));
    }

    public function create(){
         $title = 'thêm người dùng';


         return view('pages.user.create', compact('title'));
    }

    public function store(Request $request){

        $request->validate([
            'name' => 'required',
            'email' => 'required|email|unique:users',
            'email_verified_at'=> date('Y-m-d H:i:s'),
            'password' => 'required|min:8'
        ]);

        $user = new User;
        $user->name = $request->name;
        $user->email = $request->email;
        $user->password = Hash::make($request->password);
        $user->email_verified_at = date('Y-m-d H:i:s');
        $user->save();

         return redirect()->route('user.index')->with('msg','tạo thành công');
    }

    public function edit($id){
        $title = 'Sửa người dùng';

        $users = User::findOrfail($id);

        return view('pages.user.edit', compact('title','users'));
    }

    public function update(Request $request,$id){
        $request->validate([
            'name' => 'required',
            'email' => 'required|email|unique:users,email,'.$id,
            'email_verified_at'=> date('Y-m-d H:i:s'),
        ]);

        $updataUser = User::find($id);
        $updataUser->name = $request->name;
        $updataUser->email = $request->email;
        $updataUser->email_verified_at = date('Y-m-d H:i:s');
        $updataUser->save();

        return redirect()->route('user.index')->with('msg','update thành công');

    }

    public function delete($id){
        $deleteUser = User::find($id);
        $deleteUser->delete($id);
        return redirect()->route('user.index')->with('msg','delete thành công');

    }
}
