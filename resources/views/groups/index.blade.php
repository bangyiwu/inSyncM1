@extends('layouts.app')

@section('content')
<div class="container">    
    <div class="card">
        <div class="card-header">My Groups</div>
    
        <div class='card-body'>
            
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
                                    <a href="{{route('groups.edit', $group->id)}}"><button type="button" class="btn btn-primary float-left">Edit</button></a>
                                    <form action="{{ route('groups.destroy', $group->id) }}" method="POST" class="float-left">
                                        @csrf
                                        {{ method_field('DELETE') }}
                                        <button type="submit" class="btn btn-warning">Delete</button></a>
                                    </form>
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
    
    <div class="container" style="margin-top: 30px">
      
        <!-- Button trigger modal -->
        <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModal">
        Create New Group
        </button>
  
        <!-- Start Add Modal -->
        <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
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