@extends('layout.app')

@section('content')

    <h1>Edit Item: {{$item->name}}</h1>
    
    {!! Form::open(['action' => ['ItemsController@update', $item->id], 'method' => 'POST']) !!}
        <div class="form p-xl-2">
            <div class="form-group">
                {{Form::label('name', 'Product Name')}}
                {{Form::text('name', $item->name, ['class' => 'form-control', 'placeholder' => 'Masker Wajah'])}}
            </div>
            <div class="form-group">
                {{Form::label('price', 'Price')}}
                {{Form::number('price', $item->price, ['class' => 'form-control', 'placeholder' => '50000'])}}
            </div>
            <div class="form-group">
                {{Form::label('stocks', 'Stocks (pcs)')}}
                {{Form::number('stocks', $item->stocks, ['class' => 'form-control', 'placeholder' => '200'])}}
            </div>
            
            {{-- Allow method PUT --}}
            {{Form::hidden('_method','PUT')}}

            {{Form::submit('Update',['class'=>'btn btn-primary float-right ml-2'])}}
            {{Form::reset('Undo',['class'=>'btn btn-danger float-right ml-2'])}}
            <a href='/items'>{{Form::button('Back',['class'=>'btn btn-dark float-right'])}}</a>
        </div>
    {!! Form::close() !!}    

@endsection
