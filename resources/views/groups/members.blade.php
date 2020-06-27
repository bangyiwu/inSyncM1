@extends('layouts.app')

@section('content')

    <div class="card" style="margin-bottom: 30px">
    <div class="card-header">{{ $group->name }} Admins</div>
    <div class="card-body">  
        <table class="table">
            <thead>
              <tr>
                <th scope="col">#</th>
                <th scope="col">Members</th>
                <th scope="col">Actions</th>
              </tr>
            </thead>
            <tbody>
                @php ($row = 0)
            @foreach ($users as $user)
            @if ($group->leaders()->find($user->id))
                @php ($row = $row + 1)
                <tr>
                    <th scope="row">{{$row}}</th>
                    <td>{{ $user->name }}</td>
                    <td>
                        @if ($user->id != $currentUser)
                        <!-- Button trigger modal -->
                        <button type="button" class="btn btn-danger btn-sm" data-toggle="modal" data-target="#exampleModal">
                        Remove
                        </button>
                        <a class="btn btn-outline-info btn-sm" href="{{ url("/revokeadmin/{$group->id}/{$user->id}") }}" role="button">Revoke Admin</a>

                
                        <!-- Start Add Modal -->
                        <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                            <div class="modal-dialog">
                                <div class="modal-content">
                                    <div class="modal-header">
                                    <h5 class="modal-title" id="exampleModalLabel">Remove {{ $user->name }} from {{ $group->name }}?</h5>
                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                            <span aria-hidden="true">&times;</span>
                                        </button>
                                    </div>
                                    <div class="modal-footer">
                                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                        <a href="{{ url("/editgroups/groups/{$group->id}/members/{$user->id}") }}" class="float-left">
                                        <button type="submit" class="btn btn-primary">Confirm</button></a>
                                        </a>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- End Add Modal -->
                        @endif
                    </td>
                </tr>
                @endif
            @endforeach
        
            </tbody>
          </table>
          {{-- {{ $users->links() }} --}}
    </div> 
    </div>  
    
    <div class="card">
        <div class="card-header">{{ $group->name }} Members</div>
        <div class="card-body">  
            <table class="table">
                <thead>
                  <tr>
                    <th scope="col">#</th>
                    <th scope="col">Members</th>
                    <th scope="col">Actions</th>
                  </tr>
                </thead>
                <tbody>
                    @php ($row = 0)
                    @foreach ($users as $user)
                        @if (!($group->leaders()->find($user->id)))
                        @php ($row = $row + 1)
                        <tr>
                            <th scope="row">{{$row}}</th>
                            <td>{{ $user->name }}</td>
                            <td>
                                @if ($user->id != $currentUser)
                                <!-- Button trigger modal -->
                                <button type="button" class="btn btn-danger btn-sm" data-toggle="modal" data-target="#exampleModal">
                                Remove
                                </button>
                            <a class="btn btn-primary btn-sm" href="{{ url("/makeadmin/{$group->id}/{$user->id}") }}">Make Admin</a>
        
                                <!-- Start Add Modal -->
                                <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                    <div class="modal-dialog">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                            <h5 class="modal-title" id="exampleModalLabel">Remove {{ $user->name }} from {{ $group->name }}?</h5>
                                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                    <span aria-hidden="true">&times;</span>
                                                </button>
                                            </div>
                                            <div class="modal-footer">
                                                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                                <a href="{{ url("/editgroups/groups/{$group->id}/members/{$user->id}") }}" class="float-left">
                                                <button type="submit" class="btn btn-primary">Confirm</button></a>
                                                </a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <!-- End Add Modal -->
                                @endif
                            </td>
                        </tr>
                        @endif
                    @endforeach
            
                </tbody>
              </table>
              {{-- {{ $users->links() }} --}}
        </div> 

@endsection