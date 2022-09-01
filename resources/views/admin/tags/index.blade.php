@extends('admin')

@section('content_header')
    <h1>Tags page</h1>
@stop

@section ('content')
    <div class="jumbotron">

        <table class="table table-striped table-bordered datatable" id="data_table">
            <thead class="thead-dark">
            <tr>
                <th>Name</th>
                <th style="width: 100px;">Controls</th>
            </tr>
            </thead>
            <tbody>
            @foreach($tags as $tag)
                <tr>
                    <td><a href="/admin/tags/{{ $tag->id }}">{{$tag->name}}</a></td>
                    <td class="text-center">
                        <a class="btn btn-outline-info mr-2" href="/admin/tags/{{$tag->id}}" title="Edit tag"><i class="fa fa-pen"></i> </a>
                    </td>
                </tr>
            @endforeach
            </tbody>
        </table>

        <div>{{$tags->links()}}</div>

    </div>
@endsection
