@extends('layouts.dashboard')

@section('content')
    <h5>
        Available tags
    </h5>

    <a href="{{ route('admin.tags.create') }}">Create new tag</a>

    <table class="table table-hover">

        <thead>
        
            <tr>
                <th scope="col">ID</th>
                <th scope="col">Tag Name</th>
                <th scope="col">Slug</th>
                <th scope="col">Posts</th>
                <th scope="col">Actions</th>

            </tr>

        </thead>
        <tbody>
        
            @foreach($tags as $tag)
                
                <tr class="">
                    <td>{{ $tag->id }}</td>
                    <td>{{ $tag->name }}</td>
                    <td>{{ $tag->slug }}</td>
                    <td>
                    {{-- {{ count($posts->where('category', $category)) }} --}}
                    </td>

                    <td class="cta-btn-box">

                        @include('components.editBtn', [
                            'genericObj' => $tag,
                            'route' => 'admin.tags.edit',
                        ])

                        <form action="{{ route('admin.tags.destroy', $tag->id) }}" method="post">
                            @include('components.deleteBtn')
                        </form>
                    </td>
                </tr>

            @endforeach

        </tbody>
        
    </table>

@endsection