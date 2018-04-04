@extends('layouts.admin')


@section('content')

  <h1>Categories Index</h1>
  <div class="col-sm-6">
    {!! Form::open(['method'=>'POST', 'action'=>'AdminCategoriesController@store']) !!}
    <div class="form-group">
      {!! Form::label('column', 'Column') !!}
      {!! Form::text('column', null, ['class'=>'form-control']) !!}

    </div>

    <div class="form-group">
        {!! Form::submit('Create category', ['class'=>'btn btn-primary']) !!}
    </div>

    {!! Form::close() !!}


  </div>


  <div class="col-sm-6">
    @if ($categories)
    <table class="table">
      <thead>
        <th>id</th>
        <th>Column</th>
        <th>date created</th>
      </thead>
      <tbody>
        @foreach ($categories as $category)
        <tr>
          <td>{{$category->id}}</td>
          <td><a href="{{route('categories.edit', $category->id)}}">{{$category->column}}</a></td>
          <td>{{$category->created_at ? $category->created_at : 'No date'}}</td>
        </tr>
        @endforeach
      </tbody>
    </table>
    @endif

  </div>
@endsection
