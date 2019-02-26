@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">
                <h1>@lang('Reading.contact')</h1>
                <ul>
                <li><a href="{{ action('Reading\PersonController@create') }}">@lang('Reading.ReadingForm')</a></li>
                </ul>
                </div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                    <h2>@lang('Reading.list')</h2>
                    @if(isset($person))
                    <table class="table">
                    <th>@lang('Reading.dateheader')</th><th>@lang('Reading.titleheader')</th><th>@lang('Reading.statusheader')</th>
                    @foreach($person as $data)
                    <tr>
                    <td>{{ $date->parse($data->created_at)->toFormattedDateString() . ' ' . $date->parse($data->created_at)->toTimeString() }}</td>
                    <td><a href="{{ action('Reading\PersonController@show', ['id' => $data->id]) }}">{{ $data->book_title }}</a></td>
                    <td>{{ $data->status->name }}</td>
                    </tr>
                    @endforeach
                    </table>
                    @else
                    <p>
                    @lang('Reading.notfound')
                    </p>
                    @endif
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
