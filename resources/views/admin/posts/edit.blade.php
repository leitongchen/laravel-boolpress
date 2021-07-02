@extends('layouts.app')

@section('content')

    <a href="{{ route('admin.posts.index') }}">Back to overview</a>


    <form action="{{ route('admin.posts.update', $post->id) }}" method="post">
        @csrf
        @method('put')

        <label for="title">Titolo del tuo post</label>
        <input type="text" name="title" id="title" value="{{ $post->title }}">

        <label for="content">Scrivi qui il tuo post</label>
        <textarea name="content" id="content" rows="10" cols="50"> {{ $post->content }} </textarea>


        <input type="submit" value="Invia">

    </form>

    @include('components.deleteBtn')


@endsection