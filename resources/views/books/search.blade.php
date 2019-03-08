@extends('layouts.search')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading">
                {{-- <h1>@lang('SearchMessages.SearchBook')</h1> --}}
                <form class="form-horizontal" role="search" method="post" action="{{ url('/search/results') }}">
                {{ csrf_field() }}

                @include('books.searchform')
                </form>
                </div>
                                                  
                <div class="panel-body">
                @if( isset($book))
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
                @endif
                
                @if( isset($results))
                <h2>@lang('bookmessages.results')</h2>
                @if($results->total() > 0)
                <p>
                @lang('bookmessages.founditems', ['total' => $results->total()])
                </p>
                @else
                @lang('SearchMessages.BookNotFound')
                @endif
                @foreach ($results as $data)
                @if($data->book_set == 1)
                <h3><a href="{{ url('search', ['id' => $data->aid]) }}">{{ $data->btitle }} @lang('bookmessages.bookset')</a></h3>
                @else
                <h3><a href="{{ url('search', ['id' => $data->aid]) }}">{{ $data->btitle }}</a></h3>
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
                @if( $results->lastPage() > 1 )
                                <h3>@lang('bookmessages.searchpages', ['currentpage' => $results->currentPage(), 'lastpage' => $results->lastPage()])</h3>
{{ $results->links() }}
@endif
                @endif

                </div>
            </div>
        </div>
    </div>
</div>
@endsection
