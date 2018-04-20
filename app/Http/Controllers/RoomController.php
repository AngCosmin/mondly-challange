<?php

namespace App\Http\Controllers;

use App\Models\Room;
use Illuminate\Http\Request;

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
        $room->save();

        return redirect()->route('room.join', $room->slug);
    }
    
    public function joinRoom($slug)
    {
        // TODO:
        echo '<pre>';
        print_r($slug);
        echo '</pre>';
        die();    
    }
}
