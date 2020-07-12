@extends('layouts.app')
    
@section('content')
    <div class="card">
        <div class="card-body">
            <h2 class="underlined">Details of {{$event->title}} on {{$event->start}}</h2>
            <h3>Description:</h3>
            <h5 class="underlined-top">{{$event->description}}</h5>
            <h3>This event clashes with:</h3>
            <p>
                @php ($conflict = false)
                @foreach ($events as $innerevent)
                    @if(($event->location == $innerevent->location) && 
                    (($event->end < $innerevent->end && $event->end > $innerevent->start) ||
                    ($event->start > $innerevent->start && $event->start < $innerevent->end)||
                    ($event->start <= $innerevent->start && $event->end >= $innerevent->end) ||
                    ($event->start == $innerevent->start))
                    && ($event->id !== $innerevent->id))
                        @php ($conflict = true)
                        <div>
                            {{$innerevent->title}} booked by 
                            @foreach ($users as $item)
                                @if ($innerevent->user_id == $item->id)
                                    {{$item->name}}
                                @endif
                            @endforeach
                        </div>
                    @endif
                @endforeach 
                @if ($conflict == false)
                    <p>This event does not clash with any other event</p>
                @endif
            </p>
        </div>
    </div>
    

@endsection