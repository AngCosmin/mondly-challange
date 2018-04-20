<?php

namespace App\Http\Controllers;

use App\Models\Language;
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
        $all_languages = Language::pluck('name', 'id');

        return view('home', compact('all_languages'));
    }
}
