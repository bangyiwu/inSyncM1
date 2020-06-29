<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Group;
use App\User;
use App\Leader;

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
        $count = $user->groups()->paginate(99)->count();
        return view('groups.index')->with(compact('user', 'groups', 'count'));
    }

    public function mygroups()
    {
        $thisUser = auth()->user();
        $groups = $thisUser->groups()->paginate(5);
        $data = [$groups, $thisUser];
        $count = $thisUser->groups()->paginate(99)->count();
        return view('pages.viewgroups', ['groups'=>$groups, 'thisUser'=>$thisUser, 'count'=>$count]);
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

        $leader = Leader::create([
            'name' => ($user->name),
            'user_id' => ($user->id)
        ]);
        if(Leader::where('name', '=', $user->name)->count() <= 0){
            $leader->save();
        }
        $newGroup->leaders()->syncWithoutDetaching($user->id);

        return redirect()->route('groups.index')->with('message', "Group '$newGroup->name' Created!");
    }

    public function makeAdmin($groupID, $userID)
    {
        $currentUser = auth()->user()->id;
        
        $group = Group::where('id', $groupID)->first();

        $users = $group->users()->paginate(10);
        $group->leaders()->syncWithoutDetaching($userID);

        return view('groups.edit')->with([
            'users' => $users,
            'group' => $group,
            'currentUser' => $currentUser
            ]);
        //return view('groups.members')->with('group', $group)->with('users', $users)->with('currentUser', $currentUser);
    }

    public function revokeAdmin($groupID, $userID)
    {
        $currentUser = auth()->user()->id;
        
        $group = Group::where('id', $groupID)->first();

        $users = $group->users()->paginate(10);
        $group->leaders()->detach([$userID]);

        return view('groups.edit')->with([
            'users' => $users,
            'group' => $group,
            'currentUser' => $currentUser
            ]);
        //return view('groups.members')->with('group', $group)->with('users', $users)->with('currentUser', $currentUser);
    }

    public function editGroupName(Request $request, $groupID) {
        $group = Group::where('id', $groupID)->first();
        $oldName = $group->name;
        $name = request('name');
        //dd($group);
        $group->update(array('name' => $name));
        return redirect()->route('groups.index')->with('message', "Group '$oldName' changed to '$name'!");
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
        $currentUser = auth()->user()->id;
        $group = Group::where('id', $id)->first();
        $users = $group->users()->get();
        return view('groups.edit')->with([
            'users' => $users,
            'group' => $group,
            'currentUser' => $currentUser
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
        $groupUsers = $group->users()->all();
        $group->users()->sync($groupUsers, $request->user);
        return redirect()->route('groups.index');
    }

    public function addMember($groupID, $userID)
    {
        $currentUser = auth()->user()->id;
        $group = Group::where('id', $groupID)->first();
        $group->users()->syncWithoutDetaching([$userID]);
        $searchedUsers = User::where('id', $userID)->get();
        $users = $group->users()->get();
        return view('groups.addmembers')->with('group', $group)->with('users', $users)->with('searchedUsers', $searchedUsers)->with('currentUser', $currentUser);
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

        return redirect()->route('groups.index')->with('message', "'$group->name' deleted");
    }

    public function leaveGroup($id)
    {
        $currentUser = auth()->user();
        $group = Group::where('id', $id)->first();
        if($group->users()->count() <= 1) {
            $group->users()->detach();
            $group->delete();
            return redirect()->route('groups.index')->with('message', "Left and Deleted '$group->name'");
        } else {
            $group->users()->detach($currentUser);
        };

        return redirect()->route('groups.index')->with('message', "Left '$group->name'");
    }

    public function members($id)
    {
        $currentUser = auth()->user()->id;
        
        $group = Group::where('id', $id)->first();

        $groupName = $group->name;
        
        $users = $group->users()->get();
        //dd($users);
        return view('groups.members')->with('group', $group)->with('users', $users)->with('currentUser', $currentUser);
    }

    // pass in id of user to be removed
    public function removeMember($id, $userID)
    {
        $currentUser = auth()->user()->id;
        $group = Group::where('id', $id)->first();
        $group->users()->detach([$userID]);
        $users = $group->users()->get();

        //return redirect()->route('groupMembers', $id);

        return view('groups.edit')->with([
            'users' => $users,
            'group' => $group,
            'currentUser' => $currentUser
            ]);
    }

    public function searchForGroup($groupID) {
        $currentUser = auth()->user()->id;
        
        $search_text = $_GET['query'];
        $searchedUsers = User::where('name', 'LIKE', '%'.$search_text.'%')->get();
        $group = Group::where('id', $groupID)->first();
        $users = $group->users()->get();
        return view('groups.addmembers', compact('users', 'group', 'currentUser', 'searchedUsers'));
    }

}
