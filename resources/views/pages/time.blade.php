@extends('layouts.app')
    
@section('content')
    <p>Time deconflicting page</p> 
    <p> On {{$start}}, these members are not free:</p>
    @foreach ($events as $event)
        @if ($event->start == $start)
            @foreach($users as $user)
                @if($event->user_id == $user->id)
                <p>{{$user->name}}</p>
                @endif
            @endforeach
            because he/she has <p>{{$event->title}}</p>  
        @endif 
    @endforeach
@endsection