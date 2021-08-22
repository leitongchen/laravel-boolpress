@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">

            <div class="px-2 mb-5 text-center">
                <h2>Drop us a line</h2>
            </div>

            <form action="{{ route('sendForm') }}" method="get">
                @csrf

                <div class="d-flex">
                
                    <div class="mb-3 flex-fill px-2">
                        <label for="name" class="form-label">
                            Name
                            <input type="text" class="form-control" name="name" id="name">
                        </label>
                    </div>

                    <div class="mb-3 flex-fill px-2">
                        <label for="surname" class="form-label">
                            Surname
                            <input type="text" class="form-control" name="surname" id="surname">
                        </label>
                    </div>

                </div>

                <div class="mb-3 px-2">
                    <label for="email" class="form-label">
                        Email
                        <input type="email" class="form-control" name="email" id="email">
                    </label>
                </div>

                <div class="mb-3 px-2">
                    <label for="message" class="form-label">
                        Your message
                        <textarea name="message" class="form-control" id="message" cols="30" rows="6"></textarea>
                    </label>
                </div>

                <div class="mb-3 px-2">
                    <label for="attach" class="form-label">
                        Attach
                        <input type="file" class="form-control" name="attach" id="attach">
                    </label>
                </div>

                <div class="px-2">
                    <input type="submit" class="form-control btn btn-primary" value="Send your message">
                </div>
            </form>

        </div>
    </div>
</div>
@endsection
