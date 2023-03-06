<?php

namespace App\Http\Controllers;

use App\Events\RolePermissionsChanged;
use App\Models\User;
use Illuminate\Http\Request;

class EventController extends Controller
{
    public function sendMail(User $user){
        event(new RolePermissionsChanged($user, $user->roles, $user->permissions));
    }
}
