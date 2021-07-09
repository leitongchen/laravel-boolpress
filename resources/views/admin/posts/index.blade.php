@extends('layouts.dashboard')

@section('link-section')

    @include('admin.partials.searchForm', ['categories' => $categories])

@endsection



@section('content')

    <table class="table table-hover">

        <thead class="thead-dark">
        
            <tr>
                <th scope="col">ID</th>
                <th scope="col">Title</th>
                <th scope="col">Slug</th>
                <th scope="col">Author</th>
                <th scope="col">Category</th>
                <th scope="col">Actions</th>
            </tr>

        </thead>
        <tbody>

        
            @foreach($posts as $post)
                
                <tr>
                    <td>{{ $post->id }}</td>
                    <td>{{ $post->title }}</td>
                    <td>{{ $post->slug }}</td>
                    <td>{{ $post->user->name }}</td>
                    <td>{{ $post->category ? $post->category->name : "-" }}</td>
                    


                    <td class="cta-btn-box">

                        @include('components.showMore')
                        @include('components.editBtn', [
                            'genericObj' => $post,
                            'route' => 'admin.posts.edit',
                        ])

                        <form action="{{ route('admin.posts.destroy', $post->id) }}" method="post">
                            @include('components.deleteBtn')
                        </form>
                    </td>
                </tr>

            @endforeach

        </tbody>
        
    </table>


@endsection