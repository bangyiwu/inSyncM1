@extends('layouts.app')
    
@section('content')
<div class="card">
  <div class="card-body">
    @if(session()->has('message'))
              <div class="alert alert-danger">
                {!! session('message') !!}
              </div>
          @endif
    <h2 class="underlined">Details of {{$groupEvent->title}} on {{$groupEvent->start}}</h2>
    <h3>Description:</h3>
    <h5 class="underlined-top">{{$groupEvent->description}}</p>
    <h3>This event clashes with:</h3>
    <table class="table table-dark">
      @php ($conflict = false)
                <thead>
                  <tr>
                    <th scope="col">Event</th>
                    <th scope="col">Booked By</th>
                  </tr>
                </thead>
                <tbody>
                    @foreach ($events as $innerevent)
                        <tr>
                            @if(($groupEvent->location == $innerevent->location) && 
                            (($groupEvent->end < $innerevent->end && $groupEvent->end > $innerevent->start) ||
                            ($groupEvent->start > $innerevent->start && $groupEvent->start < $innerevent->end)||
                            ($groupEvent->start <= $innerevent->start && $groupEvent->end >= $innerevent->end) ||
                            ($groupEvent->start == $innerevent->start))
                            && ($groupEvent->id !== $innerevent->id))
                                @php ($conflict = true)
                                <td>
                                    {{$innerevent->title}}
                                </td>
                                <td>
                                    @foreach ($users as $item)
                                        @if ($innerevent->user_id == $item->id)
                                            {{$item->name}}
                                        @endif
                                    @endforeach
                                </td>
                            @endif
                        </tr>
                    @endforeach 
                </tbody>
              </table>
                @if ($conflict == false)
                    <p>This event does not clash with any other event</p>
                @endif
    
    @if ($group->leaders()->find($thisUser->id)) 
      <div class="container" style="margin-top: 30px">
        <div class="row">
          <!-- Button trigger modal -->
          <button type="button" class="btn btn-primary mr-1" data-toggle="modal" data-target="#exampleModal">
          Edit Group Event
          </button>
          <form action="{{route('groupEvent.delete', $groupEvent->id)}}" method='POST'>
            {{csrf_field()}}
            {{method_field('DELETE')}}
            <button type="submit" class = 'btn btn-danger'>Delete</button>
        </form>
      </div>
    @endif
  
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
                                <input type="datetime-local" name="start" class="form-control date-times"  id="start" value="{{$start}}">
                              </div>
                            </div>
                            <div class="form-group row">
                              <label for="end" class="col-sm-4 col-form-label">End time</label>
                              <div class="col-sm-8">
                                <input type="datetime-local" name="end" class="form-control date-times" id="end" value="{{$end}}">
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

  </div>
</div>
    
@endsection