@extends('layouts.app')

@section('content')
   
    
    
    <div class="welcome_content">
        <div class="row">
        
            <div class="img-box col-md-12">
                <img src="{{asset('images/undraw_typewriter_i8xd.svg')}}" alt="">
            </div>

            <div class="welcome_title text-center col-md-12">
                Welcome to Boolpress
            </div>

            <div class="links col-md-12 text-center">
                <a href="{{ route('posts.index') }}">Read all articles</a>
                <a href="{{ route('contact') }}">Send us a message</a>
            </div>

        </div>
    </div>

    

@endsection
