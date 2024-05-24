<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Message;
use App\Models\ChatRoom;
use App\Models\RoomMember;
use App\Events\MessageEvent;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Illuminate\Support\Facades\Auth;

class ChatController extends Controller
{
    public function index()
    {
        $user_profile = Auth::user();
        $users = User::where('id', '!=', Auth::id())->get();
        $this->data['users'] = $users;

        return view('chat.index', $this->data, compact('user_profile'));
    }

    public function addUserToRoom(Request $request)
    {
        $request->validate([
            'chat_room_id' => 'required|exists:chat_rooms,id',
            'user_id' => 'required|exists:users,id'
        ]);

        RoomMember::create([
            'chat_room_id' => $request->chat_room_id,
            'user_id' => $request->user_id
        ]);

        return response()->json(['status' => 'User added to room successfully']);
    }

    public function sendMessage(Request $request)
    {
        $request->validate([
            'chat_room_id' => 'required|exists:chat_rooms,id',
            'user_id' => 'required|exists:users,id',
            'message' => 'required'
        ]);

        Message::create([
            'chat_room_id' => $request->chat_room_id,
            'user_id' => $request->user_id,
            'message' => $request->message
        ]);

        return response()->json(['status' => 'Message sent successfully']);
    }

    public function createRoom(Request $request)
    {
        $request->validate([
            'name' => 'required'
        ]);

        $chatRoom = ChatRoom::create([
            'name' => $request->name
        ]);

        return response()->json(['status' => 'Chat room created successfully', 'chat_room_id' => $chatRoom->id]);
    }
}
