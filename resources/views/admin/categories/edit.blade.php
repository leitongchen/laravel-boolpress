@extends('layouts.dashboard')


@section('link-section')

    <div class="d-flex justify-content-between">
    
        <a href="{{ route('admin.categories.index') }}">Back to categories</a>
        
        <div class="cta-post d-flex">

            <form action="{{ route('admin.categories.destroy', $category->id) }}" method="post">
                @include('components.deleteBtn')
            </form>
        </div>

    </div>

@endsection


@section('content')


    <form action="{{ route('admin.categories.store') }}" method="post">
        @csrf

        <div class="input-group-lg input_group">
            <label for="name">Modify category</label>
            <input class="form-control" type="text" name="name" id="name" value="{{ $category->name }}">
        </div>

        <input class="submit_btn btn btn-primary btn-lg btn-block" type="submit" value="Save">

    </form>

@endsection