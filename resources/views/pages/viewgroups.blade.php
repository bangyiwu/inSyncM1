
@extends('layouts.app')

@section('content')
<<<<<<< HEAD
    <h1>View Groups</h1>
    <p>This is where you can view your groups</p>
    <p>Current users on site are:</p>
    <table class="table">
        <thead>
          <tr>
            <th scope="col">#</th>
            <th scope="col">Name</th>
            <th scope="col">Email</th>
            <th scope="col">Group</th>
          </tr>
        </thead>
        <tbody>
            @foreach ($users as $user)
          <tr>
            <th scope="row">{{$user->id}}</th>
            <td>{{$user->name}}</td>
            <td>{{$user->email}}</td>
            <td>"Group name"</td>
          </tr>
          @endforeach
        </tbody>
      </table>
      <p><a href="/viewgroups/schedule">Schedule event with this group</a></p>
=======
    <div class="card">
    <div class="card-body">  
        <table class="table">
            <thead>
              <tr>
                <th scope="col">#</th>
                <th scope="col">Group</th>
                <th scope="col">Actions</th>
              </tr>
            </thead>
            <tbody>
                @foreach ($groups as $group)
                    <tr>
                        <th scope="row">{{ $group->id }}</th>
                        <td>{{ $group->name }}</td>
                    </tr>
                 @endforeach       
        
            </tbody>
          </table>
    </div> 
    </div>
    
>>>>>>> add_groups
@endsection