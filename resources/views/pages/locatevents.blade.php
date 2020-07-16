@extends('layouts.app')
    
@section('content')
    <div class="card">
        <div class="card-body">
            <h2 class="underlined">Upcoming Events at {{$location}}</h2>
            @if ($count>0)
            <table class="table table-dark">
                <thead>
                  <tr>
                    <th scope="col">Event</th>
                    <th scope="col">Start Time</th>
                    <th scope="col">Booked By</th>
                    <th scope="col">Conflict</th>

                  </tr>
                </thead>
                <tbody>
                    @foreach ($events as $event)
                    @php ($conflict = false)
                        <tr>
                            {{-- @if(($event->location == $innerevent->location) && 
                            (($event->end < $innerevent->end && $event->end > $innerevent->start) ||
                            ($event->start > $innerevent->start && $event->start < $innerevent->end)||
                            ($event->start <= $innerevent->start && $event->end >= $innerevent->end) ||
                            ($event->start == $innerevent->start))
                            && ($event->id !== $innerevent->id)) --}}
                                {{-- @php ($conflict = true) --}}
                                <td>
                                    {{$event->title}}
                                </td>
                                <td>
                                    {{$event->start}}
                                </td>
                                <td>
                                    @foreach ($users as $item)
                                        @if ($event->user_id == $item->id)
                                            {{$item->name}}
                                        @endif
                                    @endforeach
                                </td>
                                    @foreach ($events as $innerevent)
                                        @if(($event->location == $innerevent->location) && 
                                        (($event->end < $innerevent->end && $event->end > $innerevent->start) ||
                                        ($event->start > $innerevent->start && $event->start < $innerevent->end)||
                                        ($event->start <= $innerevent->start && $event->end >= $innerevent->end) ||
                                        ($event->start == $innerevent->start))
                                        && ($event->id !== $innerevent->id))
                                            @php ($conflict = true)
                                        @endif
                                    @endforeach
                                    @if($conflict == true)
                                        <td class="red">TRUE</td>
                                    @else
                                        <td>FALSE</td>
                                    @endif
                            </tr>
                    @endforeach 
                </tbody>
              </table>
            @else
                <p>This event does not clash with any other event</p>
            @endif
        </div>
    </div>
    

@endsection