@extends('layouts.app')

@section('content')
<div class="container">    
    <div class="card">
    <div class="card-header">Add members to {{ $group->name }}</div>
    
        <div class='card-body'>
            
        <form action="{{ route('groups.update', $group) }}" method="POST">
            @csrf
            {{ method_field('PUT') }}
            @foreach ($users as $user)
                <div class="form-check">
                    <input type="checkbox" name="users[]" value="{{ $user->id }}" @if($user->groups->contains($user->id)) checked=checked @endif/>
                    <label>{{ $user->name }}</label>
                </div>
            @endforeach
            <button type="submit" class="btn btn-primary">
                Update
            </button>
        </form>
        </div>
    </div>
</div>
@endsection