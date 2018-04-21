<?php

namespace App\Http\Controllers;

use App\Models\Language;
use App\Models\Room;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $all_languages = Language::where('is_supported',1)->pluck('name', 'id');
        $rooms = Room::orderBy('created_at', 'desc')->get();

        return view('home', compact('all_languages', 'rooms'));
    }
}
