@extends('layouts.app')
@if(Auth::user()->level < 3 || (Auth::user()->roll_no == $appl->sender && $appl->status == 0))
    @section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header" >{{ __('Add Application') }} </div>

                    <div class="card-body" style="width : 100%">
                        {{-- <form method="POST" action="{{ url('applupdate') }}" aria-label="{{ __('Add Application') }}"> --}}
                            {!! Form::open(['action'=> ['ApplController@update', $appl->id], 'method' => 'POST']) !!}
                            @csrf
                            <div class="form-group row">
                                <label for="material_provider" class="col-sm-4 col-form-label text-md-right">{{ __('Material Provider') }}</label>

                                <div class="col-md-6">
                                <input id="material_provider" type="text"  name="material_provider" value="{{$appl->material_provider}}" required autofocus>
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="cost" class="col-md-4 col-form-label text-md-right">{{ __('Cost') }}</label>

                                <div class="col-md-6">
                                    <input id="cost" type="number"  name="cost" required value="{{$appl->cost}}">
                                </div>
                            </div>

                            <div class="form-group row">
                                    <label for="img" class="col-md-4 col-form-label text-md-right">{{ __('Image') }}</label>
        
                                    <div class="col-md-6">
                                        <input id="img" type="file"  name="img" >
                                    </div>
                            </div>

                            <div class="form-group row">
                                <label for="description" class="col-md-4 col-form-label text-md-right">{{ __('Description') }}</label>

                                <div class="col-md-6">
                                    <textarea class="ckeditor" name="comments" id="description" >{{$appl->comments}}</textarea>
                                </div>
                            </div>
                            {{Form::hidden('_method', 'PUT')}}
                            <div class="form-group row mb-0">
                                <div class="col-md-8 offset-md-4">
                                    <button type="submit" class="btn btn-primary">
                                        {{ __('Submit') }}
                                    </button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
    @endsection
@else
    @section('content')
        <h2>Permission Denied</h2>
    @endsection
@endif
