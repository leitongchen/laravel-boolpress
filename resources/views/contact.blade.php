@extends('layouts.app')

@section('content')

<div class="container">
    <div class="row justify-content-center">
        <div class="message_form col-10">

            <div class="px-2 mb-5 text-center">
                <h2>Drop us a line</h2>
            </div>

            @if ($errors->any())
                <div class="alert alert-danger">
                    <ul>
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif

            <form action="{{ route('sendForm') }}" method="get">
                @csrf

                <div class="row">
                
                    <div class="col-12 col-sm-6">
                        <label for="name" class="form-label">
                            Name
                        </label>
                        <input type="text" class="form-control" name="name" id="name" class="@error('name') is-invalid @enderror">
                        @error('name')
                            <div class="alert alert-danger">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="col-12 col-sm-6">
                        <label for="surname" class="form-label">
                            Surname
                        </label>
                        <input type="text" class="form-control" name="surname" id="surname">
                        @error('name')
                            <div class="alert alert-danger">{{ $message }} </div>
                        @enderror
                    </div>

                    <div class="col-12">
                        <label for="email" class="form-label">
                            Email
                        </label>
                        <input type="email" class="form-control" name="email" id="email">
                        @error('name')
                            <div class="alert alert-danger">{{ $message }} </div>
                        @enderror
                    </div>

                    <div class="col-12">
                        <label for="message" class="form-label">
                            Your message
                        </label>
                        <textarea name="message" class="form-control" id="message" cols="30" rows="6"></textarea>
                        @error('name')
                            <div class="alert alert-danger">{{ $message }} </div>
                        @enderror
                    </div>

                    <div class="col-12">
                        <label for="attach" class="form-label">
                            Attach
                        </label>
                        <input type="file" class="form-control" name="attach" id="attach">
                    </div>

                    <div class="col-12 submit_btn_box">
                        <input type="submit" class="form-control bool_btn primary_btn" value="Send your message">
                    </div>
                    
                    </div>
              

                
            </form>

        </div>
    </div>
</div>
@endsection
