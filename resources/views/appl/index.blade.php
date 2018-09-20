@extends("layouts.app")

@section('content')
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>

    <h1>Applications</h1>
    @if(count($appls) > 1)
        @foreach($appls as $appl)
            <div class= "well">
                <h3>{!!$appl->comments!!}</h3>
                <small>Applicant: {{$appl->sender}}</small>
            <small>Material Provider: {{$appl->material_provider}},</small>
            <small>Estimated Cost: ₹{{$appl->cost}}</small>
            </div>
        @endforeach
    @else
        <p>No applications found</p>
    @endif
@endsection

    
