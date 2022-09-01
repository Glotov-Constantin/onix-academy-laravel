@extends('admin')
@section('content')
    <h1>New post</h1>

    <form action="../posts" method="POST">
        @csrf
        <label for="title" >Title</label>
        <input type="text" name="title" autofocus required value={{ old('title') }}>
        <label for="text">Text</label>
        <textarea name="text" required>{{ old('text') }}</textarea>

        @if($errors->any())
            <div>
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        <button type="submit">Add new post</button>
    </form>

@endsection
