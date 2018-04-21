<?php

namespace App\Http\Controllers;

use App\Models\Room;
use App\Models\Language;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class RoomController extends Controller
{
    public function create(Request $request)
    {
        if ($request->known_language == $request->foreign_language) {
            return redirect()->route('home');
        }

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

        return view('room', compact('slug'));
    }
}
