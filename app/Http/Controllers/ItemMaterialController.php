<?php

namespace App\Http\Controllers;

use App\Models\Item;
use App\Models\ItemMaterial;
use App\Models\ItemSizes;
use App\Models\Size;
use Illuminate\Database\QueryException;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ItemMaterialController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index($id)
    {
        $sizess = ItemMaterial::with('item' , 'size' , 'material') -> where('item_id' , '=' , $id) -> get();
        $item = Item::find($id);
        $materials = Item::where('type' , '=' , 2) -> get();

        return view('cpanel.itemMaterials.index' , ['sizess' => $sizess , 'item' => $item , 'itemId' => $id , 'materials' => $materials]) ;
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create($itemId)
    {
        $item = Item::find($itemId);
        $materials = Item::where('type' , '=' , 2) -> get();
        return view ('cpanel.itemMaterials.create' , [
            'itemId' => $itemId , 'item' => $item , 'materials' => $materials]);
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
                'material_id' => 'required',
                'qnt' => 'required'
            ]);

            $size = ItemMaterial::where('item_id' , '=' , $request -> item_id)
                -> where('size_id' , '=' , $request -> size_id)
                ->where('material_id' , '=' , $request -> material_id)
                -> get();
            if(count($size) == 0) {


                try {
                    ItemMaterial::create([
                        'item_id' => $request->item_id,
                        'size_id' => $request->size_id,
                        'material_id' => $request->material_id,
                        'level' => 1,
                        'qnt' => $request->qnt,
                        'transformFactor' => 1,
                        'price' => 0,
                        'priceWithAddValue' => 0
                    ]);
                    return redirect()->route('itemMaterials', $request->item_id)->with('success', __('main.created'));

                } catch (QueryException $e) {
                    return redirect()->route('itemMaterials', $request->item_id)->with('error', $e->getMessage());

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
     * @param  \App\Models\ItemMaterial  $itemMaterial
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $itemMartial = ItemMaterial::find($id);
        echo json_encode($itemMartial);
        exit();

    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\ItemMaterial  $itemMaterial
     * @return \Illuminate\Http\Response
     */
    public function edit(ItemMaterial $itemMaterial)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\ItemMaterial  $itemMaterial
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $itemMaterial = ItemMaterial::find($id);
        if($itemMaterial){
            $validated = $request->validate([
                'item_id' => 'required',
                'size_id' => 'required',
                'material_id' => 'required',
                'qnt' => 'required'
            ]);

            try{
                $itemMaterial -> Update([
                    'item_id' => $request->item_id,
                    'size_id' => $request->size_id,
                    'material_id' => $request->material_id,
                    'level' => 1,
                    'qnt' => $request->qnt,
                    'transformFactor' => 1,
                    'price' => 0,
                    'priceWithAddValue' => 0
                ]);
                return redirect()->route('itemMaterials' , $request ->  item_id)->with('success' , __('main.updated'));

            } catch(QueryException $e){
                return redirect()->route('itemMaterials' , $request ->  item_id)->with('error' ,  $e->getMessage());

            }
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\ItemMaterial  $itemMaterial
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $material = ItemMaterial::find($id);
        if($material){
            $material -> delete();
            return redirect()->route('itemMaterials' , $material ->  item_id)->with('success' , __('main.deleted'));
        }
    }

    public function getMaterialSizes($material_id){
        $sizes = DB::table('item_sizes') ->
        join('sizes' , 'item_sizes.size_id' , '=' , 'sizes.id')
            -> select('sizes.*')
            -> where('item_sizes.item_id' , '=' ,$material_id ) -> get();
        echo json_encode($sizes);
        exit();

    }
}
