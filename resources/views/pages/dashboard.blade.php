@extends('layouts.app')

@section('content')
    <h1>Dashboard</h1>
    <p>This is the home page</p>
@endsection
@if(session()->has('message'))
              <div class="alert alert-danger">
                {!! session('message') !!}
              </div>
          @endif
@section('calendar')
    @include('fullcalendar.master')
    @include('fullcalendar.modal-calendar')
@endsection

