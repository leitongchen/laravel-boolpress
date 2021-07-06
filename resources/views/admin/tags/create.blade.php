@extends('layouts.dashboard')

@section('link-section')
    <a href="{{ route('admin.tags.index') }}">Back to overview</a>
@endsection



@section('content')

    <form action="{{ route('admin.tags.store') }}" method="post">
        @csrf

        <div class="input-group-lg input_group">
            <label for="name">Create a new tag</label>
            <input class="form-control" type="text" name="name" id="name">
        </div>

        <input class="submit_btn btn btn-primary btn-lg btn-block" type="submit" value="Save">

    </form>


@endsection