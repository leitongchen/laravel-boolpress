@extends('layouts.dashboard')

@section('content')
 
    <a href="{{ route('admin.posts.index') }}">Back to overview</a>
    

    {{-- <h1>Pagina show che mostra solo un unico post</h1> --}}

    <p>{{ $post->id }}</p>
    <h2>{{ $post->title }}</h2>

    <p>{{ $post->content }}</p>

    <p>Slug: {{ $post->slug }}</p>

    <p>Scritto da {{ $post->user->name }}</p>

    <p>Categoria: {{ $post->category ? $post->category['name'] : "-" }}</p>



    <a href="{{ route('admin.posts.edit', $post->id) }}">Edit</a>
    <form action="{{ route('admin.posts.destroy', $post->id) }}" method="post">
        @include('components.deleteBtn')
    </form>


@endsection