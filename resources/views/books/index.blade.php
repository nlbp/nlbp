@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading">
                                <form class="form-horizontal" role="search" method="POST" action="{{ url('/books/results') }}">
                {{ csrf_field() }}

                @include('books.searchform')
                </form>
                
                @if( isset($book))
                <h1>@lang('bookmessages.bookindex')</h1>
                @endif
                @if( isset($results))
                <h1>@lang('bookmessages.searchpage')</h1>
                @endif
                                <ul>
								@can('create.book')
                <li><a href="{{ url('/books/create') }}">@lang('bookCreate.add')</a></li>
				@endcan
                </ul>
                                </div>
                                                  
                <div class="panel-body" role="main">
				@can('view.book')
@if(isset($book) && $book->total() > 0)
    <p>
    @lang('bookmessages.booktotal') {{ $book->total() }}
    </p>
                <table class="table">
                <th>@lang('bookmessages.booknumber')</th><th>@lang('bookmessages.booktitle')</th><th>@lang('bookmessages.bookisbn')</th><th>@lang('bookmessages.bookprod')</th><th>@lang('bookmessages.bookamount')</th><th>@lang('bookmessages.booktype')</th><th>@lang('bookmessages.bookstatus')</th><th>@lang('bookmessages.bookcategory')</th><th>@lang('bookmessages.action')</th>
                @foreach ($book as $data)
                <tr>
                <td>{{ $data->abnumber }}</td><td><a href="{{ action('Books\BookController@show', ['id' => $data->aid]) }}">
                @if($data->book_set == 1)
                {{ $data->detail['btitle'] }} @lang('bookmessages.bookset')
                @else
                {{ $data->detail['btitle'] }} 
                @endif</a></td>
                <td>{{ $data->detail['bisbn'] }}</td><td>{{ $data->aprod }}</td><td>{{ $data->aamount }}</td><td>{{ $data->type['btname'] }}</td><td>{{ $data->status['bsstatus'] }}</td><td>{{ $data->detail['main']['bmmain'] }}</td><td><a class="btn btn-default" href="{{ action('Books\BookController@edit', ['id' => $data->aid]) }}" role="button">@lang('bookCreate.edit')</a><a class="btn btn-default" href="{{ action('Books\BookController@remove', ['id' => $data->aid]) }}" role="button">@lang('bookCreate.remove')</a></td>
                </tr>
                @endforeach
                </table>
                                <h3>@lang('bookmessages.pages')</h3>
{{ $book->links() }}
                @endif

                @if( isset($results))
                <h2>@lang('bookmessages.results')</h2>
                @if($results->total() > 0)
                <p>
                @lang('bookmessages.founditems', ['total' => $results->total()])
                </p>
                                <table class="table">
                <th>@lang('bookmessages.booknumber')</th><th>@lang('bookmessages.booktitle')</th><th>@lang('bookmessages.bookisbn')</th><th>@lang('bookmessages.bookprod')</th><th>@lang('bookmessages.bookamount')</th><th>@lang('bookmessages.booktype')</th><th>@lang('bookmessages.bookstatus')</th><th>@lang('bookmessages.bookcategory')</th><th>@lang('bookmessages.action')</th>
                @foreach ($results as $data)
                <tr>
                <td>{{ $data->abnumber }}</td><td><a href="{{ action('Books\BookController@show', ['id' => $data->aid]) }}">
                @if($data->book_set == 1)
                {{ $data->detail['btitle'] }} @lang('bookmessages.bookset')
                @else
                {{ $data->detail['btitle'] }} 
                @endif</a></td>
                <td>{{ $data->detail['bisbn'] }}</td><td>{{ $data->aprod }}</td><td>{{ $data->aamount }}</td><td>{{ $data->type['btname'] }}</td><td>{{ $data->status['bsstatus'] }}</td><td>{{ $data->detail['main']['bmmain'] }}</td><td><a class="btn btn-default" href="{{ action('Books\BookController@edit', ['id' => $data->aid]) }}" role="button">@lang('bookCreate.edit')</a></td>
                </tr>
                @endforeach
                </table>
                @else
                @lang('SearchMessages.BookNotFound')
                @endif
                @if( $results->lastPage() > 1 )
                                <h3>@lang('bookmessages.searchpages', ['currentpage' => $results->currentPage(), 'lastpage' => $results->lastPage()])</h3>
{{ $results->links() }}
@endif
                @endif
				@endcan

                </div>
            </div>
        </div>
    </div>
</div>
@endsection
