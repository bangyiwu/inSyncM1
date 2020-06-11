<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Group;
use App\User;

class GroupController extends Controller
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
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $user = auth()->user();
        $groups = Group::all();
        return view('groups.index')->with(compact('user', 'groups'));
    }

    public function mygroups()
    {
        $thisUser = auth()->user();
        $groups = $thisUser->groups()->paginate(5);
        $data = [$groups, $thisUser];
        return view('pages.viewgroups', ['groups'=>$groups, 'thisUser'=>$thisUser]);
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
        $user = auth()->user();

        $newGroup = new Group;
        $newGroup = Group::create([
            'name' => request('name'),
        ]);
        $newGroup->save();

        $newGroup->users()->sync($user);

        return redirect()->route('groups.index')->with('message', 'Group Created!');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $group = Group::where('id', $id)->first();
        $users = User::all();
        return view('groups.edit')->with([
            'users' => $users,
            'group' => $group
            ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $group = Group::where('id', $id)->first();
        $group->users()->sync($request->users);
        return redirect()->route('groups.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $group = Group::where('id', $id)->first();
        $group->users()->detach();
        $group->delete();

        return redirect()->route('groups.index');
    }

    public function members($id)
    {
        $currentUser = auth()->user()->id;
        
        $group = Group::where('id', $id)->first();

        $groupName = $group->name;
        
        $users = $group->users()->paginate(3);
        //dd($users);
        return view('groups.members')->with('users', $users)->with('groupID', $id)->with('currentUser', $currentUser)->with('groupName', $groupName);
    }

    // pass in id of user to be removed
    public function removeMember($id, $userID)
    {
        $group = Group::where('id', $id)->first();
        $group->users()->detach([$userID]);

        return redirect()->route('groupMembers', $id);
    }

}
