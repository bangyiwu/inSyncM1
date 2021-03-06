@extends('layouts.app')

@section('content')
@if($count > 0)
<div class="container">    
    <div class="card">
        <div class='card-body'>
            @if(session()->has('errormsg'))
            <div class="alert alert-danger">
                {{ session()->get('errormsg') }}
            </div>
        @endif    
            <h1>Manage Groups</h1>
            <table class="table">
                <thead>
                    <tr>
                    <th scope="col">#</th>
                    <th scope="col">Group Name</th>
                    <th scope="col">Role</th>
                    <th scope="col">Members</th>
                    <th scope="col">Actions</th>
                    </tr>
                </thead>
                <tbody> 
                    @php ($row = 0)
                    @php ($userID = $user->id)
                    @foreach ($groups as $group)
                        @if ($group->users()->find($userID))
                            @php ($row = $row + 1)
                            <tr>
                                <th scope="row">{{$row}}</th>
                                <td>{{ $group->name }}</td>
                                <td>
                                    @if ($group->leaders()->find($userID))
                                        admin
                                    @endif
                                </td>
                            <td><u><a href="{{ url("/editgroups/groups/{$group->id}/members") }}">{{ $group->users()->count() }}</a><u></td>
                                <td>
                                    <!-- Button trigger modal -->
                                    <button type="button" class="btn btn-danger float-left" style="margin-right:5px" data-toggle="modal" data-target="#exampleModal">
                                        Leave
                                    </button> 
                                    @if ($group->leaders()->find($user->id))
                                    <a href="{{route('groups.edit', $group->id)}}"><button type="button" class="btn btn-primary">Add/Edit Members</button></a>
                                    @endif           
                                    <!-- Start Add Modal -->
                                    <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                        <div class="modal-dialog">
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                <h5 class="modal-title" id="exampleModalLabel">Are you sure about leaving {{ $group->name }}?</h5>
                                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                        <span aria-hidden="true">&times;</span>
                                                    </button>
                                                </div>
                                                <div class="modal-footer">
                                                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                                    <a href="{{ url("/leavegroup/{$group->id}") }}" class="float-left">
                                                    <button type="submit" class="btn btn-danger">Confirm</button></a>
                                                    </a>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <!-- End Add Modal -->
                                </td>
                            </tr>
                        @endif
                    @endforeach
                </tbody>
                </table>
                @if(session()->has('message'))
                    <div class="alert alert-success">
                        {{ session()->get('message') }}
                    </div>
                @endif      
        </div>     
    </div>
    @else
    <div class="cover-container d-flex h-100 p-3 mx-auto flex-column text-center">
        <p>You are currently not in any groups</p>
    </div>
    @endif
    
    <div class="container" style="margin-top: 30px">
      
        <!-- Button trigger modal -->
        <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#newGroup">
        Create New Group
        </button>
  
        <!-- Start Add Modal -->
        <div class="modal fade" id="newGroup" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Create New Group</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
                </div>
                    <form action="{{ route('groups.store') }}" method="POST">
                        @csrf
                        {{ method_field('POST') }}
                        <div class="modal-body">
                            <div class="form-group">
                                <label for="name">Group Name</label>
                                <input type="text" name="name" class="form-control" id="name" placeholder="input your group name">
                            </div>
                            <button type="submit" class="btn btn-primary">Submit</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
        <!-- End Add Modal -->
    </div>
</div>

@endsection