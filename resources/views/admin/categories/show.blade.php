@extends('layouts.dashboard')

@section('content')

    <a href="{{ route('admin.categories.index') }}">Back to overview</a>


    <h6>ID: {{ $category->id }}</h6>
    <h6>NOME CATEGORIA: {{ $category->name }}</h6>
    <p>SLUG: {{ $category->slug }}</p>

    <a href="{{ route('admin.categories.edit', $category->slug) }}">Edit</a>
    <form action="{{ route('admin.categories.destroy', $category->id) }}" method="post">
        @include('components.deleteBtn')
    </form>

    <br>


    <a href="{{ route('admin.categories.create') }}">Create new category</a>


@endsection