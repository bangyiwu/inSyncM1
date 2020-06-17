@extends('layouts.app')

@section('content')
<div class="container">    
    <div class="card" style="margin-bottom: 30px">
        <div class="card-header">Edit group name for {{ $group->name }}</div>
        
            <div class='card-body'>
            <form class="form-inline my-2 my-lg-0" type="get" action="{{ url("/searchforgroup/{$group->id}") }}">
            <input class="form-control mr-sm-2" type="search" placeholder="{{ $group->name }}">
                    <button class="btn btn-primary" type="submit">Update</button>
            </form>
            </div>
    </div>

    <div class="card">
        <div class="card-header">Add members to {{ $group->name }}</div>
        
            <div class='card-body'>
            <form class="form-inline my-2 my-lg-0" type="get" action="{{ url("/searchforgroup/{$group->id}") }}">
                    <input class="form-control mr-sm-2" name="query" type="search" placeholder="Search Users">
                    <button class="btn btn-primary" type="submit">Search</button>
            </form>
            </div>
            <table class="table">
                <thead>
                  <tr>
                    <th scope="col">#</th>
                    <th scope="col">User</th>
                    <th scope="col">Email</th>
                    <th scope="col">Actions</th>
                  </tr>
                </thead>
                <tbody>
                    @php ($row = 0)
                @foreach ($users as $user)
                    @php ($row = $row + 1)
                    <tr>
                        <th scope="row">{{$row}}</th>
                        <td>{{ $user->name }}</td>
                        <td>{{ $user->email }}</td>
                        <td>
                            @if(!($group->users->contains($user->id)))
                                <a href="{{ url("editgroups/groups/addmember/{$group->id}/{$user->id}") }}" class="btn btn-primary">Add</a>
                            @else
                                <button type="button" class="btn btn-secondary btn-lg btn-sm" disabled>Added</button> 
                            @endif
                        </td>
                    </tr>
                @endforeach
            
                </tbody>
              </table>
        </div>
        
    </div>   
</div>
@endsection