<?php

namespace App\Http\Controllers;

use App\Models\BillDetails;
use App\Models\Item;
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
    public function index($id)
    {
        $sizess = ItemSizes::with('item' , 'size') -> where('item_id' , '=' , $id) -> get();
        $item = Item::find($id);
        $sizes = Size::all();
        return view('cpanel.itemSizes.index' , ['sizess' => $sizess , 'item' => $item , 'itemId' => $id ,  'sizes' => $sizes]) ;

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create($itemId)
    {
        $sizes = Size::all();
        $item = Item::find($itemId);
        return view ('cpanel.itemSizes.create' , ['sizes' => $sizes ,
            'itemId' => $itemId , 'item' => $item]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        if($request -> id == 0){
        $validated = $request->validate([
            'item_id' => 'required',
            'size_id' => 'required',
            'level' => 'required',
            'transformFactor' => 'required',
            'price' => 'required',
            'priceWithAddValue' => 'required'
        ]);

        $size = ItemSizes::where('item_id' , '=' , $request -> item_id)
        -> where('size_id' , '=' , $request -> size_id) -> get();
        if(count($size) == 0) {


            try {
                ItemSizes::create([
                    'item_id' => $request->item_id,
                    'size_id' => $request->size_id,
                    'level' => $request->level,
                    'transformFactor' => $request->transformFactor,
                    'price' => $request->price,
                    'priceWithAddValue' => $request -> priceWithAddValue
                ]);
                return redirect()->route('itemSizes', $request->item_id)->with('success', __('main.created'));

            } catch (QueryException $e) {
                return redirect()->route('itemSizes', $request->item_id)->with('error', $e->getMessage());

            }
        }  else {
            return redirect() -> back()->with('error', __('main.item_size_exsist') );
        }
    } else {
        return  $this -> update($request , $request -> id);
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
            $item = Item::find($itemSize -> item_id);
            return view ('cpanel.itemSizes.edit' , ['sizes' => $sizes , 'itemSize' => $itemSize ,
                'item' => $item]);
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
            'price' => 'required',
            'priceWithAddValue' => 'required'
        ]);

        try{
            $itemSize -> Update([
              'item_id' => $request -> item_id,
              'size_id' => $request -> size_id,
              'level' => $request -> level,
              'transformFactor' => $request -> transformFactor,
              'price' => $request -> price,
                'priceWithAddValue' => $request -> priceWithAddValue
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
        $bills = BillDetails::where('item_size_id' , '=' , $id) -> get();
        if(count($bills) == 0){
            $itemSize = ItemSizes::find($id);
            if($itemSize){
                $itemSize -> delete();
                return redirect()->route('itemSizes' , $itemSize ->  item_id)->with('success' , __('main.deleted'));

            }
        } else {
            return redirect()->route('itemSizes')->with('success' , __('main.can_not_delete'));
        }


    }
    public function getItemSize($id){
        $itemSize = ItemSizes::find($id);
        echo json_encode($itemSize);
        exit();
    }
}
