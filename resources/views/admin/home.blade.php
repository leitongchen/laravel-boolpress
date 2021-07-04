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

        {{-- <div class="col-md-8">
            <div class="card">

                <div class="card-body">
                   <a href="{{ route('posts.index') }}">To the articles...</a>
                </div>
            </div>
        </div> --}}
    </div>



@endsection
