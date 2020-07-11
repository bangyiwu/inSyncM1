@extends('layouts.app')
    
@section('content')
    <h2>Details of {{$groupEvent->title}} on {{$groupEvent->start}}</h2>
    <h3>Description:</h3>
    <p>{{$groupEvent->description}}</p>
    <p>{{$group->name}}</p>
    <p>Attendace</p>
    @foreach ($attendances as $attendance)
        <p>{{$attendance->name}} will be : 
        @if ($attendance->attend == 1)
            attending    
        @else
            not be attending, reason: {{$attendance->reason}}
        @endif</p>
    @endforeach
    
    <p>Yet to indicate</p>
    @foreach ($yetToIndicate as $yet)
            <p>{{$yet->name}}</p>
    @endforeach

    
   
    <div class="container" style="margin-top: 30px">
        <div class="row">
            <form action="/attendance-store" method="post">
                @csrf
                <input type="hidden" name="groupEvent_id" value = {{$groupEvent->id}}>
                <input type="hidden" name="group_id" value = {{$group->id}}>
                <input type="hidden" name="attend" value = 1>
                <input type="submit" class="btn btn-primary" value = "I will be present!">
            </form>
        
            <!-- Button trigger modal -->
            <button type="button" class="btn btn-danger" data-toggle="modal" data-target="#exampleModal">
            I will be absent!
            </button>
    
            <!-- Start Add Modal -->
            <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Reason for your absence</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                    </div>
                        <form action="{{ route('attendance.store') }}" method="POST">
                            @csrf
                            {{ method_field('POST') }}
                            <div class="form-group row">
                                <label for="reason" class="col-sm-4 col-form-label">Reason:</label>
                                <div class="col-sm-8">
                                    <input type="text" name="reason" class="form-control" id="title">
                                    {{-- <input type="hidden" name="group_id" class="form-control" id="group_id" value= 0> --}}
                                    <input type="hidden" name="groupEvent_id" value = {{$groupEvent->id}}>
                                    <input type="hidden" name="group_id" value = {{$group->id}}>
                                    <input type="hidden" name="attend" value = 0>
                                </div>
                            </div>
                            
                                <button type="submit" class="btn btn-primary">
                                    Confirm
                                </button>
                        </form>
                    </div>
                </div>
        </div>
    </div>
@endsection