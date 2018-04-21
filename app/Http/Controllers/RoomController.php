<?php

namespace App\Http\Controllers;

use App\Http\Requests\CreateRoomRequest;
use App\Models\Enums\RoomStatus;
use App\Models\Room;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;

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

        if($room->status != RoomStatus::OPEN && $room->status != RoomStatus::PASSWORD_PROTECT){
            return redirect()->route('home')->withErrors('Room already in game!');
        }

        $room->status = RoomStatus::IN_PROGRESS;
        $room->save();

        return view('room', compact('room'));
    }

    public function startRoomGame($slug){
        $room = Room::where('slug', $slug)->first();

        $room->status = RoomStatus::IN_PROGRESS;
        $room->save();
    }
}
