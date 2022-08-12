@extends('layouts.app')

@section ('content')
    <h1>Post page</h1>
    @foreach($posts as $post)
        <div style="padding-bottom: 20px">
        <div>{{$post->title}}</div>
        <div>{{$post->text}}</div>
        </div>
    @endforeach
@endsection
