<?php

namespace App\Http\Controllers;

use App\FastEvent;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $thisUser = auth()->user();
        $fastEvents = $thisUser->fastevents()->paginate(99);
        return view('fullcalendar.master')->with('fastEvents', $fastEvents);
    }
}
