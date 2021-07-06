@extends('layouts.dashboard')


@section('link-section')

    <div class="d-flex justify-content-between">
    
        <a href="{{ route('admin.tags.index') }}">Back to categories</a>
        

        

        <div class="cta-post d-flex">
            @include('components.editBtn', [
                                'genericObj' => $tag,
                                'route' => 'admin.tags.edit',
            ])
            <form action="{{ route('admin.tags.destroy', $tag->id) }}" method="post">
                @include('components.deleteBtn')
            </form>
        </div>

    </div>

@endsection


@section('content')


    <form action="{{ route('admin.tags.update', $tag->id) }}" method="post">
        @csrf
        @method('put')

        <div class="input-group-lg input_group">
            <label for="name">Modify tag</label>
            <input class="form-control" type="text" name="name" id="name" value="{{ $tag->name }}">
        </div>

        <input class="submit_btn btn btn-primary btn-lg btn-block" type="submit" value="Save">

    </form>

@endsection