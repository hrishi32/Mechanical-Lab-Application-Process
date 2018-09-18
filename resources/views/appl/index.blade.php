@extends("layouts.app")
@section('content')
    <h1>Applications</h1>
    @if(count($appls) > 1)
        @foreach($appls as $appl)
            <div class="well">
                <h3>{!!$appl->comments!!}</h3>
            </div>
        @endforeach
    @else
        <p>No applications found</p>
    @endif
@endsection