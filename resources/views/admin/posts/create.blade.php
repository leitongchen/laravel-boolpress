@extends('layouts.dashboard')


@section('link-section')
   
    <div class="d-flex justify-content-between">
    
        <a href="{{ route('admin.posts.index') }}">Back to overview</a>
        

    </div>

@endsection


@section('content')

    <form action="{{ route('admin.posts.store') }}" method="post">
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

           
        <input class="submit_btn btn btn-primary btn-lg btn-block" type="submit" value="Save">
            

    </form>


@endsection