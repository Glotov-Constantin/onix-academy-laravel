@extends('admin')

@section('content_header')
    <h1>Posts page</h1>
@stop

@section ('content')
    <div class="jumbotron">

        <table class="table table-striped table-bordered datatable" id="data_table">
            <thead class="thead-dark">
            <tr>
                <th>Title</th>
                <th>Content</th>
                <th style="width: 100px;">Controls</th>
            </tr>
            </thead>
            <tbody>
            @foreach($posts as $post)
                <tr>
                    <td><a href="/admin/posts/{{ $post->id }}">{{$post->title}}</a></td>
                    <td>{{$post->text}}</td>
                    <td class="text-center">
                        <a class="btn btn-outline-info mr-2" href="/admin/posts/{{$post->id}}" title="Edit post"><i class="fa fa-pen"></i> </a>
{{--                        @if(!in_array($post->slug,App\Content::readableSlug))--}}
{{--                            <a class="btn btn-outline-danger" href="/admin/posts/delete/{{$post->id}}"><i class="fa fa-trash-alt"></i> </a>--}}
{{--                        @endif--}}
                    </td>
                </tr>
            @endforeach
            </tbody>
        </table>

        <div>{{$posts->links()}}</div>

    </div>
@endsection




