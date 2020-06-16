@extends('layouts.app')

@section('content')

<h3>Events you have with this group: </h3>

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
  
@endsection