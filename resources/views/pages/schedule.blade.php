@extends('layouts.app')

@section('content')
<div class="card">
    <div class="card-body">
        <div>
            @if ($errors->any())
            <div class="alert alert-danger">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif
        @if(session()->has('message'))
              <div class="alert alert-danger">
                {!! session('message') !!}
              </div>
          @endif
        <h3>Enter your preferred time here: </h3>
        <form action="/viewgroups/date" method="post" class="pt-3">
            @csrf
            <input type="datetime-local" name="datetime" >
            <input type="hidden" name="group_id" value = {{$group_id}}>
            <input type="submit" class="btn btn-primary">
        </form>
        
        </div>
    </div>
</div>


@endsection