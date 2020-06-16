@extends('layouts.app')
    
@section('content')
    <h2>Details of {{$groupEvent->title}} on {{$groupEvent->start}}</h2>
    <h3>Description:</h3>
    <p>{{$groupEvent->description}}</p>
    <h3>This event clashes with:</h3>
    <p>
         @foreach ($events as $innerevent)
            @if(($groupEvent->location == $innerevent->location) && ($event->start == $innerevent->start) && ($event->id !== $innerevent->id))
            <div class="overlap">
                {{$innerevent->title}} booked by {{$innerevent->user_id}}
            </div>
            @endif
        @endforeach 
    </p>

    <div class="container" style="margin-top: 30px">
      
        <!-- Button trigger modal -->
        <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModal">
        Edit Group Event
        </button>
  
        <!-- Start Add Modal -->
        <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Update Group Event</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
                </div>
                    <form action="{{ route('routeGroupEventUpdate') }}" method="POST">
                        @csrf
                        {{ method_field('PUT') }}
                        <div class="form-group row">
                            <label for="title" class="col-sm-4 col-form-label">Title</label>
                            <div class="col-sm-8">
                              <input type="text" name="title" class="form-control" id="title" value="{{$groupEvent->title}}">
                              <input type="hidden" name="id" value="{{$groupEvent->id}}">
                              <input type="hidden" name="group_id" class="form-control" id="group_id" value="{{$groupEvent->group_id}}">
                            </div>
                          </div>
                          <div class="form-group row">
                              <label for="start" class="col-sm-4 col-form-label">Start time</label>
                              <div class="col-sm-8">
                                <input type="datetime" name="start" class="form-control date-times"  id="start" value="{{$groupEvent->start}}">
                              </div>
                            </div>
                            <div class="form-group row">
                              <label for="end" class="col-sm-4 col-form-label">End time</label>
                              <div class="col-sm-8">
                                <input type="datetime" name="end" class="form-control date-times" id="end" value="{{$groupEvent->end}}">
                              </div>
                            </div>
                            <div class="form-group row">
                              <label for="color" class="col-sm-4 col-form-label">Color Flag</label>
                              <div class="col-sm-8">
                                <input type="color" name="color" class="form-control" id="color" value="{{$groupEvent->color}}">
                              </div>
                            </div>
                            <div class="form-group row">
                              <label for="description" class="col-sm-4 col-form-label">Description of Event</label>
                              <div class="col-sm-8">
                                <textarea name="description" id="description" cols="40" rows = "4" >{{$groupEvent->description}}</textarea>
                              </div>
                            </div>
                            <div class="form-group row">
                              <label for="location" class="col-sm-4 col-form-label">Location of Event</label>
                              <div class="col-sm-8">
                                <textarea name="location" id="location" cols="40" rows = "1" >{{$groupEvent->location}}</textarea>
                              </div>
                            </div>
                            <button type="submit" class="btn btn-primary name="action" value="update">Update</button>
                    </form>
                </div>
            </div>
        </div>
        <!-- End Add Modal -->
        <form action="{{route('groupEvent.delete', $groupEvent->id)}}" method='POST'>
            {{csrf_field()}}
            {{method_field('DELETE')}}
            <button type="submit" class = 'btn btn-danger'>Delete</button>
        </form>
@endsection