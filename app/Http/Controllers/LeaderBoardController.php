<?php

namespace App\Http\Controllers;

use App\Models\Language;
use App\Models\Room;
use App\User;
use Illuminate\Http\Request;

class LeaderBoardController extends Controller
{
    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $users = User::orderBy('total_points','DESC')->get();

        return view('leaderboard', compact( 'users'));
    }
}
