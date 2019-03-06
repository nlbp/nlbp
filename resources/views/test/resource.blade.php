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
                    @foreach($data->data as $details)
                    <h1>{{ $details->bid }}</h1>
                    <p>
                    {{ $details->btitle }}
                    </p>
                    @endforeach
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
