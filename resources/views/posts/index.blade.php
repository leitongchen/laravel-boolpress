@extends('layouts.app')

@section('link-section')
    
    <div class="col-md-10">
        @include('partials.searchForm', ['categories' => $categories, 'route' => 'posts.filter'])
    </div>
    
@endsection

@section('content')
   
    <div class="col-md-10">

        @include('posts.partials.postCard', ['posts' => $posts])
        
    </div>

@endsection

