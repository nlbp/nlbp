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
                    
                    <form action="{{ action('Export\ExcelController@download') }}" method="get" novalidate="novalidate">
                    
                    
                    <div class="form-group">
                    <label class="col-md-4 control-label" for="startdate" id="startdate">{{ __('Export.Excel.DateStart') }}</label>
                    <div class="col-md-6">
                    <input type="date" class="form-control" name="startdate" id="startdate">
                    
                    @if ($errors->has('startdate'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('startdate') }}</strong>
                                    </span>
                                @endif
                    </div>
                    </div>
                    
                    <div class="form-group">
                    <label class="col-md-4 control-label" for="enddate" id="enddate">{{ __('Export.Excel.EndDate') }}</label>
                    <div class="col-md-6">
                    <input type="date" class="form-control" name="enddate" id="enddate">
                    
                    @if ($errors->has('enddate'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('enddate') }}</strong>
                                    </span>
                                @endif
                    </div>
                    </div>
                    
                    <div class="form-group">
                    <div class="col-md-6 col-md-offset-4">
                    <button type="submit" class="btn btn-primary">
                    {{ __('Export.Excel.Export') }}
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
