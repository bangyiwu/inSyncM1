@extends('layouts.app')

@section('content')
    <h1>My Events</h1>
    <p>These are my events</p>
    </p>
    @foreach ($events as $event)
        <div class="flex-center">
            <h4>{{$event->title}}</h4>
            
        </div>                    
    @endforeach
    </p>
    <p>
        @foreach ($events as $event)
        <div class="flex-center">
            <h4>{{$event->title}} on {{$event->start}} clashes with </h4>
            
        </div>  
         @foreach ($events as $innerevent)
            @if(($event->location == $innerevent->location) && ($event->start == $innerevent->start))
            <div class="overlap">
                {{$innerevent->title}} booked by {{$innerevent->user_id}}
            </div>
        @endif
    @endforeach                   
    @endforeach
    </p>
@endsection
