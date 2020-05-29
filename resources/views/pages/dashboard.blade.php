@extends('layouts.app')

@section('content')
    <h1>Dashboard</h1>
    <p>This is the home page</p>
@endsection

@section('calendar')
    @include('fullcalendar.master')
@endsection

