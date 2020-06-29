@extends('layouts.app')

@section('content')
<div class="container">
<h3>Enter your preferred time here: </h3>
<form action="/viewgroups/date" method="post">
    @csrf
    <input type="datetime-local" name="datetime" >
    <input type="hidden" name="group_id" value = {{$group_id}}>
    <input type="submit" class=>
</form>
</div>
@if ($errors->any())
    <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif
@endsection