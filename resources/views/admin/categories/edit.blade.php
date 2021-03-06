@extends('layouts.admin')


@section('content')

  <h1>Edit categories</h1>
  <div class="col-sm-6">
    {!! Form::model($category,['method'=>'PATCH', 'action'=>['AdminCategoriesController@update', $category->id]]) !!}
    <div class="form-group">
      {!! Form::label('column', 'Column') !!}
      {!! Form::text('column', null, ['class'=>'form-control']) !!}

    </div>

    <div class="form-group">
        {!! Form::submit('Update category', ['class'=>'btn btn-primary']) !!}
    </div>

    {!! Form::close() !!}
  </div>

  <div class="col-sm-6">
    {!! Form::open(['method'=>'DELETE', 'action'=>['AdminCategoriesController@destroy', $category->id]]) !!}

    <div class="form-group">
        {!! Form::submit('Delete Category', ['class'=>'btn btn-danger']) !!}
    </div>

    {!! Form::close() !!}

  </div>

  @endsection
