@extends('admin')
@section('content_header')
    <h1>New tag</h1>
@stop

@section ('content')
    <div class="jumbotron">
        <form action="../tags" method="POST">
            @csrf
            <div class="form-group">
                <label for="name" >Name</label>
                <input type="text" name="name" class="form-control" autofocus required value={{ old('name') }}>
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

            <button type="submit" class="btn btn-primary">Add new tag</button>
        </form>
    </div>

@endsection
