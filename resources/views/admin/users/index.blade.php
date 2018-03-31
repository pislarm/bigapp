@extends('layouts.admin')


@section('content')

  <h1>Users</h1>

<div class="col-xs-6">
  <table class="table table-hover">
    <thead>
      <tr>
        <th>Id</th>
        <td>Photo</td>
        <th>Name</th>
        <th>Email</th>
        <th>Role</th>
        <th>Status</th>
        <th>Created</th>
        <th>Updated</th>
      </tr>
    </thead>
    <tbody>
      @if($users)
        @foreach ($users as $user)
          <tr>
            <td>{{$user->id}}</td>
            <td><a href="{{route('users.edit', $user->id)}}"><img class="thumbnail" height="50" src="{{$user->photo ? $user->photo->file : 'http://placehold.it/500x500'}}" alt=""></td>
            <td>{{$user->name}}</td>
            <td>{{$user->email}}</td>
            <td>{{$user->role->name}}</td>
            <td>{{$user->is_active}}</td>
            <td>{{$user->created_at->diffForHumans()}}</td>
            <td>{{$user->updated_at}}</td>
          </tr>
        </a>
        @endforeach
      @endif
    </tbody>
  </table>
</div>


@stop
