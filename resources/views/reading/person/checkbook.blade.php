@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">
                <h1>{{ __('Reading.CheckBook.Title') }} </h1>
                </div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                    <p>
                    {{ __('Reading.CheckBook.Description') }}
                    </p>
                    <form action="{{ action('Reading\PersonController@checkBook') }}" method="get" novalidate="novalidate" role="form">
                    {{ csrf_field() }}
                    
                    <div class="form-group">
                    <label class="col-md-4 control-label" for="booktitle">{{ __('Reading.CheckBook.BookTitle') }}</label>
                    <div class="col-md-6">
                    <input type="text" class="form-control" name="booktitle" id="booktitle" placeholder="{{ __('Reading.CheckBook.BookTitle') }}" required="required" value="{{ old('booktitle') }}">
                    
                    @if ($errors->has('booktitle'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('booktitle') }}</strong>
                                    </span>
                                @endif
                    </div>
                    </div>
                    
                    <div class="form-group">
                    <div class="col-md-6 col-md-offset-4">
                    <button class="btn btn-primary" type="submit">
                    @lang('Reading.CheckBook.Submit')
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
