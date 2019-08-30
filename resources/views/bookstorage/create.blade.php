@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">
                <h1>Nlbp data</h1>
                </div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif
                    
                    <form action="{{ action('BookStorage\BookStorageController@store') }}" method="post" novalidate="novalidate">
                    <div class="form-group">
                    <label class="col-md-4 control-label" for="category" id="category">@lang('bookCreate.bookcategory')</label>
                    <div class="col-md-6">
                    <select class="form-control" name="category" id="category" required>
                    <option value="">@lang('bookCreate.nocategory')</option>
                    </select>
                    
                    @if ($errors->has('category'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('category') }}</strong>
                                    </span>
                                @endif
                    </div>
                    </div>
                    
                    <div class="form-group">
                    <label class="col-md-4 control-label" for="title" id="title">@lang('bookCreate.booktitle')</label>
                    <div class="col-md-6">
                    <input type="text" class="form-control" name="title" id="title" placeholder="@lang('bookCreate.booktitle')" required>
                    
                    @if ($errors->has('title'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('title') }}</strong>
                                    </span>
                                @endif
                    </div>
                    </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
