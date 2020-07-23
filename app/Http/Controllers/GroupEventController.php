<?php

namespace App\Http\Controllers;

use App\GroupEvent;
use App\Group;
use App\Event;
use App\User;
use Illuminate\Http\Request;
use Validator;
use Redirect;


class GroupEventController extends Controller
{

    public function store(Request $request){

        $validator = \Validator::make($request->all(), [
            'title' => 'required',
            'start' => 'before:end',
            'end' => 'after:start'
         ]);

        if ($validator->fails())
        {
            // return redirect()->route('schedule')->with('message', 'Event not created')->with('group_id', 16);
            return Redirect::route('schedule', [request('group_id')])->with('message', 'Event not created, check if: <br>
              -Title was entered <br>
              -Start time is before end time');
        }

        $groupEvent = GroupEvent::create(
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
        $group = Group::find(request('group_id'));
        $groupUsers = $group->users()->paginate(99);
        foreach($groupUsers as $user) {
            $user->notify(new \App\Notifications\GroupNotice($groupEvent, $group));
        }
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
        $validator = \Validator::make($request->all(), [
            'title' => 'required',
            'start' => 'before:end',
            'end' => 'after:start'
         ]);

        if ($validator->fails())
        {
            // return redirect()->route('schedule')->with('message', 'Event not created')->with('group_id', 16);
            return Redirect::route('routeGroupEventShow', [request('id')])->with('message', 'Event not updated, check if: <br>
              -Title was entered <br>
              -Start time is before end time');
        }

        $event = GroupEvent::where('id', $request->id)->first();
        $event->fill($request->all());
        $event->save();
        return redirect()->route('viewgroups')->with('message', 'Event Updated!');
    }
    public function destroy($id){
        GroupEvent::find($id)->delete();
        return redirect()->route('viewgroups')->with('message', 'Event Deleted!');
    }

    public function notifications(){
        $count = count(auth()->user()->unreadNotifications);
        auth()->user()->unreadNotifications->markAsRead();
        
        return view('pages.notifications', ['notifications' => auth()->user()->unreadNotifications, 'count'=> $count]);
    }
}
