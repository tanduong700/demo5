<?php

namespace App\Http\Controllers;

use App\Models\Group;
use App\Models\User;
use Illuminate\Http\Request;

class ManagerGroupController extends Controller
{
    public function createUser()
    {
        $group = Group::all();
        return view('managerGroup.group', ['group'=>$group]);
    }

    public function create(){
        $user = User::all();
        return view('managerGroup.addUser', ['user' => $user]);
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|max:255'
        ]);

        $group = new Group;
        $group->name = $request->name;
        $group->save();

        return redirect()->route('group.createUser');
    }

}
