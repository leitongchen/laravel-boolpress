@extends('layouts.app')



@section('content')

     <div class="row justify-content-center">
        <div class="col-md-10">

            @include('posts.partials.postCard', ['posts' => $posts])
           
        </div>
    </div>   

@endsection

