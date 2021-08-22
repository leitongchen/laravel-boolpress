@extends('emails.template.mailTemplate')

@section('styles')

    <style>
    
        .bg-info {
            background-color: blue; 
        }
    
    </style>


@endsection


@section('content')

    <div class="card">

        <div class="card-header bg-info">
            New Message from {{ $formData['name'] }}
        </div>

        <div class="card-body">

            <h5 class="card-title">Sender details:</h5>
            <p>
                Name: <span>{{ $formData['name'] . " " . $formData['surname'] }}</span>
            </p>
            <p>
                Email: <span>{{ $formData['email'] }}</span>
            </p>

            <div class="border-secondary">
                Message: 
                <p class="card-text">
                    {{ $formData['message'] }}
                </p>
            </div>

        </div>

    </div>
@endsection
