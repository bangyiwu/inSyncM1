@extends('layouts.app')
    
@section('content')
    <p>Details of {{$event->title}} on {{$event->start}}</p>
    <p>Description:</p>
    <p>{{$event->description}}</p>
    <p>This event clashes with:</p>
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