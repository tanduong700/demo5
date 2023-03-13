<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
         public function index(){
        // return view index
        $title = 'danh sách người dùng';

        $users = User::all();

        return view('pages.user.index', ['users' => $users, 'title' => $title]);
    }

    public function create(){
        // Return view create user
         $title = 'thêm người dùng';

         return view('pages.user.create', ['title'=>$title]);
    }

    public function store(Request $request){
        // Validation
        $request->validate([
            'name' => 'required',
            'email' => 'required|email|unique:users',
            'password' => 'required|min:8'
        ]);

        // Create user
        $user = new User();
        $user->name = $request->name;
        $user->email = $request->email;
        $user->password = Hash::make($request->password);
        $user->save();

         return redirect()->route('user.index')->with('msg','tạo thành công');
    }

    public function edit($id){
        // Return view update user
        $title = 'Cập nhập người dùng';

        $users = User::findOrfail($id);

        return view('pages.user.edit', ['users' => $users, 'title' => $title]);
    }

    public function update(Request $request,$id){
        // Validation
        $request->validate([
            'name' => 'required',
            'email' => 'required|email|unique:users,email,'.$id,

        ]);

        // Update user
        $updataUser = User::find($id);
        $updataUser->name = $request->name;
        $updataUser->email = $request->email;
        $updataUser->save();

        return redirect()->route('user.index')->with('msg','update thành công');

    }

    public function delete($id){
        // delete User
        $deleteUser = User::find($id);
        $deleteUser->delete($id);
        return redirect()->route('user.index')->with('msg','delete thành công');

    }
}
