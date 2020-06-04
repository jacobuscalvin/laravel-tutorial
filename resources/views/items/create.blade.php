@extends('layout.app')

@section('content')

    <h1>Create New Item</h1>
    
    {!! Form::open(['action' => 'ItemsController@store', 'method' => 'POST']) !!}
        <div class="form p-xl-2">
            <div class="form-group">
                {{Form::label('name', 'Product Name')}}
                {{Form::text('name', '', ['class' => 'form-control', 'placeholder' => 'Masker Wajah'])}}
            </div>
            <div class="form-group">
                {{Form::label('price', 'Price')}}
                {{Form::number('price', '', ['class' => 'form-control', 'placeholder' => '50000'])}}
            </div>
            <div class="form-group">
                {{Form::label('stocks', 'Stocks (unit)')}}
                {{Form::number('stocks', '', ['class' => 'form-control', 'placeholder' => '200'])}}
            </div>

            {{Form::submit('Submit',['class'=>'btn btn-primary float-right ml-2'])}}
            {{Form::reset('Reset',['class'=>'btn btn-danger float-right ml-2'])}}
            <a href='/items'>{{Form::button('Back',['class'=>'btn btn-dark float-right'])}}</a>
        </div>
    {!! Form::close() !!}    

@endsection
