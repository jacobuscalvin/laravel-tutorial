@extends('layout.app')

@section('content')
    <div class='d-flex justify-content-between align-items-center'>
        <h1>Item List</h1>
        <a href='/items/create'>{{Form::button('Add New Item',['class'=>'btn btn-primary btn-lg float-right'])}}</a>
    </div>

    <div class='mt-3'>
        @if(count($items) > 0)
            <table id="itemTable" class="table" width="100%">
                <thead class="thead-dark text-center">
                    <tr>
                        <th scope="col">Product ID</th>
                        <th scope="col">Product Name</th>
                        <th scope="col">Price</th>
                        <th scope="col">Current Stock (unit)</th>
                        <th scope="col" style="width:20%">Action</th>
                    </tr>
                </thead>
                @foreach ($items as $item)
                    <tbody>
                        <tr class="text-center">
                            <td scope="row" class="align-middle">{{$item -> id}}</td>
                            <td scope="row" class="align-middle text-left">{{$item -> name}}</td>
                            <td scope="row" class="align-middle">{{$item -> price}}</td>
                            <td scope="row" class="align-middle">{{$item -> stocks}}</td>
                            <td scope="row" class="d-flex flex-row justify-content-center">
                                <a href="/items/{{$item->id}}/edit">
                                    {{Form::button('Edit',['class'=>'btn btn-info text-light'])}}
                                </a>
                                {!!Form::open(['action' => ['ItemsController@destroy', $item->id], 'method' => 'POST'])!!}
                                    {{Form::hidden('_method', 'DELETE')}}
                                    {{Form::submit('Delete', ['class' => 'btn btn-danger ml-2'])}}
                                {!!Form::close()!!}
                            </td>
                        </tr>
                    </tbody>
                @endforeach
            </table>
            {{$items->links()}}
        @else
           <p>No Items found!</p>
        @endif
    </div>
@endsection
