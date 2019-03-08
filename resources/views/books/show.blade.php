@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading">
                @if($book->book_set == 1)
                <h1>{{ $book->detail->btitle }} @lang('bookmessages.bookset')</h1>
                @else
                <h1>{{ $book->detail->btitle }}</h1>
                @endif
                                    <ul>
                    @if($book->abnumber ==! null)
                    <li>@lang('bookdetail.booknumber', ['text' => $book->abnumber])</li>
                    @endif
                    @if($book->aprod ==! null)
                    <li>@lang('bookdetail.bookprod', ['text' => $book->aprod])</li>
                    @endif
                    @if($book->detail->main->bmmain ==! null)
                    <li>@lang('bookdetail.bookcategory', ['text' => $book->detail->main->bmmain])</li>
                    @endif
                    @if($book->type->btname ==! null)
                    <li>@lang('bookdetail.booktype', ['text' => $book->type->btname])</li>
                    @endif
                                        @if($book->detail->bisbn ==! null)
                    <li>@lang('bookdetail.bookisbn', ['number' => $book->detail->bisbn])</li>
                    @endif
                    @if($book->detail->bsubject ==! null)
                    <li>@lang('bookdetail.booksubject', ['text' => $book->detail->bsubject])</li>
                    @endif
                                        @if($book->detail->bword ==! null)
                    <li>@lang('bookdetail.bookkeyword', ['text' => $book->detail->bword])</li>
                    @endif
                                        @if($book->detail->bauthor ==! null)
                    <li>@lang('bookdetail.author', ['text' => $book->detail->bauthor])</li>
                    @endif
                                        @if($book->detail->btranslate ==! null)
                    <li>@lang('bookdetail.translate', ['text' => $book->detail->btranslate])</li>
                    @endif
                    @if($book->detail->bpublish ==! null)
                    <li>@lang('bookdetail.publish', ['text' => $book->detail->bpublish])</li>
                    @endif
                                        @if($book->detail->province['province_name'] ==! null)
                    <li>@lang('bookdetail.province', ['text' => $book->detail->province['province_name']])</li>
                    @endif
                                        @if($book->detail->bread ==! null)
                    <li>@lang('bookdetail.readby', ['text' => $book->detail->bread])</li>
                    @endif
                    @if($book->status->bsstatus ==! null)
                    <li>@lang('bookdetail.bookstatus', ['text' => $book->status->bsstatus])</li>
                    @endif
                    @if($book->aamount ==! null)
                    <li>@lang('bookdetail.bookamount', ['number' => $book->aamount])</li>
                    @endif
                                        @if($book->detail->bdatein ==! null)
                    <li>@lang('bookdetail.bookdatein', ['date' => $book->detail->bdatein])</li>
                    @endif
                                        @if($book->book_hr ==! null)
                    <li>@lang('bookdetail.booktime', ['hr' => $book->book_hr, 'min' => $book->book_min])</li>
                    @elseif($book->book_min ==! null)
                    <li>@lang('bookdetail.booktime', ['hr' => $book->book_hr, 'min' => $book->book_min])</li>
                    @endif
                    </ul>
                
                </div>

                <div class="panel-body">
                <h2>@lang('bookdetail.bookdetail')</h2>
                {{ $book->detail->bdetail }}
                <h2>@lang('bookmessages.remark')</h2>
                <p>
                {{ $book->detail->bremark }}
                </p>
                
                <a class="btn btn-default" href="{{ action('Books\BookController@edit', ['id' => $book->aid]) }}" role="button">@lang('bookCreate.edit')</a>
                <a class="btn btn-default" href="{{ action('Books\BookController@remove', ['id' => $book->aid]) }}" role="button">@lang('bookCreate.remove')</a>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
