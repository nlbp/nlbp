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
                    
                    <form action="" method="post" name="form1" role="form">
                    
                    <div class="form-group">
                    <label for="select1">Select1</label>
                    <select v-model="selected" @change="onChange()" class="form-control" id="select1">
                    <option disabled="disabled" value="">Please select</option>
                    <option value="1">1</option>
                    <option value="2">2</option>
                    <option value="3">3</option>
                    <option value="edit">Edit</option>
                    </select>
                    </div>
                    
                    <div v-if="toggle" class="form-group">
                    <label for="text1">text1</label>
                    <input type="text" class="form-control" v-model="text">
                    </div>
                    
                    <div class="form-group">
                    <button type="button" @click="onClick">Test click</button>
                    </div>
                    </form>
                    <p>
                    Selected: @{{ selected }}
                    </p>
                    <p>
                    text: @{{ text }}
                    </p>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
