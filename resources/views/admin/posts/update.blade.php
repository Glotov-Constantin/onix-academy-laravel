@extends('admin')
@section('content')
    <h1>Edit post</h1>

    <form action="" method="POST">
        @csrf
        <label for="title" >Title</label>
        <textarea name="title" required>{{$post->title}}</textarea>
        <label for="text">Text</label>
        <textarea name="text" required>{{$post->text}}</textarea>


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
        <button type="submit">Save changes</button>
    </form>
    <form action="/admin/posts/{{$post->id}}/destroy" type="submit" method="post">
        @csrf
        @method('delete')
        <button type="submit">Delete post</button>
    </form>
@endsection
