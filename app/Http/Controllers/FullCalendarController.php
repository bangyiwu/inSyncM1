<?php

namespace App\Http\Controllers;

use App\FastEvent;
use App\Event;
use Illuminate\Http\Request;

class FullCalendarController extends Controller
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

    
    public function index(){
        $fastEvents = FastEvent::all();
        return view('fullcalendar.master')->with('fastEvents', $fastEvents);
    }
}
