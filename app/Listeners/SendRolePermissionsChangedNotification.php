<?php

namespace App\Listeners;

use App\Events\RolePermissionsChanged;
use App\Mail\RolePermissionChangedMail;
use App\Models\User;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Support\Facades\Mail;

class SendRolePermissionsChangedNotification implements ShouldQueue
{
    use InteractsWithQueue;
    /**
     * Create the event listener.
     *
     * @return void
     */
    public function __construct()
    {
        //
    }

    /**
     * Handle the event.
     *
     * @param  RolePermissionsChanged  $event
     * @return void
     */
    public function handle(RolePermissionsChanged $event)
    {
        Mail::to($event->user->mail)->send(new RolePermissionChangedMail($event->user, $event->roles, $event->permissions));
    }
}
