@extends('admin')
@section('content_header')
    <h1>Edit post</h1>
@stop

@section ('content')
    <div class="jumbotron">
    <form action="" method="POST">
        @csrf
        <div class="form-group">
            <label for="title" >Title</label>
            <textarea name="title" class="form-control" required>{{$post->title}}</textarea>
            <label for="text">Text</label>
            <textarea name="text" class="form-control" required>{{$post->text}}</textarea>
            <label for="user_id">User id</label>
            <select name="user_id" class="form-select" required>
                @foreach($users as $user)
                    <option value="{{$user->id}}"{{ $post->user_id == $user->id ? 'selected':'' }}>{{$user->id}}. {{$user->full_name}}</option>
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

        @csrf
        @method('put')
        <button type="submit" class="btn btn-primary">Save changes</button>
    </form>
        <div class="pt-1">
            <form action="/admin/posts/{{$post->id}}/destroy" type="submit" method="post">
                @csrf
                @method('delete')
                <button type="submit" class="btn btn-danger">Delete post</button>
            </form>
        </div>
        <p>{{Request::session()->get('msg')}}</p>
    </div>
@endsection
