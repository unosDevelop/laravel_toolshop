<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ChatRoom extends Model
{
    use HasFactory;

    protected $fillable = ['name'];

    public function members()
    {
        return $this->hasMany(RoomMember::class);
    }

    public function messages()
    {
        return $this->hasMany(Message::class);
    }
}
