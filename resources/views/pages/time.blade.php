@extends('layouts.app')
    
@section('content')

    <h2> On {{$start}} :</h2>

    <div class="card">
        <div class="card-body">  
            <table class="table">
                <thead>
                  <tr>
                    <th scope="col">#</th>
                    <th scope="col">Member</th>
                    <th scope="col">Availability</th>
                    <th scope="col">Reasons</th>
                  </tr>
                </thead>
                <tbody>
                    @php ($row = 0)
                    @foreach ($users as $user)
                        @php ($row = $row + 1)
                        @php ($free = true)
                        <tr>
                            <th scope="row">{{$row}}</th>
                            <td>{{$user->name}}</td>
                            <td>
                                @foreach ($events as $event)
                                    @if($event->user_id == $user->id)
                                        @if ($event->start == $start)
                                        @php ($free = false)
                                        @endif
                                    @endif
                                @endforeach 
                                @if($free == true)
                                    <p>Free</p>
                                @else 
                                <p>Not Free</p>
                                @endif
                            </td>
                            <td>
                                @foreach ($events as $event)
                                    @if($event->user_id == $user->id)
                                        @if ($event->start == $start)
                                            <p>{{$event->title}}</p>
                                        @endif
                                    @endif
                                @endforeach 
                                @if($free == true)
                                    <p>NIL</p>
                                @endif
                            </td>
                        </tr>
                     @endforeach       
            
                </tbody>
              </table>
        </div> 
        </div>    
@endsection