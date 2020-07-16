@extends('layouts.app')
    
@section('content')
    <div class="card">
        <div class="card-body">
            <h2 class="underlined">Upcoming conflicts</h2>
            <table class="table table-dark">
                <h2 class="pt-2">MPSH</h2>
                <thead>
                  <tr>
                    <th scope="col">Event</th>
                    <th scope="col">Start Time</th>
                    <th scope="col">Booked By</th>

                  </tr>
                </thead>
                <tbody>
                    @foreach ($events as $event)
                        @foreach ($events as $innerevent)
                    <tr>
                        @if(($event->location == "MPSH" && $innerevent->location == "MPSH" && ($event->id !== $innerevent->id)) && 
                        (($event->end < $innerevent->end && $event->end > $innerevent->start) ||
                        ($event->start > $innerevent->start && $event->start < $innerevent->end)||
                        ($event->start <= $innerevent->start && $event->end >= $innerevent->end) ||
                        ($event->start == $innerevent->start))
                        )
                            @php ($conflict = true)
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
                            @break
                        @endif
                    </tr>
                        @endforeach 
                    @endforeach 
                </tbody>
              </table>
              <table class="table table-dark">
                <h2 class="pt-2">Dance Studio</h2>
                <thead>
                  <tr>
                    <th scope="col">Event</th>
                    <th scope="col">Start Time</th>
                    <th scope="col">Booked By</th>

                  </tr>
                </thead>
                <tbody>
                    @foreach ($events as $event)
                        @foreach ($events as $innerevent)
                    <tr>
                        @if(($event->location == "Dance Studio" && $innerevent->location == "Dance Studio" && ($event->id !== $innerevent->id)) && 
                        (($event->end < $innerevent->end && $event->end > $innerevent->start) ||
                        ($event->start > $innerevent->start && $event->start < $innerevent->end)||
                        ($event->start <= $innerevent->start && $event->end >= $innerevent->end) ||
                        ($event->start == $innerevent->start))
                        )
                            @php ($conflict = true)
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
                            @break
                        @endif
                    </tr>
                        @endforeach 
                    @endforeach 
                </tbody>
              </table>
              <table class="table table-dark">
                <h2 class="pt-2">Function Hall</h2>
                <thead>
                  <tr>
                    <th scope="col">Event</th>
                    <th scope="col">Start Time</th>
                    <th scope="col">Booked By</th>

                  </tr>
                </thead>
                <tbody>
                    @foreach ($events as $event)
                        @foreach ($events as $innerevent)
                    <tr>
                        @if(($event->location == "Function Hall" && $innerevent->location == "Function Hall" && ($event->id !== $innerevent->id)) && 
                        (($event->end < $innerevent->end && $event->end > $innerevent->start) ||
                        ($event->start > $innerevent->start && $event->start < $innerevent->end)||
                        ($event->start <= $innerevent->start && $event->end >= $innerevent->end) ||
                        ($event->start == $innerevent->start))
                        )
                            @php ($conflict = true)
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
                            @break
                        @endif
                    </tr>
                        @endforeach 
                    @endforeach 
                </tbody>
              </table>
              <table class="table table-dark">
                <h2 class="pt-2">Squash Court</h2>
                <thead>
                  <tr>
                    <th scope="col">Event</th>
                    <th scope="col">Start Time</th>
                    <th scope="col">Booked By</th>

                  </tr>
                </thead>
                <tbody>
                    @foreach ($events as $event)
                        @foreach ($events as $innerevent)
                    <tr>
                        @if(($event->location == "Squash Court" && $innerevent->location == "Squash Court" && ($event->id !== $innerevent->id)) && 
                        (($event->end < $innerevent->end && $event->end > $innerevent->start) ||
                        ($event->start > $innerevent->start && $event->start < $innerevent->end)||
                        ($event->start <= $innerevent->start && $event->end >= $innerevent->end) ||
                        ($event->start == $innerevent->start))
                        )
                            @php ($conflict = true)
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
                            @break
                        @endif
                    </tr>
                        @endforeach 
                    @endforeach 
                </tbody>
              </table>
              <table class="table table-dark">
                <h2 class="pt-2">Lounge</h2>
                <thead>
                  <tr>
                    <th scope="col">Event</th>
                    <th scope="col">Start Time</th>
                    <th scope="col">Booked By</th>

                  </tr>
                </thead>
                <tbody>
                    @foreach ($events as $event)
                        @foreach ($events as $innerevent)
                    <tr>
                        @if(($event->location == "Lounge" && $innerevent->location == "Lounge" && ($event->id !== $innerevent->id)) && 
                        (($event->end < $innerevent->end && $event->end > $innerevent->start) ||
                        ($event->start > $innerevent->start && $event->start < $innerevent->end)||
                        ($event->start <= $innerevent->start && $event->end >= $innerevent->end) ||
                        ($event->start == $innerevent->start))
                        )
                            @php ($conflict = true)
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
                            @break
                        @endif
                    </tr>
                        @endforeach 
                    @endforeach 
                </tbody>
              </table>
              <table class="table table-dark">
                <h2 class="pt-2">Dining Hall</h2>
                <thead>
                  <tr>
                    <th scope="col">Event</th>
                    <th scope="col">Start Time</th>
                    <th scope="col">Booked By</th>

                  </tr>
                </thead>
                <tbody>
                    @foreach ($events as $event)
                        @foreach ($events as $innerevent)
                    <tr>
                        @if(($event->location == "Dining Hall" && $innerevent->location == "Dining Hall" && ($event->id !== $innerevent->id)) && 
                        (($event->end < $innerevent->end && $event->end > $innerevent->start) ||
                        ($event->start > $innerevent->start && $event->start < $innerevent->end)||
                        ($event->start <= $innerevent->start && $event->end >= $innerevent->end) ||
                        ($event->start == $innerevent->start))
                        )
                            @php ($conflict = true)
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
                            @break
                        @endif
                    </tr>
                        @endforeach 
                    @endforeach 
                </tbody>
              </table>
        </div>
    </div>
    
@endsection