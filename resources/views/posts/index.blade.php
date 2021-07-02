@extends('layouts.app')

@section('content')

    @foreach($posts as $post)
        
        <p>{{ $post->id }}</p>
        <h2>{{ $post->title }}</h2>

        <p>{{ $post->content }}</p>

        <p>{{ $post->slug }}</p>

        <a href="{{ route('posts.show', $post->id) }}">More</a>

    @endforeach




@endsection

