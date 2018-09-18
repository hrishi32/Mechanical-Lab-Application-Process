@extends("layouts.app")
@section('content')
    <form action="{{url('applstore')}}" method="post">
        @csrf
        <br><br>
        <input type="hidden" name="user" value="b16032">
        <textarea name="comments" placeholder="Description" id="article-ckeditor"></textarea>
        <input type="text" name="material_provider" placeholder="Material Provider">
        <input type="file" name="img" placeholder="Design">
        <input type="number" name="cost" placeholder="Cost">
        <input type="submit">
    </form>
@endsection