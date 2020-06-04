@extends('layout.app')

@section('content')
    <h1>Edit Item with id:{{$item->id}}</h1>

    @if($item != null)
        <form>
            <label for="name">Product Name</label>
            <input type="text" name="name" value={{$item->name}}>
                
            <label for="price">Price</label>
            <input type="number" name="price" value={{$item->price}}>
            
            <label for="stocks">Stocks</label>
            <input type="number" name="stocks" value={{$item->stocks}}>

            <button type="submit" value="Update">Update</button>
        </form>
    @else
       <p>Invalid Items!</p>
    @endif

@endsection
