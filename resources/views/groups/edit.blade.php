@extends('layouts.app')

@section('content')
<div class="container">  
    <div class="card" style="margin-bottom: 30px">
        <div class="card-header">Edit group name for {{ $group->name }}</div>
        
            <div class='card-body'>
            <form class="form-inline my-2 my-lg-0" type="put" action="{{ url("/editgroupname/{$group->id}") }}">
                    <input class="form-control mr-sm-2" type="put" placeholder="{{ $group->name }}">
                    <button class="btn btn-primary" type="submit">Update</button>
            </form>
            </div>
    </div>

    <div class="card" style="margin-bottom: 30px">
        <div class="card-header">Add members to {{ $group->name }}</div>
        
            <div class='card-body'>
            <form class="form-inline my-2 my-lg-0" type="get" action="{{ url("/searchforgroup/{$group->id}") }}">
                    <input class="form-control mr-sm-2" name="query" type="search" placeholder="Search Users">
                    <button class="btn btn-primary" type="submit">Search</button>
            </form>
            </div>
    </div>
    
    <div>
        <!-- Button trigger modal -->
        <button type="button" class="btn btn-danger float-right" data-toggle="modal" data-target="#exampleModal">
            Delete Group
        </button>
    
            <!-- Start Add Modal -->
            <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                <div class="modal-dialog">
                    <div class="modal-content">
                        <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">Permanently delete {{ $group->name }}?</h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                <form action="{{ route('groups.destroy', $group->id) }}" method="POST">
                                    @csrf
                                    {{ method_field('DELETE') }}
                                    <button type="submit" class="btn btn-danger float-right">Confirm</button></a>
                                </form>
                        </div>
                    </div>
                </div>
            </div>
            <!-- End Add Modal -->
    </div>
</div>
@endsection