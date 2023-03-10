<?php

namespace App\Http\Controllers;
use App\Models\Message;
use App\Models\Group;
use App\Models\User;
use Illuminate\Http\Request;

class ManagerGroupController extends Controller
{
    public function createUser()
    {
        $groups = Group::all();
        return view('managerGroup.group', ['groups'=>$groups]);
    }

    public function create(){
        $users = User::all();
        return view('managerGroup.addUser', ['users' => $users]);
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|max:255',
            'users' => 'required|array'
        ]);

        $groups = new Group();
        $groups->name = $request->name;
        $groups->save();
        $groups->users()->sync($request->users);

        return redirect()->route('group.createUser');
    }

    public function show($id){
        $groups = Group::findOrFail($id);
        $users = $groups->user;
        return view('managerGroup.show',['groups' => $groups, 'users' => $users]);
    }

}
