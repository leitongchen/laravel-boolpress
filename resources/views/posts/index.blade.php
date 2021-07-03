@extends('layouts.app')


@section('link-btn')
    <a class="nav-link" href="{{ route('admin.posts.index') }}">Control Panel</a>
@endsection

@section('content')

    @foreach($posts as $post)
        
        <p>{{ $post->id }}</p>
        <h2>{{ $post->title }}</h2>

        <p>{{ $post->content }}</p>

        <p>{{ $post->slug }}</p>

        <a href="{{ route('posts.show', $post->slug) }}">More</a>

    @endforeach




@endsection

