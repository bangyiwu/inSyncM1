@extends('layouts.app')

@section('content')
    <h1>My Events</h1>
    <p>These are my events</p>
    <table class="table">
        <thead>
          <tr>
            <th scope="col">#</th>
            <th scope="col">Event</th>
            <th scope="col">Location</th>
            <th scope="col">Start time</th>
            <th scope="col">Conflict</th>
          </tr>
        </thead>
        <tbody>
            @php ($row = 0)
            @foreach ($events as $event)
            @if($event-> user_id == auth()->user()->id)
            @php ($row = $row + 1)
            @php ($conflict = false)
          <tr>
            <th scope="row">{{$row}}</th>
            <td>{{$event->title}}</td>
            <td>{{$event->location}}</td>
            <td>{{$event->start}}</td>
            @foreach ($events as $innerevent)
            @if(($event->location == $innerevent->location) && ($event->start == $innerevent->start) && ($event->id !== $innerevent->id))
            @php ($conflict = true)
            @endif
            @endforeach
                @if($conflict == true)
                <td>TRUE</td>
                @else
                <td>FALSE</td>
                @endif
          </tr>
            @endif    
          @endforeach
        </tbody>
      </table>
    <p>
        @foreach ($events as $event)
        <div class="flex-center">
            @if($event-> user_id == auth()->user()->id)
            <h4>{{$event->title}} on {{$event->start}} clashes with </h4>
            
        </div>  
        
         @foreach ($events as $innerevent)
            @if(($event->location == $innerevent->location) && ($event->start == $innerevent->start) && ($event->id !== $innerevent->id))
            <div class="overlap">
                {{$innerevent->title}} booked by {{$innerevent->user_id}}
            </div>
        @endif
        @endforeach
        @endif           
        @endforeach
       
    </p>
@endsection
