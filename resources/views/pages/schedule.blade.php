@extends('layouts.app')

@section('content')

<h3>Enter your preferred time here: </h3>
<form action="/viewgroups/date" method="post">
    @csrf
    <input type="datetime-local" name="datetime" />
    <input type="submit">
</form>

@endsection