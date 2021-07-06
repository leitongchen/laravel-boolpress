@extends('layouts.dashboard')

@section('link-section')

    <a href="{{ route('admin.tags.index') }}">Back to overview</a>

@endsection

@section('content')



    <h6>ID: {{ $tag->id }}</h6>
    <h6>NOME TAG: {{ $tag->name }}</h6>
    <p>SLUG: {{ $tag->slug }}</p>

    @include('components.editBtn', [
                            'genericObj' => $tag,
                            'route' => 'admin.tags.edit',
    ])

    <form action="{{ route('admin.tags.destroy', $tag->id) }}" method="post">
        @include('components.deleteBtn')
    </form>

    <br>


    <a href="{{ route('admin.tags.create') }}">Create new tag</a>


@endsection