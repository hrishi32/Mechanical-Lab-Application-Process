@extends("layouts.app")
@section('content')
    <form action="ApplController@store" method="POST">
        @csrf
        <br><br>
        <input type="hidden" name="user" value="b160320">
        <input type="text" name="comments" placeholder="Description">
        <input type="text" name="materil_provider" placeholder="Material Provider">
        <input type="file" name="img" placeholder="Design">
        <input type="number" name="cost" placeholder="Cost">
        <input type="submit">
    </form>
@endsection