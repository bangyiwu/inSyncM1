
@extends('layouts.app')

@section('content')

    <div class="card">
    <div class="card-body">  
        <table class="table">
            <thead>
              <tr>
                <th scope="col">#</th>
                <th scope="col">Group</th>
                <th scope="col">Actions</th>

              </tr>
            </thead>
            <tbody>
                @php ($row = 0)
                @foreach ($groups as $group)
                    @php ($row = $row + 1)
                    <tr>
                        <th scope="row">{{$row}}</th>
                        <td>{{ $group->name }}</td>
                        <td><a href="/viewgroups/schedule/{{$group->id}}"><button type="button" class="btn btn-primary">Schedule Event</button></a> <a href="/viewgroups/events/{{$group->id}}"><button type="button" class="btn btn-primary">View/Edit Event</button></a></td>
                        
                    </tr>
                 @endforeach       
        
            </tbody>
          </table>
          {{ $groups->links() }}
          @if(session()->has('message'))
              <div class="alert alert-success">
                  {{ session()->get('message') }}
              </div>
          @endif
    </div> 
    </div>    

@endsection