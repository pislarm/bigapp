@extends('layouts.admin')

@section('content')
  <h1>Media</h1>


  <div class="col-sm-6">
    @if ($photos)
    <table class="table">
      <thead>
        <th>id</th>
        <th>name</th>
        <th>date created</th>
      </thead>
      <tbody>
        @foreach ($photos as $photo)
        <tr>
          <td>{{$photo->id}}</td>
          <td><img src="{{$photo->file}}" width="150"></a></td>
          <td>{{$photo->created_at ? $photo->created_at : 'No date'}}</td>
          <td>
            {!! Form::open(['method'=>'DELETE', 'action'=>['AdminMediaController@destroy', $photo->id]]) !!}

            <div class="form-group">
                {!! Form::submit('Delete Photo', ['class'=>'btn btn-danger']) !!}
            </div>

            {!! Form::close() !!}
          </td>
        </tr>
        @endforeach
      </tbody>
    </table>
    @endif

  </div>

@endsection
