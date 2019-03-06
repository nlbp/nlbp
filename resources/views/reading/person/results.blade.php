@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">
                <h1>@lang('Reading.CheckBook.Results')</h1>
                </div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                    @isset($book)
                    <p>
                    @lang('Reading.CheckBook.ListFoundBook')
                    </p>
                    @foreach($book as $data)
                    <h2>@lang('Reading.CheckBook.BookTitle') {{ $data->btitle }}</h2>
                    <p>
                    @lang('Reading.CheckBook.BookAuthor') {{ $data->bauthor }}
                    </p>
                    <p>
                    @lang('Reading.CheckBook.BookPublish') {{ $data->bpublish }}
                    </p>
                    <p>
                    @lang('Reading.CheckBook.BookTrans') {{ $data->btrans }}
                    </p>
                    <p>
                    @lang('Reading.CheckBook.ReadBy') {{ $data->bread }}
                    </p>
                    @endforeach
                    <p>
                    <a class="btn btn-default" href="{{ url('reading/person/create') }}" role="button">@lang('Reading.CheckBook.BackCreate')</a>
                    </p>
                    @endisset
                    
                    @isset($samebook)
                    <p>
                    @lang('Reading.CheckBook.ListFoundSameBook')
                    </p>
                    @foreach($samebook as $data)
                    <h2>@lang('Reading.CheckBook.BookTitle') {{ $data->btitle }}</h2>
                    <p>
                    @lang('Reading.CheckBook.BookAuthor') {{ $data->bauthor }}
                    </p>
                    <p>
                    @lang('Reading.CheckBook.BookPublish') {{ $data->bpublish }}
                    </p>
                    <p>
                    @lang('Reading.CheckBook.BookTrans') {{ $data->btrans }}
                    </p>
                    <p>
                    @lang('Reading.CheckBook.ReadBy') {{ $data->bread }}
                    </p>
                    @endforeach
                    @include('reading.person.step1')
                    @endisset
                    
                    @isset($person)
                    <p>
                    @lang('Reading.CheckBook.ListFoundPerson')
                    </p>
                    @foreach($person as $data)
                    <h2>@lang('Reading.CheckBook.BookTitle') {{ $data->book_title }}</h2>
                    <p>
                    @lang('Reading.CheckBook.BookAuthor') {{ $data->book_author }}
                    </p>
                    <p>
                    @lang('Reading.CheckBook.BookTrans') {{ $data->book_trans }}
                    </p>
                    <p>
                    @lang('Reading.CheckBook.BookPublish') {{ $data->book_publish }}
                    </p>
                    <p>
                    @lang('Reading.CheckBook.ReadByPerson') {{ $data->firstname . ' ' . $data->lastname }}
                    </p>
                    @endforeach
                    <p>
                    <a class="btn btn-default" href="{{ url('reading/person/create') }}" role="button">@lang('Reading.CheckBook.BackCreate')</a>
                    </p>
                    @endisset
                    
                    @isset($sameperson)
                    <p>
                    @lang('Reading.CheckBook.ListFoundSamePerson')
                    </p>
                    @foreach($sameperson as $data)
                    <h2>@lang('Reading.CheckBook.BookTitle') {{ $data->book_title }}</h2>
                    <p>
                    @lang('Reading.CheckBook.BookAuthor') {{ $data->book_author }}
                    </p>
                    <p>
                    @lang('Reading.CheckBook.BookTrans') {{ $data->book_trans }}
                    </p>
                    <p>
                    @lang('Reading.CheckBook.BookPublish') {{ $data->book_publish }}
                    </p>
                    <p>
                    @lang('Reading.CheckBook.ReadByPerson') {{ $data->firstname . ' ' . $data->lastname }}
                    </p>
                    @endforeach
                    @include('reading.person.step1')
                    @endisset
                    
                    @empty($book)
                    @empty($person)
                    @empty($samebook)
                    @empty($sameperson)
                    <p>
                    @lang('Reading.CheckBook.ListNotFound')
                    </p>
                    @include('reading.person.step1')
                    @endempty
                    @endempty
                    @endempty
                    @endempty
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
