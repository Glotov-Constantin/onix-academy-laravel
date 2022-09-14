@extends('admin')
@section('content_header')
    <h1>New post</h1>
@stop

@section ('content')
    <div class="jumbotron">
        <form action="../posts" method="POST">
            @csrf

            <div class="form-group">
                <label for="title" >Title</label>
                <input type="text" name="title" class="form-control" autofocus required value={{ old('title') }}>
                <label for="text">Text</label>
                <textarea name="text" class="form-control" required>{{ old('text') }}</textarea>
                <label for="user_id">User id</label>
                <select name="user_id" class="form-select" required>
                    @foreach($users as $user)
                        <option value="{{$user->id}}">{{$user->id}}. {{$user->full_name}}</option>
                    @endforeach
                </select>
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

            <button type="submit" class="btn btn-primary">Add new post</button>
        </form>

    </div>
@endsection
