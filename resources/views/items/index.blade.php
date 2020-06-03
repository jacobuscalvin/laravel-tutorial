@extends('layout.app')

@section('content')
    <h1>Item List</h1>
    {{-- <form>
        <input type="text" name="name" placeholder="Item Name">
        <input type="number" name="price" placeholder="Price">
        <input type="number" name="stocks" placeholder="Stocks">
        <button type="submit" value="Submit">Submit</button>
    </form> --}}

    @if(count($items) > 0)
        <table border='1' width='500'>
            <tr>
                <th>Product ID</th>
                <th>Product Name</th>
                <th>Price</th>
                <th>Current Stock (unit)</th>
            </tr>
            @foreach ($items as $item)
                <tr align='center'>
                    <td>{{$item -> id}}</td>
                    <td align='left'>{{$item -> name}}</td>
                    <td>{{$item -> price}}</td>
                    <td>{{$item -> stocks}}</td>
                </tr>
            @endforeach
        </table>
    @else
       <p>No Items found!</p>
    @endif

@endsection
