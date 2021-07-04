@extends('layouts.dashboard')

@section('content')

    <a href="{{ route('admin.categories.index') }}">Back to overview</a>


    <form action="{{ route('admin.categories.store') }}" method="post">
        @csrf

        <label for="name">Modify category</label>
        <input type="text" name="name" id="name" value="{{ $category->name }}">

        <input type="submit" value="Save">

    </form>

    <form action="{{ route('admin.categories.destroy', $category->id) }}" method="post">
        @include('components.deleteBtn')
    </form>

@endsection