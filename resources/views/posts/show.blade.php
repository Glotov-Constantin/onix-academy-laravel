@extends('layouts.app')

@section ('content')
    <h1>{{$post->title}}</h1>
{{--    <h2>{{$post->id}}</h2>--}}
    <div>{{$post->text}}</div>
@endsection
