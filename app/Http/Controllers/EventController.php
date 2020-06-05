<?php

namespace App\Http\Controllers;

use App\Event;
use App\User;
use App\Http\Requests\EventRequest;
use Illuminate\Http\Request;

class EventController extends Controller
{
    public function loadEvents(){
        $events = Event::all();
        $userevents = $events->filter(function($item){
            return $item->user_id == auth()->user()->id;
        })->values();
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
        $events = Event::all();
        return view('pages.myevents', [
            'events' => $events,
            ]);
    }
    public function show($id) {
        $id = intval($id);
        $event = Event::findOrFail($id);
        $events = Event::all();
        return view('pages.show', ['event' => $event, 'events'=>$events]);
    }


}
