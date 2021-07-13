@extends('layouts.dashboard')


@section('link-section')
   
    <div class="d-flex justify-content-between">
    
        <a href="{{ route('admin.posts.index') }}">Back to overview</a>
        
    </div>

@endsection


@section('content')

    <form action="{{ route('admin.posts.store') }}" method="post" enctype="multipart/form-data">
        @csrf

        <div class="input-group-lg input_group">
            <label for="title">Title</label>
            <input class="form-control" type="text" name="title" id="title">
        </div>

        <div class="input-group-lg input_group">
            <label for="content">Write here your post...</label>
            <textarea name="content" id="content" rows="10" cols="50"> </textarea>
        </div>

        <div class="input-group-lg input_group">
            <label for="src">Paste your image src</label>
            <input class="form-control" type="text" name="src" id="src">
        </div>

        <div class="input-group-lg input_group">
            <label for="post_cover">Upload cover image</label>
            <input class="form-control" type="file" name="post_cover" id="post_cover">
        </div>

        <div class="input-group-lg input_group">
            <label for="category">Choose a category</label>
            <select class="form-control" name="category" id="category">
                <option value="">-- Choose a category --</option>
                @foreach($categories as $category)
                    <option value="{{$category->id}}">
                        {{ $category->name }}
                    </option>
                @endforeach
            </select>
        </div>

        <div class="input-group-lg input_group">
            <label>Select one or more tags</label>
            
            @foreach($tags as $tag)
                <div class="form-check form-check-inline">
                    <label for="{{$tag->name}}" class="form-check-label">
                        <input value="{{ $tag->id }}" name="tags[]" id="{{$tag->name}}" type="checkbox" class="form-check-input d-inline">
                        {{ $tag->name }}
                    </label>
                </div>
            @endforeach
        </div>

           
        <input class="submit_btn btn btn-primary btn-lg btn-block" type="submit" value="Save">
            

    </form>


@endsection