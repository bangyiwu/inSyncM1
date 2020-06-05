@extends('layouts.app')

@section('content')

<form action="/viewgroups/date" method="post">
    @csrf
    <input type="text" name="datetime" />
    <input type="submit">
</form>

@endsection