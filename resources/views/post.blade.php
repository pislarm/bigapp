@extends('layouts.blog-post')


@section('content')
  <!-- Blog Post -->

  <!-- Title -->
  <h1>{{$post->title}}</h1>

  <!-- Author -->
  <p class="lead">
      by <a href="#">{{$post->user->name}}</a>
  </p>

  <hr>

  <!-- Date/Time -->
  <p><span class="glyphicon glyphicon-time"></span> Posted {{$post->created_at->diffForHumans()}}</p>

  <hr>

  <!-- Preview Image -->
  <img class="img-responsive" src="{{$post->photo->file}}" alt="">

  <hr>
  @if(Session::has('new_comment'))
    <div class="alert alert-info">
    {{session('new_comment')}}
    </div>
  @endif

  <!-- Post Content -->
  <p class="lead">{{$post->body}}</p>
  <hr>

@if (Auth::check())
  <!-- Comments Form -->
  <div class="well">
      <h4>Leave a Comment:</h4>

      {!! Form::open(['method'=>'POST', 'action'=>'PostCommentsController@store']) !!}

      <input type="hidden" name="post_id" value="{{$post->id}}">

      <div class="form-group">
          {!! Form::label('body', 'Body:') !!}
          {!! Form::textarea('body', null, ['class'=>'form-control']) !!}
      </div>

      <div class="form-group">
          {!! Form::submit('Submit comment', ['class'=>'btn btn-primary', 'rows'=>6]) !!}
      </div>
      {!! Form::close() !!}
  </div>
@endif
  <hr>

  <!-- Posted Comments -->
  @if(count($comments) > 0)
  <!-- Comment -->
    @foreach ($comments as $comment)


  <div class="media">
      <a class="pull-left" href="#">
          <img height="64" class="media-object" src="http://placehold.it/64x64" alt="">
      </a>
      <div class="media-body">
          <h4 class="media-heading">{{$comment->author}}
              <small>{{$comment->created_at}}</small>
          </h4>
          {{$comment->body}}
        </div>
        @if(count($comment->replies) > 0)
          @foreach ($comment->replies as $reply)
            @if ($reply->is_active==1)

        <!-- Nested Comment -->
            <div class="media">
                <a class="pull-left" href="#">
                    <img class="media-object" src="http://placehold.it/64x64" alt="">
                </a>
                <div class="media-body">
                    <h4 class="media-heading">{{$reply->author}}
                        <small>{{$reply->created_at}}</small>
                    </h4>
                    {{$reply->body}}
                </div>
                @endif
          @endforeach
        @endif

        <div class="comment-reply-container">
          <button class="toggle-reply btn btn-primary pull-right">Reply</button>

          <div class="comment-reply col-sm-6">
                {!! Form::open(['method'=>'POST', 'action'=>'CommentRepliesController@createReply']) !!}

                <input type="hidden" name="comment_id" value="{{$comment->id}}">

                <div class="form-group">
                    {!! Form::label('body', 'Reply:') !!}
                    {!! Form::textarea('body', null, ['class'=>'form-control', 'rows'=>1]) !!}
                </div>

                <div class="form-group">
                    {!! Form::submit('Submit', ['class'=>'btn btn-primary']) !!}
                </div>
                {!! Form::close() !!}
          </div>
        </div>
        <!-- End Nested Comment -->
      </div>
  </div>
    @endforeach
@endif
@section('scripts')
  <script type="text/javascript">
    $(".comment-reply-container .toggle-reply").click(function(){
      $(this).next().slideToggle("slow");
    });
  </script>
@endsection
@endsection
