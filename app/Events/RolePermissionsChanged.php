<?php

namespace App\Events;

use App\Models\User;
use Illuminate\Broadcasting\Channel;
use Illuminate\Broadcasting\InteractsWithSockets;
use Illuminate\Broadcasting\PresenceChannel;
use Illuminate\Broadcasting\PrivateChannel;
use Illuminate\Contracts\Broadcasting\ShouldBroadcast;
use Illuminate\Foundation\Events\Dispatchable;
use Illuminate\Queue\SerializesModels;

class RolePermissionsChanged
{
    use Dispatchable, InteractsWithSockets, SerializesModels;

    public $users;
    public $roles;
    public $permissions;

    /**
     * Create a new event instance.
     *
     * @return void
     */
    public function __construct(User $users, $roles, $permissions)
    {
        $this->users = $users;
        $this->roles = $roles;
        $this->permissions = $permissions;
    }

    /**
     * Get the channels the event should broadcast on.
     *
     * @return \Illuminate\Broadcasting\Channel|array
     */
    public function broadcastOn()
    {
        return new PrivateChannel('channel-name');
    }
}
