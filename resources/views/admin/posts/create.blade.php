@extends('layouts.dashboard')

@section('content')

    <a href="{{ route('admin.posts.index') }}">Back to overview</a>


    <form action="{{ route('admin.posts.store') }}" method="post">
        @csrf

        <label for="title">Titolo del tuo post</label>
        <input type="text" name="title" id="title">

        <label for="content">Scrivi qui il tuo post</label>
        <textarea name="content" id="content" rows="10" cols="50"></textarea>

        <label for="category">Categoria</label>
        <select name="category" id="category">
            @foreach($categories as $category)
                <option value="{{$category->id}}">{{ $category->name }}</option>
            @endforeach
        </select>


        <input type="submit" value="Invia">

    </form>


@endsection