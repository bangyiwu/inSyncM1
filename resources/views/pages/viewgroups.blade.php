
@extends('layouts.app')

@section('content')
    <h1>View Groups</h1>
    <p>This is where you can view your groups</p>
    <p>Current users on site are:</p>
        </p>
        @foreach ($users as $user)
            <div class="flex-center">
                <h4>{{$user->name}}</h4>
            </div>                    
        @endforeach
        </p>
@endsection