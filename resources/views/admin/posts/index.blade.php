@extends('layouts.admin')

@section('content')
  <h1>Posts</h1>

  <table class="table">
    <thead>
      <tr>
        <th>Id</th>
        <th>Photo</th>
        <th>User Id</th>
        <th>USer name</th>
        <th>CAtegory</th>
        <th>Title</th>
        <th>body</th>
        <th>View Post</th>
        <th>Comments</th>
        <th>Created</th>
        <th>Updated</th>
      </tr>
    </thead>
    <tbody>
      @if ($posts)
        @foreach ($posts as $post)

      <tr>
        <td>{{$post->id}}</td>
        <td><img src="{{$post->photo ? $post->photo->file : 'http://placehold.it/100x100'}}"></td>
        <td>{{$post->user_id}}</td>
        <td><a href="{{route('posts.edit', $post->id)}}">{{$post->user->name}}</a></td>
        <td>{{$post->category ? $post->category->column : 'uncategorised'}}</td>
        <td>{{$post->title}}</td>
        <td>{{str_limit($post->body, 30)}}</td>
        <td><a href="{{route('home.post', $post->id)}}">View post</a></td>
        <td><a href="{{route('comments.index', $post->id)}}">View Comments</a></td>

        <td>{{$post->created_at->diffForHumans()}}</td>
        <td>{{$post->updated_at->diffForHumans()}}</td>

      </tr>
      @endforeach
    @endif

    </tbody>
  </table>

@endsection
