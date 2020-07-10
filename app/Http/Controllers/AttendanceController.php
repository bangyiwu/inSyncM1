<?php

namespace App\Http\Controllers;

use App\Attendance;
use App\GroupEvent;
use App\Group;
use App\User;
use Illuminate\Http\Request;

class AttendanceController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $newGroup = Attendance::updateOrCreate([
            'user_id' => auth()->user()->id,
            'groupEvent_id'=> request('groupEvent_id'),
            'group_id'=> request('group_id'),
            'name' => auth()->user()->name,
        ],[
            'attend' => request('attend'),
            'reason' => request('reason'),
        ]);
        return redirect()->route('attendance.show', ['eventID' => request('groupEvent_id')])->with('message', "Attendance indicated!");
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Attendance  $attendance
     * @return \Illuminate\Http\Response
     */
    public function show($eventID)
    {
        $groupEvent = GroupEvent::findOrFail($eventID);
        $group = Group::findOrFail($groupEvent->group_id);
        $users = $group->users()->paginate(99);
        $attendances = Attendance::where('groupEvent_id', $eventID)->paginate(99);
        $indicatedUsers = [];
        $yetToIndicate = [];
        foreach($users as $user)
            if(Attendance::where('groupEvent_id', $eventID)->where('user_id', $user->id)->exists()){
                $indicatedUsers[] = $user;
            } else {
                $yetToIndicate[] = $user;
            }

        return view('pages.attendance', ['groupEvent' => $groupEvent, 'id'=>$eventID, 'group'=>$group, 'members'=>$users, 'attendances'=>$attendances,
        'indicatedUsers'=>$indicatedUsers, 'yetToIndicate' => $yetToIndicate]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Attendance  $attendance
     * @return \Illuminate\Http\Response
     */
    public function edit(Attendance $attendance)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Attendance  $attendance
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Attendance $attendance)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Attendance  $attendance
     * @return \Illuminate\Http\Response
     */
    public function destroy(Attendance $attendance)
    {
        //
    }
}
