@extends('layouts.app')

@section ('content')
    <h1>Post page</h1>
    @foreach($posts as $post)
        <div style="padding-bottom: 20px">
            <div><a href="/admin/posts/{{ $post->id }}">{{$post->title}}</a></div>
            <div>{{$post->text}}</div>
        </div>
    @endforeach
@endsection
