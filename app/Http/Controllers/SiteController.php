<?php

namespace App\Http\Controllers;

use App\Models\ItemMaterial;
use App\Models\WarehouseProducts;
use Illuminate\Http\Request;

class SiteController extends Controller
{
    //

    public function syncQnt($items=null,$oldItems=null,$isMinus = true){

        $multy = $isMinus ? -1:1;

        if($items){
            foreach ($items as $item){
                $item->quantity = $item->quantity * $multy;

                $productId = $item->product_id;
                $warehouseId = $item->warehouse_id;


                $warehouseProduct = WarehouseProducts::query()
                    ->where('product_id',$productId)
                    ->where('warehouse_id',$warehouseId)
                    ->get()->first();

                if($warehouseProduct){
                    $warehouseProduct->update([
                        'quantity' => $warehouseProduct->quantity + $item->quantity
                    ]);
                }


            }
        }

        if($oldItems){
            foreach ($oldItems as $item){

                $item->quantity = $item->quantity * $multy;

                $productId = $item->product_id;
                $warehouseId = $item->warehouse_id;


                $warehouseProduct = WarehouseProducts::query()
                    ->where('product_id',$productId)
                    ->where('warehouse_id',$warehouseId)
                    ->get()->first();


                $warehouseProduct->update([
                    'quantity' => $warehouseProduct->quantity - $item->quantity
                ]);

            }
        }

    }


    public function POSSyncQnt($item_id , $item_qnt){
        $materials = ItemMaterial::where('item_id' , '=' , $item_id) -> get();
            foreach ($materials as $material){
                $warehouseProduct = WarehouseProducts::query()
                    ->where('product_id', '=' ,$material -> material_id)
                    ->get()->first();

                if($warehouseProduct){
                    $warehouseProduct->update([
                        'quantity' => $warehouseProduct->quantity - ( $material->qnt * $item_qnt)
                    ]);
                }

            }



    }
}
