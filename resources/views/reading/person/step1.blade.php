                    <form action="{{ action('Reading\PersonController@confirm') }}" method="get" novalidate="novalidate" role="form">
                    {{ csrf_field() }}
                                        
                    <div class="form-group">
                    <div class="col-md-6 col-md-offset-4">
                    <input type="hidden" name="booktitle" value="{{ old('booktitle') }}">
                    <input type="hidden" name="firstname" id="firstname" value="{{ old('firstname') }}">
                    <input type="hidden" name="lastname" id="lastname" value="{{ old('lastname') }}">
                    <input type="hidden" name="email" id="email" value="{{ old('email') }}">
                    <input type="hidden" name="phone" id="phone" value="{{ old('phone') }}">
                    <input type="hidden" name="bookauthor" id="bookauthor" value="{{ old('bookauthor') }}">
                    <input type="hidden" name="booktrans" id="booktrans" value="{{ old('booktrans') }}">
                    <input type="hidden" name="bookpublish" id="bookpublish" value="{{ old('bookpublish') }}">
                    <button class="btn btn-primary" type="submit">
                    @lang('Reading.continue')
                    </button>
                    </div>
                    </div>
                    </form>
                    <p>
                    <a class="btn btn-default" href="{{ url('reading/person/create') }}" role="button">@lang('Reading.CheckBook.BackCreate')</a>
                    </p>
                    