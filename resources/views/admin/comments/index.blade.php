@extends('layouts.admin')

@section('content')
  <h1>Comments</h1>


<div class="col-xs-6">
  @if(count($comments) > 0)
  <table class="table table-hover">
    <thead>
      <tr>
        <th>Id</th>
        <td>Post_id</td>
        <th>Is active</th>
        <th>Author</th>
        <th>Email</th>
        <th>Body</th>
        <th>Created</th>
        <th>View post</th>
        <td>Replies</td>
      </tr>
    </thead>
    <tbody>
      @foreach ($comments as $comment)

          <tr>
            <td>{{$comment->id}}</td>
            <td>{{$comment->post_id}}</td>
            <td>{{$comment->is_active}}</td>
            <td>{{$comment->author}}</td>
            <td>{{$comment->email}}</td>
            <td>{{$comment->body}}</td>
            <td>{{$comment->created_at}}</td>
            <td><a href="{{route('home.post', $comment->post->id)}}">View Post</a></td>
            <td><a href="{{route('replies.show', $comment->id)}}">View Replies</a></td>

            <td>
              @if ($comment->is_active == 1)
                {!! Form::open(['method'=>'PATCH', 'action'=>['PostCommentsController@update', $comment->id]]) !!}
                <input type="hidden" name="is_active" value="0">
                <div class="form-group">
                    {!! Form::submit('Unapprove',['class'=>'btn btn-warning']) !!}
                </div>
                {!! Form::close() !!}
              @else
                {!! Form::open(['method'=>'PATCH', 'action'=>['PostCommentsController@update', $comment->id]]) !!}
                <input type="hidden" name="is_active" value="1">
                <div class="form-group">
                    {!! Form::submit('Approve',['class'=>'btn btn-primary']) !!}
                </div>
                {!! Form::close() !!}
              @endif
            </td>
            <td>

              {!! Form::open(['method'=>'DELETE', 'action'=>['PostCommentsController@destroy', $comment->id]]) !!}

              <div class="form-group">
                  {!! Form::submit('Delete',['class'=>'btn btn-danger']) !!}
              </div>
              {!! Form::close() !!}
            </td>

          </tr>
        @endforeach

    </tbody>
  </table>
@else
  <h1 class="text-center">No comments</h1>

@endif
</div>

@endsection
