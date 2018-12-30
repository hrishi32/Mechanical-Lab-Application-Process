@extends("layouts.app")

@section('content')
<div>
{{-- <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css"> --}}
{{-- <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script> --}}
{{-- <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script> --}}
<link rel="stylesheet" href=" {{asset('css/app.css')}} ">
<div style="margin:2%">
    <h1>Applications</h1>
    <a href = "/appl"><button  style="border:none">All</button></a>
    <a href = "#"><button  style="border:none; background: #81ba80 ; color: white"><u>Pending</u></button></a>
    <a href = "/requests/approved"><button style="border:none">Approved</button></a>
    <br><br>
    @if(count($reqs) > 1)
        @foreach($reqs as $appl)
            <div class= "well">
                    <small>Applicant: {{$appl->sender}} | </small>
                    <small>Material Provider: {{$appl->material_provider}} | </small>
                    <small>Estimated Cost: ₹{{$appl->cost}}</small>
                <div>{!!$appl->comments!!}</div>
                @if(($appl->status == 0 && $appl->sender == Auth::user()->roll_no))
                    <hr>
                    <a href="/appl/{{$appl->id}}/edit"  style="display: inline-block"><button class="btn btn-default">Edit Application</button></a>
                    {!! Form::open(['action' => ['ApplController@destroy', $appl->id], 'method' =>'POST', 'style' => 'display:inline-block']) !!}
                    {{Form::hidden('_method', 'DELETE')}}
                    {{Form::submit('Delete', ['class'=>'btn btn-danger'])}}
                    {!! Form::close() !!}
                @endif
                @if(Auth::user()->level == 2 && $appl->status == 0 )
                    <hr>
                    <a href="/appl/{{$appl->id}}/edit" class="btn btn-default">Suggest Changes</a>
                    <a href="" class="btn btn-default">Forward</a>
                @endif
                 @if(Auth::user()->level == 1 && ($appl->status == 1 ||$appl->status == 0 ))
                    {{-- {!! Form::open(['action'=> ['ApplController@approve', $appl->id], 'method' => 'POST']) !!}
                    {{Form::hidden('_method', 'PUT')}} 
                    {{Form::submit('Approve', ['class'=>'btn btn-primary'])}}
                    {!! Form::close() !!}  --}}

                    <form method="POST", action="{{url('applapprove')}}" style="display: inline-block">
                        @csrf
                        <input type="hidden", value="{{$appl->id}}" name="id">
                        <input type="submit" class="btn btn-primary" value="Approve">
                    </form>

                    {{-- {!! Form::open(['action' => ['ApplController@decline', $appl->id], 'method' =>'POST', 'class' => 'pull-right']) !!}
                    {{Form::hidden('_method', 'PUT')}}
                    {{Form::submit('Decline', ['class'=>'btn btn-danger'])}}
                    {!! Form::close() !!} --}}
                    <form method="POST", action="{{url('appldecline')}}" class="pull-right" style="display: inline-block">
                        @csrf
                        <input type="hidden", value="{{$appl->id}}" name="id">
                        <input type="submit" class="btn btn-danger" value="Decline">
                    </form>
                @elseif($appl->status == 1)
                    <p>Status: Application Forarded</p>

                @elseif($appl->status == 2)
                    <h3 style="color:darkcyan">Status: Approved</h3>

                @elseif($appl->status == -1)
                    <h3 style="color:crimson">Status: Declined</h3>
                @endif
            </div>
        @endforeach
    @else
        <p>No applications found</p>
    @endif
</div>
</div>
@endsection

    
