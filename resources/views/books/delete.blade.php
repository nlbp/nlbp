@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading">
                <h1>@lang('bookCreate.bookRemove')</h1>
                </div>

                <div class="panel-body">
                    <p>
                    @lang('bookCreate.confirmRemove')
                    </p>
                    
                    <form name="delete" action="{{ action('Books\BookController@destroy', ['id' => $book->aid]) }}" method="post">
                    {{ method_field('delete') }}
                    {{ csrf_field() }}
                                        <div class="form-group">
                    <div class="col-md-6 col-md-offset-4">
                    <button type="submit" class="btn btn-primary">
                    @lang('bookCreate.remove')
                    </button>
                    <a class="btn btn-default" href="{{ action('Books\BookController@index') }}" role="button">@lang('bookCreate.backIndex')</a>
                    <a class="btn btn-default" href="{{ action('Books\BookController@show', ['id' => $book->aid]) }}" role="button">@lang('bookCreate.backDetail')</a>
                    </div>
                    </div>
                    </form>

                </div>
            </div>
        </div>
    </div>
</div>
@endsection
