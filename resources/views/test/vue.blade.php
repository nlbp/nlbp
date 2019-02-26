@extends('layouts.app')

@section('content')
<book-content
view-type="detail"
:book-title="test"
book-detail="Test vue"></book-content>
@{{ bookDetail }}
@endsection
