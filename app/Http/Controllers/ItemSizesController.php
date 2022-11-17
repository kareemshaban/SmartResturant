<?php

namespace App\Http\Controllers;

use App\Models\ItemSizes;
use App\Models\Size;
use Illuminate\Database\QueryException;
use Illuminate\Http\Request;

class ItemSizesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index($item)
    {
        $sizes = ItemSizes::with('item' , 'size') -> where('item_id' , '=' , $item) -> get();
           
        return view('cpanel.itemSizes.index' , ['sizes' => $sizes , 'item' => $item]) ; 
        
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create($itemId)
    {
        $sizes = Size::all();
        return view ('cpanel.itemSizes.create' , ['sizes' => $sizes , 'itemId' => $itemId]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'item_id' => 'required',
            'size_id' => 'required',
            'level' => 'required',
            'transformFactor' => 'required',
            'price' => 'required'
        ]);

        try{
            ItemSizes::create([
              'item_id' => $request -> item_id,
              'size_id' => $request -> size_id,
              'level' => $request -> level,
              'transformFactor' => $request -> transformFactor,
              'price' => $request -> price,
            ]);
            return redirect()->route('itemSizes' , $request ->  item_id)->with('success' , __('main.created'));

        } catch(QueryException $e){
            return redirect()->route('itemSizes' , $request ->  item_id)->with('error' ,  $e->getMessage());

        }
    
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\ItemSizes  $itemSizes
     * @return \Illuminate\Http\Response
     */
    public function show(ItemSizes $itemSizes)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\ItemSizes  $itemSizes
     * @return \Illuminate\Http\Response
     */
    public function edit( $id)
    {
        $itemSize = ItemSizes::find($id);
        $sizes = Size::all();
        if($itemSize){
            return view ('cpanel.itemSizes.edit' , ['sizes' => $sizes , 'itemSize' => $itemSize]);
        }
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\ItemSizes  $itemSizes
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $itemSize = ItemSizes::find($id);
        if($itemSize){
        $validated = $request->validate([
            'item_id' => 'required',
            'size_id' => 'required',
            'level' => 'required',
            'transformFactor' => 'required',
            'price' => 'required'
        ]);

        try{
            $itemSize -> Update([
              'item_id' => $request -> item_id,
              'size_id' => $request -> size_id,
              'level' => $request -> level,
              'transformFactor' => $request -> transformFactor,
              'price' => $request -> price,
            ]);
            return redirect()->route('itemSizes' , $request ->  item_id)->with('success' , __('main.updated'));

        } catch(QueryException $e){
            return redirect()->route('itemSizes' , $request ->  item_id)->with('error' ,  $e->getMessage());

        }
    }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\ItemSizes  $itemSizes
     * @return \Illuminate\Http\Response
     */
    public function destroy( $id)
    {
        $itemSize = ItemSizes::find($id);
        if($itemSize){
            $itemSize -> delete();
            return redirect()->route('itemSizes' , $itemSize ->  item_id)->with('success' , __('main.deleted'));

        }
    }
}
