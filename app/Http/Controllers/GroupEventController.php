<?php

namespace App\Http\Controllers;

use App\GroupEvent;
use App\Event;
use App\User;
use Illuminate\Http\Request;

class GroupEventController extends Controller
{

    public function store(Request $request){
        GroupEvent::create(
            [
                'title' => request('title'),
                'group_id'=>request('group_id'),
                'start' => request('start'),
                'end' => request('end'),
                'color' => request('color'),
                'description' => request('description'),
                'user_id' => auth()->user()->id,
                'location' => request('location'),
            ]
        );
        return redirect()->route('viewgroups')->with('message', 'Event Created!');
    }

    public function show($id) {
        $groupEvent = GroupEvent::find($id);
        $events = Event::all();
        $groupEvents =GroupEvent::all();
        foreach($groupEvents as $item) {
            $events[] = $item;
        }
        $users = User::all();
        $start = date('Y-m-d\TH:i:s', strtotime($groupEvent->start));
        $end = date('Y-m-d\TH:i:s', strtotime($groupEvent->end));
        return view('pages.viewgroupevent', ['groupEvent' => $groupEvent, 'events'=>$events, 'id'=>$id, 'users'=>$users, 'start'=>$start, 'end'=>$end]);
    }

    public function update(Request $request){
        $event = GroupEvent::where('id', $request->id)->first();
        $event->fill($request->all());
        $event->save();
        return redirect()->route('viewgroups')->with('message', 'Event Updated!');
    }
    public function destroy($id){
        GroupEvent::find($id)->delete();
        return redirect()->route('viewgroups')->with('message', 'Event Deleted!');
    }
}
