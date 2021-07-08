@extends('layouts.dashboard')

@section('content')

    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header"><strong>{{ __('Dashboard') }}</strong></div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                    Welcome <strong> {{ __( ucwords(Auth::user()->name)) }}</strong>!
                </div>

                <div class="card-body">
                   <a href="{{ route('admin.posts.index') }}">See your posts...</a>
                </div>
            </div>
        </div>

    </div>


    <div class="row justify-content-center">
        <div class="col-md-8">

            <h3 class="mt-5">Tutti i post</h3>

            @foreach($posts as $post)
                
            <div class="card public_post my-4">
                <div class="card-body">
                    <h3 class="card-title">{{ $post->title }}</h3>
                    <p class="card-text text-truncate">
                        {{ $post->content }}
                    </p>
                    <div class="d-flex justify-content-between">
                        <p class="card-text"><small class="text-muted">Last updated {{ $post->updated_at }}</small></p>
                        
                        <p class="card-text text-muted"> 
                            Author:
                            <a href="#">
                                    {{ ($post->user->id != Auth::user()->id) ? $post->user->name : "TU" }} 
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
        </div>
    </div>    


@endsection
