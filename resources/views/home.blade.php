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
                    
                    <h1>@lang('SearchMessages.BookLatest')</h1>
                @foreach ($book as $data)
                @if($data->book->book_set == 1)
                <h3><a href="{{ url('search', ['id' => $data->book->aid]) }}">{{ $data->btitle }} @lang('bookmessages.bookset')</a></h3>
                @else
                <h3><a href="{{ url('search', ['id' => $data->book->aid]) }}">{{ $data->btitle }}</a></h3>
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
