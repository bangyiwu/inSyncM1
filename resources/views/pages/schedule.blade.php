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
@endsection