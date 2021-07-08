@extends('layouts.app')



@section('content')

    @foreach($posts as $post)
        
        <div class="card public_post my-4">
            <div class="card-body">
                <h3 class="card-title">{{ $post->title }}</h3>
                <p class="card-text text-truncate">
                    {{ $post->content }}
                </p>
                <div class="d-flex justify-content-between">

                    <p class="card-text"><small class="text-muted">Last updated <span class="text-info">{{ $post->updatedAt}}</span></small></p>
                    
                    <p class="card-text text-muted"> 
                        Author:
                        <a href="#">
                             {{ $post->user->name }} 
                        </a>
                    </p>
                </div>

                <a href="{{ route('posts.show', $post->slug) }}">Read more...</a>
            </div>

            @if($post->src)
                <img src="{{ $post->src }}" class="card-img-bottom img-fluid" alt="">
            @endif
        </div>


    @endforeach




@endsection

