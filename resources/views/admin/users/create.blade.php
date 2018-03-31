@extends('layouts.admin')


@section('content')

    <h1>Create user</h1>

    <div class="col-xs-6">
    {!! Form::open(['method'=>'POST', 'action'=>'AdminUsersController@store']) !!}

    <div class="form-group">
        {!! Form::label('name', 'Name:') !!}
        {!! Form::text('name', null, ['class'=>'form-control']) !!}
    </div>

    <div class="form-group">
        {!! Form::submit('Create User', ['class'=>'btn btn-primary']) !!}
    </div>

    {!! Form::close() !!}

    </div>
@stop
