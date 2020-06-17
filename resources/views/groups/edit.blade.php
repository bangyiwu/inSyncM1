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

    <div class="card">
        <div class="card-header">Add members to {{ $group->name }}</div>
        
            <div class='card-body'>
            <form class="form-inline my-2 my-lg-0" type="get" action="{{ url("/searchforgroup/{$group->id}") }}">
                    <input class="form-control mr-sm-2" name="query" type="search" placeholder="Search Users">
                    <button class="btn btn-primary" type="submit">Search</button>
            </form>
            </div>
    </div>
</div>
@endsection