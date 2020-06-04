@extends('layouts.app')
    
@section('content')
    <h2>Details of {{$event->title}} on {{$event->start}}</h2>
    <h3>Description:</h3>
    <p>{{$event->description}}</p>
    <h3>This event clashes with:</h3>
    <p>
         @foreach ($events as $innerevent)
            @if(($event->location == $innerevent->location) && ($event->start == $innerevent->start) && ($event->id !== $innerevent->id))
            <div class="overlap">
                {{$innerevent->title}} booked by {{$innerevent->user_id}}
            </div>
            @endif
        @endforeach 
    </p>
    
@endsection