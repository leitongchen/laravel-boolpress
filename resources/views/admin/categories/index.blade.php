@extends('layouts.dashboard')

@section('content')
    <h5>
        Available categories
    </h5>

    <a href="{{ route('admin.categories.create') }}">Create new category</a>

    <table class="table table-hover">

        <thead class="">
        
            <tr>
                <th scope="col">ID</th>
                <th scope="col">Category Name</th>
                <th scope="col">Slug</th>
                <th scope="col">Posts</th>
                <th scope="col">Actions</th>

            </tr>

        </thead>
        <tbody>
        
            @foreach($categories as $category)
                
                <tr class="">
                    <td>{{ $category->id }}</td>
                    <td>{{ $category->name }}</td>
                    <td>{{ $category->slug }}</td>
                    <td>{{ count($posts->where('category', $category)) }}</td>
            
                    {{-- @dump($category) --}}

                    <td class="cta-btn-box">

                        @include('components.editBtn', [
                            'genericObj' => $category,
                            'route' => 'admin.categories.edit',
                        ])

                        <form action="{{ route('admin.categories.destroy', $category->id) }}" method="post">
                            @include('components.deleteBtn')
                        </form>
                    </td>
                </tr>

            @endforeach

        </tbody>
        
    </table>

@endsection