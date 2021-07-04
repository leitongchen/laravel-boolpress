@extends('layouts.dashboard')

@section('content')

    <a href="{{ route('admin.categories.index') }}">Back to overview</a>


    <form action="{{ route('admin.categories.store') }}" method="post">
        @csrf

        <label for="name">Create a new category</label>
        <input type="text" name="name" id="name">

        <input type="submit" value="Save">

    </form>


@endsection