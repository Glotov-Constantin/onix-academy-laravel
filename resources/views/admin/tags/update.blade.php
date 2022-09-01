@extends('admin')
@section('content_header')
    <h1>Edit tag</h1>
@stop

@section ('content')
    <div class="jumbotron">
        <form action="" method="POST">
            @csrf
            <div class="form-group">
                <label for="name" >Name</label>
                <textarea name="name" class="form-control" required>{{$tag->name}}</textarea>
            </div>


            @if($errors->any())
                <div>
                    <ul>
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif

            @csrf
            @method('put')
            <button type="submit" class="btn btn-primary">Save changes</button>
        </form>
        <div class="pt-1">
            <form action="/admin/tags/{{$tag->id}}/destroy" type="submit" method="post">
                @csrf
                @method('delete')
                <button type="submit" class="btn btn-danger">Delete tag</button>
            </form>
        </div>

    </div>
@endsection
