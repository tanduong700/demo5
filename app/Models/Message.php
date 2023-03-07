<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Message extends Model
{
    use HasFactory;

    protected $fillable = ['group_id', 'user_id', 'content'];

    public function group(): BelongsTo
    {
        return $this->belongsTo(Group::class);
    }

    public function User(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }
}
