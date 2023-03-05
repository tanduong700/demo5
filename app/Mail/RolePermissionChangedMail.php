<?php

namespace App\Mail;

use App\Models\User;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Mail\Mailables\Content;
use Illuminate\Mail\Mailables\Envelope;
use Illuminate\Queue\SerializesModels;

class RolePermissionChangedMail extends Mailable
{
    use Queueable, SerializesModels;

    private $users;
    private $roles;
    private $permissions;

    /**
     * Create a new message instance.
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
     * Get the message envelope.
     *
     * @return \Illuminate\Mail\Mailables\Envelope
     */
    public function envelope()
    {
        return new Envelope(
            subject: 'Role Permission Changed Mail',
        );
    }

    /**
     * Get the message content definition.
     *
     * @return \Illuminate\Mail\Mailables\Content
     */
    public function content()
    {
        return new Content(
            markdown: 'emails.roles.permissions.changed',
            with: [
                'user' => $this->users,
                'roles' => $this->roles,
                'permissions' => $this->permissions
            ]);
    }

    /**
     * Get the attachments for the message.
     *
     * @return array
     */
    public function attachments()
    {
        return [];
    }
}
