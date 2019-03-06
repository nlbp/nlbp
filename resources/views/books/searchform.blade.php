                <div class="form-group">
                <label for="search" class="col-md-4 control-label">@lang('bookmessages.search')</label>
                <div class ="col-md-6">
                <input type="text" class="form-control" id="search" name="search" value="{{ old('search') }}">
                </div>
                </div>

                <div class="form-group">
                    <label class="col-md-4 control-label" for="selectoption" id="selectoption">@lang('bookmessages.searchOption')</label>
                    <div class="col-md-6">
                    <select class="form-control" name="selectoption" id="selectoption">
                    <option value="booktitle"
                    @if($option == 'booktitle')
                    selected = "selected"
                    @endif>@lang('bookmessages.booktitle')</option>
                    <option value="author"
                    @if($option == 'author')
                    selected = "selected"
                    @endif>@lang('bookmessages.searchAuthor')</option>
                    <option value="readby"
                    @if($option == 'readby')
                    selected = "selected"
                    @endif>@lang('bookmessages.searchReadby')</option>
                    @role('admin')
                    <option value="remark"
                    @if($option == 'remark')
                    selected="selected"
                    @endif>@lang('bookmessages.searchremark')</option>
                    @endRole
                    </select>
                    </div>
                    </div>
                
                <div class="form-group">
                <div class="col-md-8 col-offset-4">
                <button type="submit" class="btn btn-primary">@lang('bookmessages.search')</button>
                </div>
                </div>
