<?php

namespace App\Http\Controllers;

use App\Models\Role;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use App\Models\User;

class UserController extends Controller
{
    private $user;

    public function __construct(User $user, Role $roles)
    {
        $this->user = $user;

    }
    public function index(){
        $title = 'danh sách người dùng';

        $users = DB::table('users')->get();


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
        $dateInsert = [
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password),
            'email_verified_at' => date('Y-m-d H:i:s')
        ];
        DB::table('users')->insert($dateInsert);


         return redirect()->route('user.index')->with('msg','tạo thành công');


    }

    public function edit($id){
        $title = 'Sửa người dùng';

        $users = $this->user->findOrfail($id);

        return view('pages.user.edit', compact('title','users'));
    }

    public function update(Request $request,$id){
        $request->validate([
            'name' => 'required',
            'email' => 'required|email|unique:users,email,'.$id,
            'email_verified_at'=> date('Y-m-d H:i:s'),
        ]);
        $dataUpdate = [
            'name' => $request->name,
            'email' => $request->email,
            'email_verified_at' => date('Y-m-d H:i:s')
        ];
        DB::table('users')->where('id',$id)->update($dataUpdate);

        return redirect()->route('user.index')->with('msg','update thành công');

    }

    public function delete($id){
        DB::table('users')->where('id',$id)->delete();
        return redirect()->route('user.index')->with('msg','delete thành công');

    }
}
