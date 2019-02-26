@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">
                <h1>{{ $data->book_title }}</h1>
                @hasRole('admin')
                <a href="#"
                @click="inputActive=true">{{ __('Reading.changestatus') }}</a>
                @endHasRole
                </div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                    <ul v-if="inputActive == false">
                    <li>{{ __('Reading.status').' '.$data->status->name }}</li>
                    <li>{{ __('Reading.firstname').' '.$data->firstname.' '.$data->lastname }}</li>
                    <li>{{ __('Reading.booktitle').' '.$data->book_title }}</li>
                    </ul>
                    
                    <form action="{{ action('Reading\PersonController@updateStatus', ['id' => $data->id]) }}"
                    method="post"
                    v-if="inputActive == true">
                    @csrf
                    @method('PUT')
                    
                    <div class="form-group">
                    <label for="reading_status" class="col-md-4 control-label">@lang('bookCreate.bookstatus')</label>
                    <div class="col-md-6 col-md-offset-4">
                    @foreach($dataStatus as $status)
                    <div class="radio">
                    <label>
                    <input type="radio"
                    name="reading_status"
                    id="{{ 'status' . $status->id }}"
                    value="{{ $status->id }}"
                    required="required"
                    @if($data->status_id == $status->id)
                    checked="checked"
                    @endif> {{ $status->name }}
                    </label>
                                        </div>
                                        @endforeach
                                        
                                        @if ($errors->has('reading_status'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('reading_status') }}</strong>
                                    </span>
                                @endif
                                        </div>
                                        </div>
                                        
                                        <div class="form-group">
                    <div class="col-md-6 col-md-offset-4">
                    <button type="submit"
                    class="btn btn-primary">
                    {{ __('Reading.changestatus') }}
                    </button>
                    </div>
                    </div>
                    
                    <div class="form-group">
                    <div class="col-md-6 col-md-offset-4">
                    <button type="button"
                    class="btn btn-primary"
                    @click="inputActive =false">
                    {{ __('Reading.cancel') }}
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
