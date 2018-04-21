<?php

namespace App\Http\Controllers;

use App\Http\Requests\CreateRoomRequest;
use App\Models\Room;
use Illuminate\Support\Facades\Auth;

class RoomController extends Controller
{
    public function create(CreateRoomRequest $request)
    {
        $room = new Room();
        $room->fill($request->all());
        $room->slug = str_slug($request->name, '-') . '-' . rand(100, 999);
        $room->created_by = Auth::id();
        $room->save();

        return redirect()->route('room.join', $room->slug);
    }
    
    public function joinRoom($slug)
    {
        $room = Room::where('slug', $slug)->first();

        if (!$room) {
            return redirect()->route('home')->with('info', 'Room not found!');
        }

        return view('room', compact('room'));
    }
}
