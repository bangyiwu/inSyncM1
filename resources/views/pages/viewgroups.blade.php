
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
                        <td><a href="/viewgroups/schedule"><button type="button" class="btn btn-primary">Schedule Event</button></a></td>
                    </tr>
                 @endforeach       
        
            </tbody>
          </table>
    </div> 
    </div>    

@endsection