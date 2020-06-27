@extends('layouts.app')

@section('content')

<h1>Events with {{$group->name}}: </h1>
@if($groupevents->count() > 0)
<table class="table">
    <thead>
      <tr>
        <th scope="col">#</th>
        <th scope="col">Event</th>
        <th scope="col">Location</th>
        <th scope="col">Start time</th>
      </tr>
    </thead>
    <tbody>
        @php ($row = 0)
        @foreach ($groupevents as $event)
                @php ($row = $row + 1)
                @php ($conflict = false)
                <tr>
                    <th scope="row">{{$row}}</th>
                    <td><a href="/groupevents/{{$event->id}}">{{$event->title}}</a></td>
                    <td>{{$event->location}}</td>
                    <td>{{$event->start}}</td>
                </tr>
      @endforeach
    </tbody>
  </table>
  @else
      <div class="cover-container d-flex h-100 p-3 mx-auto flex-column text-center">
        <p>You currently have no events with this group</p>
      </div>
  @endif    
  
@endsection