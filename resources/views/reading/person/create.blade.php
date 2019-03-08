@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">
                <h1>@lang('Reading.ReadingForm')</h1>
                </div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                    <form action="{{ action('Reading\PersonController@store') }}" method="post" novalidate="novalidate" role="form" enctype="multipart/form-data">
                    {{ csrf_field() }}
                    
                    <div class="form-group">
                    <label class="col-md-4 control-label" for="firstname">@lang('Reading.firstname')</label>
                    <div class="col-md-6">
                    <input type="text" class="form-control" name="firstname" id="firstname" placeholder="@lang('Reading.firstname')" required="required" value="{{ old('firstname') }}">
                    
                    @if ($errors->has('firstname'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('firstname') }}</strong>
                                    </span>
                                @endif
                    </div>
                    </div>
                    
                    <div class="form-group">
                    <label class="col-md-4 control-label" for="lastname">@lang('Reading.lastname')</label>
                    <div class="col-md-6">
                    <input type="text" class="form-control" name="lastname" id="lastname" placeholder="@lang('Reading.lastname')" required="required" value="{{ old('lastname') }}">
                    
                    @if ($errors->has('lastname'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('lastname') }}</strong>
                                    </span>
                                @endif
                    </div>
                    </div>
                    
                    <div class="form-group">
                    <label class="col-md-4 control-label" for="email">@lang('Reading.email')</label>
                    <div class="col-md-6">
                    <input type="text" class="form-control" name="email" id="email" placeholder="@lang('Reading.email')" required="required" value="{{ old('email') }}">
                    
                    @if ($errors->has('email'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('email') }}</strong>
                                    </span>
                                @endif
                    </div>
                    </div>
                    
                    <div class="form-group">
                    <label class="col-md-4 control-label" for="phone">@lang('Reading.phone')</label>
                    <div class="col-md-6">
                    <input type="tel" class="form-control" name="phone" id="phone" placeholder="@lang('Reading.phone')" required="required" value="{{ old('phone') }}">
                    
                    @if ($errors->has('phone'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('phone') }}</strong>
                                    </span>
                                @endif
                    </div>
                    </div>
                    
                    <div class="form-group">
                    <label class="col-md-4 control-label" for="booktitle">@lang('Reading.booktitle')</label>
                    <div class="col-md-6">
                    <input type="text" class="form-control" name="booktitle" id="booktitle" placeholder="@lang('Reading.booktitle')" required="required" value="{{ old('booktitle') }}">
                    
                    @if ($errors->has('booktitle'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('booktitle') }}</strong>
                                    </span>
                                @endif
                    </div>
                    </div>
                    
                    <div class="form-group">
                    <label class="col-md-4 control-label" for="bookimage">@lang('Reading.bookimage')</label>
                    <div class="col-md-6">
                    <input type="file" class="form-control" name="bookimage" id="bookimage" placeholder="@lang('Reading.bookimage')" required="required" value="{{ old('bookimage') }}">
                    
                    @if ($errors->has('booktitle'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('bookimage') }}</strong>
                                    </span>
                                @endif
                    </div>
                    </div>
                    
                    <div class="form-group">
                    <label class="col-md-4 control-label" for="bookauthor">@lang('Reading.bookauthor')</label>
                    <div class="col-md-6">
                    <input type="text" class="form-control" name="bookauthor" id="bookauthor" placeholder="@lang('Reading.bookauthor')" required="required" value="{{ old('bookauthor') }}">
                    
                    @if ($errors->has('bookauthor'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('bookauthor') }}</strong>
                                    </span>
                                @endif
                    </div>
                    </div>
                    
                    <div class="form-group">
                    <div class="col-md-6 col-md-offset-4">
                    <button class="btn btn-primary" type="submit">
                    @lang('Reading.save')
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
