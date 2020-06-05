
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
                @foreach ($groups as $group)
                    <tr>
                        <th scope="row">{{ $group->id }}</th>
                        <td>{{ $group->name }}</td>
                    </tr>
                 @endforeach       
        
            </tbody>
          </table>
    </div> 
    </div>
    
@endsection