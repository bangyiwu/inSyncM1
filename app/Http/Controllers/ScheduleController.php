<?php

namespace App\Http\Controllers;

use App\Event;
use App\User;
use App\Http\Requests\EventRequest;
use Illuminate\Http\Request;

class ScheduleController extends Controller
{
    public function date(Request $request){
       $start = $request->datetime;
       $events = Event::all();
       $users = User::all();
       $data = ['events' => $events, 'users' => $users, 'start' => $start];
    //    return redirect('viewgroups/time') -> with($data);
       return view('pages.time', ['events' => $events, 'users'=> $users,  'start'=> $start]);
    }

    public function index() {
        return view('pages.schedule');
    }

    public function time() {
        //$overlaps = Event::where('start','=',$start)->first();
        // $events = Event::all();
        // $users = User::all();
        // return view('pages.time', ['events' => $events, 'users'=> $users,  'start'=> $start]);
        // return view('pages.time');
    }
}
