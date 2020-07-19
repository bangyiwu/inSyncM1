<?php

namespace App\Http\Controllers;

use App\Event;
use App\GroupEvent;
use App\User;
use App\Group;
use App\Http\Requests\EventRequest;
use Illuminate\Http\Request;
use Carbon\Carbon;

class ScheduleController extends Controller
{
    public function date(Request $request){

        $rules = [
            'datetime' => 'required',
        ];
    
        $customMessages = [
            'datetime.required' => 'The start time can not be blank.'
        ];
    
        $this->validate($request, $rules, $customMessages);
        // $validatedData = $request->validate([
        //     'datetime' => 'required',
        // ]);
       $start = $request->datetime;
       $startedAt= Carbon::createFromFormat('Y-m-d\TH:i', $start);
       $events = Event::all();
       $group_id = $request->group_id;
       $users = Group::find($group_id)->users()->paginate(99);
       $data = ['events' => $events, 'users' => $users, 'start' => $startedAt];
       $time = date('Y-m-d\TH:i:s', strtotime($start));
       return view('pages.time', ['events' => $events, 'users'=> $users,  'start'=> $startedAt, 'time'=>$time, 'group_id' => $group_id]);
    }

    public function index($group_id) {
        return view('pages.schedule', ['group_id' => $group_id]);
    }

    public function time() {
        //$overlaps = Event::where('start','=',$start)->first();
        // $events = Event::all();
        // $users = User::all();
        // return view('pages.time', ['events' => $events, 'users'=> $users,  'start'=> $start]);
        // return view('pages.time');
    }
    public function show($group_id) {
        $group = Group::find($group_id);
        $groupevents = $group->groupevents()->paginate(5);
        return view('pages.groupevents', ['group_id' => $group_id, 'groupevents' => $groupevents, 'group' => $group]);
    }

    public function location(){
        $groupevents = GroupEvent::all();
        $events = Event::all();
        foreach($groupevents as $groupevent){
                $events[] =$groupevent;
            }
        return view('pages.location', ['events'=>$events]);
    }

    public function at($location){
        $groupevents = GroupEvent::where('location', $location)->get();
        $events = Event::where('location', $location)->get();
        foreach($groupevents as $groupevent){
                $events[] =$groupevent;
            }
        $count = $events->count();
        $users = User::all();
        $sortedEvents = collect($events)->sortBy('start')->values();
        return view('pages.locatevents', ['events'=>$sortedEvents, 'location'=>$location, 'count'=>$count, 'users'=>$users]);
    }

    public function conflict(){
        $groupevents = GroupEvent::all();
        $events = Event::all();
        foreach($groupevents as $groupevent){
                $events[] =$groupevent;
            }
        $count = $events->count();
        $users = User::all();
        $sortedEvents = collect($events)->sortBy('start')->values();
        return view('pages.conflicts', ['events'=>$sortedEvents, 'count'=>$count, 'users'=>$users]);
    }

}
