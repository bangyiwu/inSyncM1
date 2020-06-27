@extends('layouts.app')
    
@section('content')

    <h2> On {{$start}} :</h2>

    <div class="card">
        <div class="card-body">  
            <table class="table">
                <thead>
                  <tr>
                    <th scope="col">#</th>
                    <th scope="col">Member</th>
                    <th scope="col">Availability</th>
                    <th scope="col">Reasons</th>
                  </tr>
                </thead>
                <tbody>
                    @php ($row = 0)
                    @foreach ($users as $user)
                        @php ($row = $row + 1)
                        @php ($free = true)
                        <tr>
                            <th scope="row">{{$row}}</th>
                            <td>{{$user->name}}</td>
                            <td>
                                @foreach ($events as $event)
                                    @if($event->user_id == $user->id)
                                        @if ($event->start == $start)
                                        @php ($free = false)
                                        @endif
                                    @endif
                                @endforeach 
                                @if($free == true)
                                    <p>Free</p>
                                @else 
                                <p>Not Free</p>
                                @endif
                            </td>
                            <td>
                                @foreach ($events as $event)
                                    @if($event->user_id == $user->id)
                                        @if ($event->start == $start)
                                            <p>{{$event->title}}</p>
                                        @endif
                                    @endif
                                @endforeach 
                                @if($free == true)
                                    <p>NIL</p>
                                @endif
                            </td>
                        </tr>
                     @endforeach       
                        
                </tbody>
              </table>
          
        </div> 
        </div>    
        <div class="container" style="margin-top: 30px">
      
            <!-- Button trigger modal -->
            <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModal">
            Confirm Event Details
            </button>
      
            <!-- Start Add Modal -->
            <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Create Group Event</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                    </div>
                        <form action="{{ route('routeGroupEventStore') }}" method="POST">
                            @csrf
                            {{ method_field('POST') }}
                            <div class="form-group row">
                                <label for="title" class="col-sm-4 col-form-label">Title</label>
                                <div class="col-sm-8">
                                  <input type="text" name="title" class="form-control" id="title">
                                  <input type="hidden" name="id">
                                  <input type="hidden" name="group_id" class="form-control" id="group_id" value="{{$group_id}}">
                                </div>
                              </div>
                              <div class="form-group row">
                                  <label for="start" class="col-sm-4 col-form-label">Start time</label>
                                  <div class="col-sm-8">
                                    <input type="datetime" name="start" class="form-control date-times"  id="start" value="{{$start}}">
                                  </div>
                                </div>
                                <div class="form-group row">
                                  <label for="end" class="col-sm-4 col-form-label">End time</label>
                                  <div class="col-sm-8">
                                    <input type="datetime" name="end" class="form-control date-times" id="end" value="{{$start}}">
                                  </div>
                                </div>
                                <div class="form-group row">
                                  <label for="color" class="col-sm-4 col-form-label">Color Flag</label>
                                  <div class="col-sm-8">
                                    <input type="color" name="color" class="form-control" id="color" value="#75a832">
                                  </div>
                                </div>
                                <div class="form-group row">
                                  <label for="description" class="col-sm-4 col-form-label">Description of Event</label>
                                  <div class="col-sm-8">
                                    <textarea name="description" id="description" cols="40" rows = "4"></textarea>
                                  </div>
                                </div>
                                <div class="form-group row">
                                  <label for="location" class="col-sm-4 col-form-label">Location of Event</label>
                                  <div class="col-sm-8">
                                    <textarea name="location" id="location" cols="40" rows = "1"></textarea>
                                  </div>
                                </div>
                                <button type="submit" class="btn btn-primary">
                                    Create
                                </button>
                        </form>
                    </div>
                </div>
            </div>
            <!-- End Add Modal -->
            <a href="/viewgroups/schedule/{{$group_id}}" class="btn btn-success" role="button">Try another time</a>

@endsection