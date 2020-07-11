@extends('layouts.app')

@section('content')
<div class="card">
  <div class="card-body">  
    @if($count > 0)
    <h1>My Events</h1>
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
                    @php ($row = $row + 1)
                    @php ($conflict = false)
                    <tr>
                        <th scope="row">{{$row}}</th>
                        <td><a href="/myevents/{{$event->id}}">{{$event->title}}</a></td>
                        <td>{{$event->location}}</td>
                        <td>{{$event->start}}</td>
                        @foreach ($events as $innerevent)
                            @if(($event->location == $innerevent->location) && 
                            (($event->end < $innerevent->end && $event->end > $innerevent->start) ||
                            ($event->start > $innerevent->start && $event->start < $innerevent->end)||
                            ($event->start <= $innerevent->start && $event->end >= $innerevent->end))
                            && ($event->id !== $innerevent->id))
                                @php ($conflict = true)
                            @endif
                        @endforeach
                        @if($conflict == true)
                        <td>TRUE</td>
                        @else
                        <td>FALSE</td>
                        @endif
                    </tr>
          @endforeach
        </tbody>
      </table>
      @else
      <div class="cover-container d-flex h-100 p-3 mx-auto flex-column text-center">
        <p>You currently have no events</p>
      </div>
      @endif  
    </div>  
</div>
@endsection
