@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">
                <h1>@lang('Reading.PersonInfo')</h1>
                </div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                    <p>
                    @lang('Reading.CheckBook.MoreInfo')
                    </p>
                    
                    @include('reading.person.form')
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
