@extends('layouts.app')
    
@section('content')
    <h2>Details of {{$event->title}} on {{$event->start}}</h2>
    <h3>Description:</h3>
    <p>{{$event->description}}</p>
    <h3>This event clashes with:</h3>
    <p>
         @foreach ($events as $innerevent)
            @if(($event->location == $innerevent->location) && 
            (($event->end < $innerevent->end && $event->end > $innerevent->start) ||
            ($event->start > $innerevent->start && $event->start < $innerevent->end)||
            ($event->start <= $innerevent->start && $event->end >= $innerevent->end))
            && ($event->id !== $innerevent->id))
                <div class="overlap">
                    {{$innerevent->title}} booked by 
                    @foreach ($users as $item)
                        @if ($innerevent->user_id == $item->id)
                            {{$item->name}}
                        @endif
                    @endforeach
                </div>
            @endif
        @endforeach 
    </p>

@endsection