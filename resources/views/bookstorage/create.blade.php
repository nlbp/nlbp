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
                    
                    <form action="{{ action('BookStorage\BookStorageController@store') }}" method="post" novalidate="novalidate">
                    @csrf
                    
                    <div class="form-row">
                    <div class="form-group col-md-6">
                    <label for="source">{{ __('BookStorage.Source') }}</label>
                    <select class="form-control" name="source" id="source" required="required">
                    <option value="">{{ __('BookStorage.NotSelect') }}</option>
                    </select>
                    </div>
                    
                    <div class="form-group col-md-6">
                    <label for="category">{{ __('BookStorage.Category') }}</label>
                    <select class="form-control" name="category" id="category" required="required">
                    <option value="">{{ __('BookStorage.NotSelect') }}</option>
                    </select>
                    </div>
                    </div>
                    
                    <div class="form-row">
                    <div class="form-group col-md-6">
                    <label for="checkin">{{ __('BookStorage.Checkin') }}</label>
                    <input type="date" class="form-control" name="checkin" id="checkin" required="required" placeholder="{{ __('BookStorage.Checkin') }}">
                    </div>
                    
                    <div class="form-group col-md-6">
                    <label for="checkout">{{ __('BookStorage.Checkout') }}</label>
                    <input type="date" class="form-control" name="checkout" id="checkout" required="required" placeholder="{{ __('BookStorage.Checkout') }}">
                    </div>
                    </div>
                    
                    <div class="form-group">
                    <label for="booktitle">{{ __('BookStorage.BookTitle') }}</label>
                    <input type="text" class="form-control" name="booktitle" id="booktitle" required="required" placeholder="{{ __('BookStorage.BookTitle') }}">
                    </div>
                    
                    <div class="form-row">
                    <div class="form-group col-md-4">
                    <label for="membername">{{ __('BookStorage.MemberName') }}</label>
                    <input type="text" class="form-control" name="membername" id="membername" required="required" placeholder="{{ __('BookStorage.MemberName') }}">
                    </div>
                    
                    <div class="form-group col-md-4">
                    <label for="memberlastname">{{ __('BookStorage.MemberLastname') }}</label>
                    <input type="text" class="form-control" name="memberlastname" id="memberlastname" required="required" placeholder="{{ __('BookStorage.MemberLastname') }}">
                    </div>
                    
                    <div class="form-group col-md-4">
                    <label for="phone">{{ __('BookStorage.Phone') }}</label>
                    <input type="tel" class="form-control" name="phone" id="phone" required="required" placeholder="{{ __('BookStorage.Phone') }}">
                    </div>
                    </div>
                    
                    <div class="form-group">
    <label for="address">{{ __('BookStorage.Address') }}</label>
    <input type="text" class="form-control" id="address" placeholder="{{ __('BookStorage.Address') }}" required="required">
  </div>
  
  <div class="form-row">
    <div class="form-group col-md-6">
      <label for="city">{{ __('BookStorage.City') }}</label>
      <input type="text" class="form-control" id="city" required="required" placeholder="{{ __('BookStorage.City') }}">
    </div>
    
    <div class="form-group col-md-4">
      <label for="province">{{ __('BookStorage.Province') }}</label>
      <select id="province" class="form-control" required="required">
        <option selected>{{ __('BookStorage.NotSelect') }}</option>
      </select>
    </div>
    <div class="form-group col-md-2">
      <label for="zip">{{ __('BookStorage.Zip') }}</label>
      <input type="text" class="form-control" id="zip" required="required" placeholder="{{ __('BookStorage.Zip') }}">
    </div>
  </div>
  
  <button type="submit" class="btn btn-primary" disabled="disabled">{{ __('BookStorage.Save') }}</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
