@extends('layouts.dashboard')

@section('content')
    <h5>
        Available categories
    </h5>
    <ul>

        @foreach($categories as $category)
            <li>
                {{ $category->id }}
                -
                {{ $category->name }}
                -
                slug: {{ $category->slug }}

                <br>

                <a href="{{ route('admin.categories.edit', $category->slug) }}">Edit</a>

                <form action="{{ route('admin.categories.destroy', $category->id) }}" method="post">
                    @include('components.deleteBtn')
                </form>

            </li>
        @endforeach

    </ul>

    <a href="{{ route('admin.categories.create') }}">Create new category</a>

@endsection