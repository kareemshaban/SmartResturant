<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Item;
use App\Models\ItemSizes;
use App\Models\ItemMaterial;
use App\Models\Category;
use App\Models\Size;
use App\Models\Bill;
use App\Models\BillDetails;;
use App\Models\Shift;;
use App\Models\Table;;
use App\Models\PurchaseDetails;
use App\Models\Purchase;
use App\Models\Client;
use App\Models\BillDetailsItems;


use Illuminate\Database\QueryException;

class ItemController extends SiteController
{

    public function getCats($id){
        $cats = Category::where('id' , '>' , $id) -> get();
        return $cats ;
      }

      public function getSizes($id){
        $sizes = Size::where('id' , '>' , $id) -> get();
        return $sizes ;
      }

    public function getItems($id){
      $items = Item::where('id' , '>' , $id) -> get();
      return $items ;
    }

    public function itemSizes($id){
        $sizes = ItemSizes::where('id' , '>' , $id) -> get();
        return $sizes ;
      }

      public function itemMaterials($id){
        $materials = ItemMaterial::where('id' , '>' , $id) -> get();
        return $materials ;
      }
       public function getLastItemIDS(){
        $lastOnlineItem = Item::latest('id')->first() -> id;
        $lastOnlineCat = Category::latest('id')->first() -> id;
        $lastOnlineSize = Size::latest('id')->first() -> id;
        $lastOnlineItemSize = ItemSizes::latest('id')->first() -> id;
        $lastOnlineItemMaterial = ItemMaterial::latest('id')->first() -> id;

           return [
            [ $lastOnlineItem ] ,
            [$lastOnlineCat],
            [$lastOnlineSize],
            [$lastOnlineItemSize],
            [$lastOnlineItemMaterial]
        ];
      }



       public function storeCatsFromLocal(Request $request){
            $cats = [];
            $sizes = [] ;
             $items = [] ;
              $item_sizes = [] ;
               $item_materials = [] ;
            $cats = json_decode($request->cats);
              $sizes = json_decode($request->sizes);
                $items = json_decode($request->items);
                  $item_sizes = json_decode($request->item_sizes);
                    $item_materials = json_decode($request->item_materials);
           // return $cats ;
            $imageName = 'default_cat.png';
            foreach($cats as $cat){

                      Category::create([
                            'id' => $cat->id,
                            'name_ar' => $cat->name_ar,
                            'name_en' => $cat->name_en,
                            'printer' => 0,
                            'img' => $imageName,

                        ]);
                }
                foreach($sizes as $size){
                         Size::Create([
                                'name_ar' => $size -> name_ar,
                                'name_en' => $size -> name_en,
                                'label' => $size -> label,
                            ]);
                }
                     foreach($items as $item){

                        $item_id =   Item::create([
                            'code' => $item -> code ,
                            'name_ar' => $item -> name_ar,
                            'name_en' => $item -> name_en,
                            'type' => $item -> type ,
                            'category_id' => $item -> category_id,
                            'description_ar' => $item -> description_ar,
                            'description_en' => $item -> description_en,
                            'img' => 'default_item.png',
                            'isAddValue' => $item -> isAddValue ,
                            'addValue' => $item -> addValue,
                            'canPurshased' => $item -> canPurshased

                        ]) -> id;
                            if($item['canPurshased'] == 1){
                                //create warehouse product item
                                WarehouseProducts::create([
                                    'warehouse_id' => 1,
                                    'product_id' => $item_id,
                                    'cost' => 0,
                                    'quantity' => 0
                                ]);
                            }
                }

                    foreach($item_sizes as $item_size){
                                 ItemSizes::create([
                                            'item_id' => $item_size -> item_id,
                                            'size_id' => $item_size -> size_id,
                                            'level' => $item_size -> level,
                                            'transformFactor' => $item_size -> transformFactor,
                                            'price' => $item_size -> price,
                                            'priceWithAddValue' => $item_size -> priceWithAddValue
                                        ]);
                                                }


                     foreach($item_materials as $item_material){
                                  ItemMaterial::create([
                                        'item_id' => $item_material -> item_id,
                                        'size_id' => $item_material -> size_id,
                                        'material_id' => $item_material -> material_id,
                                        'level' => 1,
                                        'qnt' => $item_material -> qnt,
                                        'transformFactor' => 1,
                                        'price' => 0,
                                        'priceWithAddValue' => 0
                                    ]);

                          }
                return 'success';




      }


      public function getSales($id , $shift_id , $table_id){
        $bills = Bill::where('id' , '>' , $id) -> get();
        $details = BillDetails::where('bill_id' , '>' , $id) -> get();
        $shifts = Shift::where('id' , '>' , $shift_id) -> get();
        $tables = Table::where('id' , '>' , $table_id) -> get();
        return ['bills' => $bills , 'details' => $details , 'shifts' => $shifts , 'tables' => $tables] ;
      }
      public function getPurchases($id){
        $cats = Category::where('id' , '>' , $id) -> get();
        return $cats ;
      }
      public function getDocs($id){
        $cats = Category::where('id' , '>' , $id) -> get();
        return $cats ;
      }


     public function getLastSalesIDS(){
        $lastOnlineShift = Shift::latest('id')->first() -> id;
        $lastOnlineTable = Table::latest('id')->first() -> id;
        $lastOnlineBill = Bill::latest('id')->first() -> id;
        $lastOnlineBillDetails= BillDetails::latest('id')->first() -> id;

        return ['shift' => $lastOnlineShift , 'table' => $lastOnlineTable , 'bill' => $lastOnlineBill, 'detail' => $lastOnlineBillDetails ];
     }


     public function storeCatsFromLocal(Request $request){

        $shifts = [];
        $tables = [] ;
         $bills = [] ;
          $details = [] ;

        $shifts = json_decode($request->shifts);
          $tables = json_decode($request->tables);
            $bills = json_decode($request->bills);
              $details = json_decode($request->details);

        foreach($shifts as $shift){

            Shift::create([
                'id' => $shift -> id,
                'user_id' => $shift  -> user_id,
                'start_at' => $shift -> start_at,
                'state' => $shift -> state ,
                'end_at' => $shift -> end_at ,
                'end_money' => $shift -> end_money ,
                'start_money' => $shift -> start_money,
            ]);
            }
            foreach($tables as $table){
                Table::create([
                    'id' => $table -> id,
                    'hall_id' => $table -> hall_id,
                    'name_ar' => $table -> name_ar,
                    'name_en' => $table -> name_en ,
                    'available' => $table -> available ,
                ]);
            }
                 foreach($bills as $bill){
                    Bill::create([
                        'identifier' => $bill -> identifier,
                        'billType' => $bill -> billType,
                        'client_id' => $bill -> client_id,
                        'phone' => $bill -> phone,
                        'address' => $bill -> address,
                        'driver_id' => $bill -> driver_id,
                        'table_id' => $bill -> table_id ,
                        'hall_id' => $bill -> hall_id,
                        'delivery_service' => $bill -> delivery_service,
                        'bill_date' => $bill -> bill_date,
                        'bill_number' => $bill -> bill_number,
                        'total' => $bill -> total,
                        'vat' => $bill -> vat,
                        'serviceVal' => $bill -> billType,
                        'discount' => $bill -> discount,
                        'net' => $bill -> net,
                        'user_id' =>  $bill -> user_id ,
                        'payed' => $bill -> payed,
                        'state' => $bill -> state,
                        'client_name' => $bill -> client_name ,
                        'driver_name' => $bill -> driver_name ,
                        'notes' => $bill -> notes ,
                        'cash' => $bill -> cash,
                        'credit' => $bill -> credit,
                        'bank' => $bill -> bank,
                        'shift_number' => $bill -> shift_number,
                        'machine_id' => $bill -> machine_id

                    ]);

            }

                foreach($details as $detail){
                    BillDetails::create([
                        'id' => $detail -> id,
                        'identifier' => $detail -> identifier,
                        'bill_id' => $detail -> bill_id,
                        'item_id' => $detail -> item_id,
                        'size_id' => $detail -> size_id,
                        'item_size_id' => $detail -> item_size_id,
                        'category_id' => $detail -> category_id,
                        'qnt' => $detail -> qnt,
                        'price' => $detail -> price,
                        'priceWithVat' => $detail -> priceWithVat,
                        'total' => $detail -> total,
                        'totalWithVat' => $detail -> totalWithVat,
                        'isExtra' => $detail -> isExtra,
                        'extra_item_id' => $detail -> extra_item_id,
                        'notes' => $detail -> notes,
                        'txt_holder' => $detail -> txt_holder,
                         'payed' => $detail -> payed,


                    ]);

                    $siteController = new SiteController();

                    $siteController ->  POSSyncQnt($detail -> item_id ,$detail -> qnt , -1);

                    BillDetailsItems::create([
                            'bill_details_id' => $detail -> id ,
                            'item_sizes_id' =>  $detail -> item_size_id
                    ]);
           }



            return 'success';




  }

  public function getPurchase($id , $shift_id , $client_id){
    $bills = Purchase::where('id' , '>' , $id) -> get();
    $details = PurchaseDetails::where('purchase_id' , '>' , $id) -> get();
    $shifts = Shift::where('id' , '>' , $shift_id) -> get();
    $clients = Client::where('id' , '>' , $client_id) -> get();
    return ['bills' => $bills , 'details' => $details , 'shifts' => $shifts , 'clients' => $clients] ;
  }

  public function getLastPurchaseIDS(){
    $lastOnlineShift = Shift::latest('id')->first() -> id;
    $lastOnlineTable = Client::latest('id')->first() -> id;
    $lastOnlineBill = Bill::latest('id')->first() -> id;
    $lastOnlineBillDetails= BillDetails::latest('id')->first() -> id;

    return ['shift' => $lastOnlineShift , 'table' => $lastOnlineTable , 'bill' => $lastOnlineBill, 'detail' => $lastOnlineBillDetails ];
 }

}
