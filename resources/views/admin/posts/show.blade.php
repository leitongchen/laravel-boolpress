@extends('layouts.dashboard')

@section('link-section')

    <div class="d-flex justify-content-between">
    
        <a href="{{ route('admin.posts.index') }}">Back to overview</a>
        
        <div class="cta-post d-flex">

            @include('components.editBtn', [
                            'genericObj' => $post,
                            'route' => 'admin.posts.edit',
            ])

            <form action="{{ route('admin.posts.destroy', $post->id) }}" method="post">
                @include('components.deleteBtn')
            </form>
        </div>

    </div>

@endsection

@section('content')

    <div class="post-container">
    
        <h1>{{ $post->title }}</h1>

        <div class="head-box d-flex align-items-center">

            <div class="mr-5 tag">
                ID:  
                <span>
                    <strong>{{ $post->id }}</strong>
                </span>
            </div>

            <div class="slug-box flex-grow-1 d-flex align-items-center tag">
                Slug: 
                <span class="flex-grow-1">
                    {{ $post->slug }}
                </span>
            </div>

        </div>  
        
        @if($post->post_cover)
            
            <div class="img-box">
                <img src="{{ asset('storage/' . $post->post_cover) }}" alt="{{$post->slug . "image"}}">
            </div>

        @endif

        <div class="content-box">
        
            <p>
                {{ $post->content }}
            </p>

        </div>

        <div class="info-box">

            <div>
                <h6>Author:</h6>
                <div class="info-text">
                    <a href="#">
                    
                        {{ $post->user->name }}

                    </a>
                </div>
            </div>

            <div>
                <h6>Category:</h6>
                <div class="info-text">
                    @if($post->category)
                    <a href="{{ route('admin.posts.filter', ['category' => $post->category['id']]) }}">
                        {{ $post->category['name'] }}
                    </a>
                    @else 
                    <span> - </span>
                    @endif
                </div>
            </div>

            <div>
                <h6>Tags:</h6>

                <div class="info-text">
                    @if(count($post->tags)>0)
                    @foreach($post->tags as $tag)

                        <div class="badge badge-info">
                            <a href="{{ route('admin.posts.filter', ['tag' => $tag->id]) }}" class="text-white">
                                {{ $post->tags ? $tag['name'] : "-" }}
                            </a>
                        </div>

                    @endforeach
                    @else
                        <span>No tags</span>
                    @endif

                </div>
            </div>
            

        </div>

    </div>

@endsection