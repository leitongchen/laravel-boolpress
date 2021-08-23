@extends('layouts.app')

@section('link-section')
    
    @include('partials.searchForm', ['categories' => $categories, 'route' => 'posts.filter'])

    
@endsection

@section('content')
   
    @include('posts.partials.postCard', ['posts' => $posts])
        
@endsection

