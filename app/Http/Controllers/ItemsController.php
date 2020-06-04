<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Items;

class ItemsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        // $items = Items::all();
        $items = Items::orderBy('id', 'asc')->paginate(5);
        return view('items.index')->with('items', $items);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('items.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this -> validate($request, [
            'name' => 'required',
            'price' => 'required',
            'stocks' => 'required'
        ]);

        // Create New Item
        $item = new Items;
        $item->name = $request->input('name');
        $item->price = $request->input('price');
        $item->stocks = $request->input('stocks');
        $item->save();

        return redirect('/items')->with('success','New Item has been inserted!');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        // $item = Items::find($id);
        // return view('items.show')->with('item', $item); // single item that selected
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $item = Items::find($id);
        return view('items.edit')->with('item', $item); // single item that selected
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $this -> validate($request, [
            'name' => 'required',
            'price' => 'required',
            'stocks' => 'required'
        ]);

        // Update existing item
        $item = Items::find($id);
        $item->name = $request->input('name');
        $item->price = $request->input('price');
        $item->stocks = $request->input('stocks');
        $item->save();

        return redirect('/items')->with('success','Item updated!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $item = Items::find($id);
        $item->delete();

        return redirect('/items')->with('success','Item deleted!');
    }
}
