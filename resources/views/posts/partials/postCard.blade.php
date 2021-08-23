@foreach($posts as $post)

    <div class="public_post">
        <div class="row">

            
            <div class="card-img col-md-6">
                @if($post->post_cover)
                    <img src="{{ asset('storage/' . $post->post_cover) }}" alt="">
                @else 
                    <img src="https://media.sproutsocial.com/uploads/2018/04/Facebook-Cover-Photo-Size.png" alt="random image">
                @endif
            </div>

            <div class="card-body col-md-6">
                <h3 class="card-title">{{ $post->title }}</h3>
                <p class="card-text"><small class="text-muted">Last updated at: <span class="text_info">{{ $post->updatedAt}}</span></small></p>

                <p class="card-text text-truncate">
                    {{ $post->content }}
                </p>

                <div>
                    <p class="card-text text-muted"> 
                        <small>
                            Author:
                            <a class="text_info" href="#">
                                {{  $post->user->name  }} 
                            </a>
                        </small>
                    </p>
                </div>
                <a class="text-right" href="{{ route('posts.show', $post->slug) }}">Read more...</a>

            </div>

        </div>
    
    </div>

@endforeach