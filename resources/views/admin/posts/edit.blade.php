@extends('layouts.dashboard')

@section('content')

    <a href="{{ route('admin.posts.index') }}">Back to overview</a>


    <form action="{{ route('admin.posts.update', $post->id) }}" method="post">
        @csrf
        @method('put')

        <label for="title">Titolo del tuo post</label>
        <input type="text" name="title" id="title" value="{{ $post->title }}">

        <label for="content">Scrivi qui il tuo post</label>
        <textarea name="content" id="content" rows="10" cols="50"> {{ $post->content }} </textarea>

        <label for="category">Categoria</label>
        <select name="category" id="category">
            @foreach($categories as $category)
                <option value="{{$category->id}}"
                {{ $category->id == old('category_id', $post->category_id) ? 'selected' : '' }}>
                    {{ $category->name }}
                </option>
            @endforeach
        </select>

        <input type="submit" value="Update">

    </form>

    <form action="{{ route('admin.posts.destroy', $post->id) }}" method="post">
        @include('components.deleteBtn')
    </form>


@endsection