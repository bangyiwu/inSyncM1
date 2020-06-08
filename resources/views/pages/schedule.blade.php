@extends('layouts.app')

@section('content')

<form action="/viewgroups/date" method="post">
    @csrf
    <input type="datetime-local" name="datetime" />
    <input type="submit">
</form>

@endsection