<?php

namespace App\Http\Controllers;

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
}
