@extends('layouts.app')

@section('content')
<div class="card">
    <div class="card-body">
        <h1 class="underlined">Inbox</h1>
        @if ($count == 0)
            <div class="cover-container d-flex h-100 p-3 mx-auto flex-column text-center">
                <p>You have no unread notifications</p>
             </div>
        @endif
        <ul class="list-group">
            @foreach ($notifications as $item)
                <li class="list-group-item list-group-item-dark"><a href="/groupevents/{{$item->data['groupEvent']['id']}}">{{$item->data['group']['name']}} has scheduled a new event with you: {{$item->data['groupEvent']['title']}}</a></li>
            @endforeach
        </ul>
    </div>
</div>
    
@endsection

