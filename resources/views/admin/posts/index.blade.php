@extends('layouts.dashboard')

@section('link-btn')
    <a  class="nav-link" href="{{ route('posts.index') }}">Guest Mode</a>
@endsection


@section('content')

    <a href="{{ route('admin.posts.create') }}">New post</a>


    {{-- <h1>Pagina index che contiene tutti i post</h1> --}}

    @foreach($posts as $post)
        <p>ID: {{ $post->id }}</p>

        <h3> {{ $post->title }} </h3>
        <p> {{ $post->content }} </p>

        <a href="{{ route('admin.posts.show', $post->slug) }}">More</a>

        <a href="{{ route('admin.posts.edit', $post->id) }}">Edit</a>
        @include('components.deleteBtn', compact($post->id))

        <hr>

    @endforeach


@endsection