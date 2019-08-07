@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">
                <h1>{{ __('ReadingStatus.list') }}</h1>
                </div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                    <form class="form-horizontal" action="{{ action('Reading\StatusController@store') }}" method="post" role="form" novalidate="novalidate">
                    {{ csrf_field() }}
                    
                    <div class="form-group"
                    v-if="inputActive==true">
                    <label class="col-md-4 control-label" for="name">@lang('ReadingStatus.name')</label>
                    <div class="col-md-6">
                    <input type="text" class="form-control" id="name" name="name" placeholder="@lang('ReadingStatus.name')">
                    </div>
                    </div>
                    
                    <div class="form-group"
                    v-if="inputActive==true">
                    <div class="col-md-6 col-md-offset-4">
                    <button class="btn btn-primary"
                    type="submit">
                    {{ __('ReadingStatus.save') }}
                    </button>
                    <button class="btn btn-primary"
                    type="button"
                    @click="inputActive=false">
                    {{ __('ReadingStatus.cancel') }}
                    </button>
                    </div>
                    </div>
                    
                    <div class="form-group"
                    v-if="inputActive==false">
                    <div class="col-md-6 col-md-offset-4">
                    <button class="btn btn-primary"
                    @click="inputActive=true"
                    type="button">
                    {{ __('ReadingStatus.add') }}
                    </button>
                    </div>
                    </div>
                    </form>

                    @if(isset($status))
                    <table class="table">
                    <th>@lang('ReadingStatus.id')</th><th>@lang('ReadingStatus.name')</th>
                    @foreach($status as $data)
                    <tr>
                    <td>{{ $data->id }}</td><td>{{ $data->name }}</td>
                    </tr>
                    @endforeach
                    </table>
                    @endif
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
