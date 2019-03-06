                    <form action="{{ action('Reading\PersonController@store') }}" method="post" novalidate="novalidate" role="form" enctype="multipart/form-data">
                    @csrf
                    
                    <div v-if="inputActive == false"
                    class="form-group">
<span class="help-block">
                                        <strong>{{ __('Reading.booktitle') }} {{ old('booktitle') }}</strong>
                                    </span>
                    <div class="col-md-6">
                    <button type="button"
                    @click="inputActive = true, checkedit = 1">
                    {{ __('Reading.TitleEdit') }}
                    </button>
                    </div>
                    </div>
                    
                    <div v-if="inputActive == true"
                    class="form-group">
                    <label class="col-md-4 control-label" for="booktitle">{{ __('Reading.CheckBook.BookTitle') }}</label>
                    <div class="col-md-6">
                    <input type="text" class="form-control" name="booktitle" id="booktitle" placeholder="{{ __('Reading.CheckBook.BookTitle') }}" required="required" value="{{ old('booktitle') }}">
                    
                    @if ($errors->has('booktitle'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('booktitle') }}</strong>
                                    </span>
                                @endif
                    </div>
                    </div>
                    
                    <div class="form-group">
                    <label class="col-md-4 control-label" for="firstname">@lang('Reading.firstname')</label>
                    <div class="col-md-6">
                    <input type="text" class="form-control" name="firstname" id="firstname" required="required" value="{{ old('firstname') }}">
                    
                    @if ($errors->has('firstname'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('firstname') }}</strong>
                                    </span>
                                @endif
                    </div>
                    </div>
                    
                    <div class="form-group">
                    <label class="col-md-4 control-label" for="lastname">@lang('Reading.lastname')</label>
                    <div class="col-md-6">
                    <input type="text" class="form-control" name="lastname" id="lastname" required="required" value="{{ old('lastname') }}">
                    
                    @if ($errors->has('lastname'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('lastname') }}</strong>
                                    </span>
                                @endif
                    </div>
                    </div>
                    
                    <div class="form-group">
                    <label class="col-md-4 control-label" for="email">@lang('Reading.email')</label>
                    <div class="col-md-6">
                    <input type="email" class="form-control" name="email" id="email" required="required" value="{{ old('email') }}">
                    
                    @if ($errors->has('email'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('email') }}</strong>
                                    </span>
                                @endif
                    </div>
                    </div>
                    
                    <div class="form-group">
                    <label class="col-md-4 control-label" for="phone">@lang('Reading.phone')</label>
                    <div class="col-md-6">
                    <input type="tel" class="form-control" name="phone" id="phone" required="required" value="{{ old('phone') }}">
                    
                    @if ($errors->has('phone'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('phone') }}</strong>
                                    </span>
                                @endif
                    </div>
                    </div>
                    
                                        <div class="form-group">
                    <label class="col-md-4 control-label" for="bookauthor">@lang('Reading.CheckBook.BookAuthor')</label>
                    <div class="col-md-6">
                    <input type="text" class="form-control" name="bookauthor" id="bookauthor" placeholder="@lang('Reading.CheckBook.BookAuthor')" required="required" value="{{ old('bookauthor') }}">
                    
                    @if ($errors->has('bookauthor'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('bookauthor') }}</strong>
                                    </span>
                                @endif
                    </div>
                    </div>
                    
                    <div class="form-group">
                    <label class="col-md-4 control-label" for="booktrans">@lang('Reading.CheckBook.BookTrans')</label>
                    <div class="col-md-6">
                    <input type="text" class="form-control" name="booktrans" id="booktrans" placeholder="@lang('Reading.CheckBook.BookTrans')" value="{{ old('booktrans') }}">
                    
                    @if ($errors->has('booktrans'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('booktrans') }}</strong>
                                    </span>
                                @endif
                    </div>
                    </div>
                    
                    <div class="form-group">
                    <label class="col-md-4 control-label" for="bookpublish">@lang('Reading.CheckBook.BookPublish')</label>
                    <div class="col-md-6">
                    <select class="form-control" name="bookpublish" id="bookpublish" required multiple="multiple">
                    @foreach($publisher as $data)
                    <option value="{{ $data['name'] }}"
                    @if($data['name'] == old('bookpublish'))
                    selected="selected"
                    @endif>{{ $data['name'] }}</option>
                    @endforeach
                    <option v-model="selectActive = true" value="other">Other publisher</option>
                    </select>
                    
                    @if ($errors->has('bookpublish'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('bookpublish') }}</strong>
                                    </span>
                                @endif
                    </div>
                    </div>
                                        
                    <div class="form-group">
                    <label class="col-md-4 control-label" for="bookimage">@lang('Reading.bookimage')</label>
                    <div class="col-md-6">
                    <input type="file" class="form-control" name="bookimage" id="bookimage">
                    
                    @if ($errors->has('bookimage'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('bookimage') }}</strong>
                                    </span>
                                @endif
                    </div>
                    </div>
                                        
                    <div class="form-group">
                    <div class="col-md-6 col-md-offset-4">
                    <input v-if="inputActive == false" type="hidden" name="booktitle" value="{{ old('booktitle') }}">
                    <input type="hidden" name="checkedit" :value="checkedit">
                    <button class="btn btn-primary"
                    type="submit"
                    v-if="inputActive == false">
                    {{ __('Reading.save') }}
                    </button>
                    <button class="btn btn-primary"
                    type="submit"
                    v-if="inputActive == true">
                    {{ __('Reading.CheckBook.Submit') }}
                    </button>
                    </div>
                    </div>
                    </form>
                    