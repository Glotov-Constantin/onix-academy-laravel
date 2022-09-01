@extends('admin')
@section('content')
    <h1>Edit tag</h1>

    <form action="" method="POST">
        @csrf
        <label for="name" >Name</label>
        <textarea name="name" required>{{$tag->name}}</textarea>

        @if($errors->any())
            <div>
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        <button type="submit">Destroy tag</button>
    </form>

@endsection
