@extends('layouts.app')

@section('content')

    <a href="{{ route('posts.index') }}">Back to overview</a>
    

    {{-- <h1>Pagina show che mostra solo un unico post</h1> --}}

    <p>{{ $post->id }}</p>
    <h2>{{ $post->title }}</h2>

    <p>{{ $post->content }}</p>

    <p>{{ $post->slug }}</p>


@endsection