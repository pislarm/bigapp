@extends('layouts.admin')

@section('content')
  <h1>Create Post</h1>
<div class="row">
  <div class="col-xs-6">
  {!! Form::open(['method'=>'POST', 'action'=>'AdminPostsController@store', 'files'=>true]) !!}

  <div class="form-group">
      {!! Form::label('title', 'Title:') !!}
      {!! Form::text('name', null, ['class'=>'form-control']) !!}
  </div>

  <div class="form-group">
      {!! Form::label('category_id', 'Category:') !!}
      {!! Form::select('category_id', [''=>'Choose category'] + $categories, null, ['class'=>'form-control']) !!}
  </div>

  <div class="form-group">
      {!! Form::label('photo_id', 'Photo Id:') !!}
      {!! Form::file('photo_id', null,['class'=>'form-control']) !!}
  </div>

  <div class="form-group">
      {!! Form::label('body', 'Body:') !!}
      {!! Form::textarea('body', null, ['class'=>'form-control']) !!}
  </div>

  <div class="form-group">
      {!! Form::submit('Create Post', ['class'=>'btn btn-primary', 'rows'=>6]) !!}
  </div>
  {!! Form::close() !!}
</div>
</div>

<div class="row"></div>


  @include('admin.includes.form_error')

</div>


@endsection
