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
                    <input v-model="page" type="text">
                    <table>
                    <th>ID</th><th>IDDetail</th><th>Aprod</th>
                    <tr v-for="text in info">
                    <td>@{{ text.aid }}</td>
                    <td>@{{ text.abook }}</td>
                    <td>@{{ text.aprod }}</td>
                    </tr>
                    </table>
                    
                                                                            </div>
            </div>  
        </div>
    </div>
</div>
@endsection
