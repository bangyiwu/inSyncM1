@extends('layouts.app')
    
@section('content')
    <div class="card">
        <div class="card-body">
            <h2 class="underlined">Details of {{$event->title}} on {{$event->start}}</h2>
            <h3>Description:</h3>
            <h5 class="underlined-top">{{$event->description}}</p>
            <h3>This event clashes with:</h3>
            @php ($conflict = false)
            <table class="table table-dark">
                <thead>
                  <tr>
                    <th scope="col">Event</th>
                    <th scope="col">Booked By</th>
                  </tr>
                </thead>
                <tbody>
                    @foreach ($events as $innerevent)
                        <tr>
                            @if(($event->location == $innerevent->location) && 
                            (($event->end < $innerevent->end && $event->end > $innerevent->start) ||
                            ($event->start > $innerevent->start && $event->start < $innerevent->end)||
                            ($event->start <= $innerevent->start && $event->end >= $innerevent->end) ||
                            ($event->start == $innerevent->start))
                            && ($event->id !== $innerevent->id))
                                @php ($conflict = true)
                                <td>
                                    {{$innerevent->title}}
                                </td>
                                <td>
                                    @foreach ($users as $item)
                                        @if ($innerevent->user_id == $item->id)
                                            {{$item->name}}
                                        @endif
                                    @endforeach
                                </td>
                            @endif
                        </tr>
                    @endforeach 
                </tbody>
              </table>
                @if ($conflict == false)
                    <p>This event does not clash with any other event</p>
                @endif
        </div>
    </div>
    

@endsection