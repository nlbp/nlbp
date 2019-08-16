@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading"><h1>NLBP data</h1></div>

                <div class="panel-body">
                <h1>@lang('SearchMessages.BookLatest')</h1>
                @foreach ($book as $data)
                @if($data->book->book_set == 1)
                <h3>{{ $data->btitle }} @lang('bookmessages.bookset')</h3>
                @else
                <h3>{{ $data->btitle }}</h3>
                @endif
                <ul>
                @if($data->bdatein ==! null)
                <li>@lang('bookmessages.datein', ['date' => $data->bdatein])</li>
                @endif
                @if($data->bauthor ==! null)
                <li>@lang('bookmessages.author', ['name' => $data->bauthor])</li>
                @endif
                @if($data->btranslate ==! null)
                <li>@lang('bookmessages.translate', ['name' => $data->btranslate])</li>
                @endif
                @if($data->bpublish ==! null)
                <li>@lang('bookmessages.publish', ['name' => $data->bpublish])</li>
                @endif
                @if($data->bread ==! null)
                <li>@lang('bookmessages.readby', ['name' => $data->bread])</li>
                @endif
                </ul>
                {{ $data->bdetail }}
                @endforeach
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
