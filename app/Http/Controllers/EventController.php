<?php

namespace App\Http\Controllers;

use App\Event;
use App\GroupEvent;
use App\User;
use App\Group;
use App\Http\Requests\EventRequest;
use Illuminate\Http\Request;

class EventController extends Controller
{
    public function loadEvents(){
        // $events = Event::all();
        // $userevents = $events->filter(function($item){
        //     return $item->user_id == auth()->user()->id;
        // })->values();
        $thisUser = auth()->user();
        $userevents = Event::where('user_id', auth()->user()->id)->get();
        $groupevents = GroupEvent::all();
        $groups = $thisUser->groups()->paginate(5);
        foreach($groups as $group){
            $groupevents = $group->groupevents()->paginate(5);
                foreach($groupevents as $groupevent){
                    $userevents[] = $groupevent;
                }}
        return response()->json($userevents);
    }

    public function store(EventRequest $request){
        Event::create([
            'title' => request('title'),
            'start' => request('start'),
            'end' => request('end'),
            'color' => request('color'),
            'description' => request('description'),
            'user_id' => auth()->user()->id,
            'location' => request('location'),
        ]);
        return response()->json(true);
    }

    public function update(EventRequest $request)
    {
        $event = Event::where('id',$request->id)->first();
        $event->fill($request->all());
        $event->save();
        return response()->json(true);
    }

    public function destroy(Request $request){
        Event::where('id', $request->id)->delete();
        return response()->json(true);
    }

    public function index()
    {
        $thisUser = auth()->user();
        $userevents = Event::where('user_id', auth()->user()->id)->get();
        $groups = $thisUser->groups()->paginate(99);
        foreach($groups as $group){
            $gees = $group->groupevents()->paginate(99);
            foreach($gees as $gee){
                $userevents[] = $gee;
            }
        }
        $sortedEvents = collect($userevents)->sortBy('start')->values();
        $number = $sortedEvents->count();
        return view('pages.myevents', [
            'events' => $sortedEvents,
            'count' => $number,
            ]);
    }
    public function show($id) {
        $id = intval($id);
        $thisUser = auth()->user();
        $event = Event::findOrFail($id);
        $events = Event::all();
       

        return view('pages.show', ['event' => $event, 'events'=>$events]);
    }


}
