@extends('layouts.dashboard')

@section('link-section')
   
    <div class="d-flex justify-content-between">
    
        <a href="{{ route('admin.posts.index') }}">Back to overview</a>
        
        <div class="cta-post d-flex">
            <form action="{{ route('admin.posts.destroy', $post->id) }}" method="post">
                @include('components.deleteBtn')
            </form>
        </div>

    </div>

@endsection

@section('content')

    <div>
    
        <form action="{{ route('admin.posts.update', $post->id) }}" method="post">
            @csrf
            @method('put')

            <div class="input-group-lg input_group">
                <label for="title">Title</label>
                <input class="form-control" type="text" name="title" id="title" value="{{ $post->title }}">
            </div>

            <div class="input-group-lg input_group">
                <label for="content">Write here your post...</label>
                <textarea name="content" id="content" rows="10" cols="50"> {{ $post->content }} </textarea>
            </div>

            <div class="input-group-lg input_group">
                <label for="src">Paste your image src</label>
                <input class="form-control" type="text" name="src" id="src" value="{{ $post->src }}">
            </div>

            <div class="input-group-lg input_group">
                <label for="category">Choose a category</label>
                <select class="form-control" name="category" id="category">
                    @foreach($categories as $category)
                        <option value="{{$category->id}}"
                        {{ $category->id == old('category_id', $post->category_id) ? 'selected' : '' }}>
                            {{ $category->name }}
                        </option>
                    @endforeach
                </select>
            </div>

           
            <input class="submit_btn btn btn-primary btn-lg btn-block" type="submit" value="Update post">
            
        </form>

    </div>




@endsection