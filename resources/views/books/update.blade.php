@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading">
                <h1>@lang('bookCreate.edit')</h1>
                </div>

                <div class="panel-body">
                    <form action="{{ action('Books\BookController@update', ['book' => $book->aid]) }}" method="post" novalidate="novalidate">
                    {{ method_field('PUT') }}
                    {{ csrf_field() }}

                    <div class="form-group">
                    <div class="col-md-6">
                    <div class="checkbox">
  <label>
    <input type="checkbox" name="bookset" id="bookset" value="{{ $book->book_set }}"
    @if($book->book_set == 1)
    checked=checked
    @endif>@lang('bookCreate.bookset')
  </label>
</div>
                    </div>
                    </div>
                    
                    <div class="form-group">
                    <label class="col-md-4 control-label" for="category" id="category">@lang('bookCreate.bookcategory')</label>
                    <div class="col-md-6">
                    <select class="form-control" name="category" id="category" required>
                    <option value="">@lang('bookCreate.nocategory')</option>
                    @foreach($category as $datacategory)
                    <option value="{{ $datacategory->bmid }}"
                    @if($book->detail->bmain == $datacategory->bmid)
                    selected="selected"
                    @endif>{{ $datacategory->bmmain }}</option>
                    @endforeach
                    </select>
                    
                    @if ($errors->has('category'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('category') }}</strong>
                                    </span>
                                @endif
                    </div>
                    </div>
                    
                    <div class="form-group">
                    <label class="col-md-4 control-label" for="type" id="type">@lang('bookCreate.booktype')</label>
                    <div class="col-md-6">
                    <select class="form-control" name="type" id="type" required>
                    <option value="">@lang('bookCreate.notype')</option>
                    @foreach($type as $datatype)
                    <option value="{{ $datatype->btid }}"
                    @if($book->btype == $datatype->btid)
                    selected="selected"
                    @endif>{{ $datatype->btname }}</option>
                    @endforeach
                    </select>
                    
                    @if ($errors->has('type'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('type') }}</strong>
                                    </span>
                                @endif
                    </div>
                    </div>
                                        
                                        <div class="form-group">
                    <label class="col-md-4 control-label" for="datein" id="datein">@lang('bookCreate.bookdatein')</label>
                    <div class="col-md-6">
                    <input type="datetime" class="form-control" name="datein" id="datein" value="{{ $book->detail->bdatein }}">
                    
                    @if ($errors->has('datein'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('datein') }}</strong>
                                    </span>
                                @endif
                    </div>
                    </div>

                    <div class="form-group">
                    <label class="col-md-4 control-label" for="number" id="number">@lang('bookCreate.booknumber')</label>
                    <div class="col-md-6">
                    <input type="text" class="form-control" name="number" id="number" placeholder="@lang('bookCreate.booknumber')" value="{{ $book->abnumber }}" required>
                    
                    @if ($errors->has('number'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('number') }}</strong>
                                    </span>
                                @endif
                    </div>
                    </div>
                    
                    <div class="form-group">
                    <label class="col-md-4 control-label" for="title" id="title">@lang('bookCreate.booktitle')</label>
                    <div class="col-md-6">
                    <input type="text" class="form-control" name="title" id="title" placeholder="@lang('bookCreate.booktitle')" value="{{ $book->detail->btitle }}" required>
                    
                    @if ($errors->has('title'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('title') }}</strong>
                                    </span>
                                @endif
                    </div>
                    </div>
                    
                    <div class="form-group">
                    <label class="col-md-4 control-label" for="isbn" id="isbn">@lang('bookCreate.bookisbn')</label>
                    <div class="col-md-6">
                    <input type="text" class="form-control" name="isbn" id="isbn" placeholder="@lang('bookCreate.bookisbn')" value="{{ $book->detail->bisbn }}" required>
                    
                    @if ($errors->has('isbn'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('isbn') }}</strong>
                                    </span>
                                @endif
                    </div>
                    </div>
                    
                    <div class="form-group">
                    <label class="col-md-4 control-label" for="subject" id="subject">@lang('bookCreate.booksubject')</label>
                    <div class="col-md-6">
                    <input type="text" class="form-control" name="subject" id="subject" placeholder="@lang('bookCreate.booksubject')" value="{{ $book->detail->bsubject }}" required>
                    
                    @if ($errors->has('subject'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('subject') }}</strong>
                                    </span>
                                @endif
                    </div>
                    </div>
                    
                    <div class="form-group">
                    <label class="col-md-4 control-label" for="keyword" id="keyword">@lang('bookCreate.bookkeyword')</label>
                    <div class="col-md-6">
                    <input type="text" class="form-control" name="keyword" id="keyword" placeholder="@lang('bookCreate.bookkeyword')" value="{{ $book->detail->bword }}">
                    </div>
                    </div>
                    
                    <div class="form-group">
                    <label class="col-md-4 control-label" for="readby" id="readby">@lang('bookCreate.readby')</label>
                    <div class="col-md-6">
                    <input type="text" class="form-control" name="readby" id="readby" placeholder="@lang('bookCreate.readby')" value="{{ $book->detail->bread }}" required>
                    
                    @if ($errors->has('readby'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('readby') }}</strong>
                                    </span>
                                @endif
                    </div>
                    </div>
                    
                    <div class="form-group">
                    <label class="col-md-4 control-label" for="author" id="author">@lang('bookCreate.author')</label>
                    <div class="col-md-6">
                    <input type="text" class="form-control" name="author" id="author" placeholder="@lang('bookCreate.author')" value="{{ $book->detail->bauthor }}" required>
                    
                    @if ($errors->has('author'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('author') }}</strong>
                                    </span>
                                @endif
                    </div>
                    </div>
                    
                    <div class="form-group">
                    <label class="col-md-4 control-label" for="translate" id="translate">@lang('bookCreate.translate')</label>
                    <div class="col-md-6">
                    <input type="text" class="form-control" name="translate" id="translate" placeholder="@lang('bookCreate.translate')" value="{{ $book->detail->btranslate }}">
                    </div>
                    </div>
                    
                    <div class="form-group">
                    <label class="col-md-4 control-label" for="province" id="province">@lang('bookCreate.province')</label>
                    <div class="col-md-6">
                    <select class="form-control" name="province" id="province" required>
                    <option value="">@lang('bookCreate.noprovince')</option>
                    @foreach($province as $dataprovince)
                    <option value="{{ $dataprovince->PROVINCE_ID }}"
                    @if($book->detail->province == $dataprovince->PROVINCE_ID)
                    selected="selected"
                    @endif>{{ $dataprovince->PROVINCE_NAME }}</option>
                    @endforeach
                    </select>
                    
                    @if ($errors->has('province'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('province') }}</strong>
                                    </span>
                                @endif
                    </div>
                    </div>
                    
                    <div class="form-group">
                                        <label class="col-md-4 control-label" for="publish" id="publish">@lang('bookCreate.publish')</label>
                                        <div class="col-md-6">
                    <input type="text" class="form-control" name="publish" id="publish" placeholder="@lang('bookCreate.publish')" value="{{ $book->detail->bpublish }}" required>
                    
                    @if ($errors->has('publish'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('publish') }}</strong>
                                    </span>
                                @endif
                    </div>
                    </div>
                    
                    <div class="form-group">
                                        <label class="col-md-4 control-label" for="typecount" id="typecount">@lang('bookCreate.typecount')</label>
                                        <div class="col-md-6">
                    <input type="number" class="form-control" name="typecount" id="typecount" placeholder="@lang('bookCreate.typecount')" min="1" value="{{ $book->detail->type_count }}">
                    </div>
                    </div>
                    
                    <div class="form-group">
                                        <label class="col-md-4 control-label" for="typeyear" id="typeyear">@lang('bookCreate.typeyear')</label>
                                        <div class="col-md-6">
                    <input type="number" class="form-control" name="typeyear" id="typeyear" placeholder="@lang('bookCreate.typeyear')" maxlength="4" value="{{ $book->detail->type_year }}">
                    </div>
                    </div>
                    
                    <div class="form-group">
                    <label class="col-md-4 control-label" for="detail" id="detail">@lang('bookCreate.bookdetail')</label>
                    <div class="col-md-6">
                    <textarea class="form-control" rows="5" name="detail" id="detail" placeholder="@lang('bookCreate.bookdetail')">{{ $book->detail->bdetail }}</textarea>
                    </div>
                    </div>
                    
                    <div class="form-group">
                    <label class="col-md-4 control-label" for="remark" id="remark">@lang('bookCreate.bookremark')</label>
                    <div class="col-md-6">
                    <input type="text" class="form-control" name="remark" id="remark" placeholder="@lang('bookCreate.bookremark')" value="{{ $book->detail->bremark }}">
                    </div>
                    </div>

                    <div class="form-group">
                    <label class="col-md-4 control-label" for="booktime" id="booktime">@lang('bookCreate.booktime')</label>
                    <div class="col-md-6">
                    <div class="input-group">
                    <span class="input-group-addon" id="bookhr">@lang('bookCreate.bookhr')</span>
                    <input type="number" class="form-control" name="bookhr" id="bookrh" value="{{ $book->book_hr }}" required aria-describedby="bookhr">
                    </div>

                    <div class="input-group">
                    <span class="input-group-addon" id="bookmin">@lang('bookCreate.bookmin')</span>
                    <input type="number" class="form-control" name="bookmin" id="bookmin" value="{{ $book->book_min }}" required aria-describedby="bookmin">
                    </div>
                    
                    @if ($errors->has('bookhr'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('bookhr') }}</strong>
                                    </span>
                                @endif
                    </div>
                    </div>
                    
                    <div class="form-group">
                    <label class="col-md-4 control-label" for="amount" id="amount">@lang('bookCreate.bookamount')</label>
                    <div class="col-md-6">
                    <input type="number" class="form-control" name="amount" id="amount" placeholder="@lang('bookCreate.bookamount')" min="1" value="{{ $book->aamount }}" required>
                    
                    @if ($errors->has('amount'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('amount') }}</strong>
                                    </span>
                                @endif
                    </div>
                    </div>
                    
                    <div class="form-group">
                    <label class="col-md-4 control-label" for="product" id="product">@lang('bookCreate.bookproduct')</label>
                    <div class="col-md-6">
                    <input type="text" class="form-control" name="product" id="product" placeholder="@lang('bookCreate.bookproduct')" value="{{ $book->aprod }}" required>
                    
                    @if ($errors->has('product'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('product') }}</strong>
                                    </span>
                                @endif
                    </div>
                    </div>
                    
                    <div class="form-group">
                    <label class="col-md-4 control-label" for="status">@lang('bookCreate.bookstatus')</label>
                    <div class="col-md-6 col-md-offset-4">
                    @foreach($status as $datastatus)
                    <div class="radio">
                    <label>
                    <input type="radio" name="status" id="{{ 'status' . $datastatus->bsid }}" value="{{ $datastatus->bsid }}" required
                    @if($book->astatus == $datastatus->bsid)
                    checked="checked"
                    @endif> {{ $datastatus->bsstatus }}
                    </label>
                                        </div>
                    @endforeach
                    @if ($errors->has('status'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('status') }}</strong>
                                    </span>
                                @endif
                                        </div>
                    </div>
                    
                    <div class="form-group">
                    <div class="col-md-6 col-md-offset-4">
                    <button type="submit" class="btn btn-primary">
                    @lang('bookCreate.update')
                    </button>
                    </div>
                    </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
