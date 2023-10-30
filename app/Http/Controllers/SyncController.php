<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Item;
use App\Models\CompanyInfo;
use Illuminate\Support\Facades\Http;
use App\Models\Category;
use App\Models\Size;
use App\Models\ItemSizes;
use App\Models\ItemMaterial;
use App\Models\Bill;
use App\Models\BillDetails;
use App\Models\Shift;;
use App\Models\Table;;
use App\Models\Purchase;
use App\Models\Client;
use App\Models\PurchaseDetails;


class SyncController extends Controller
{
    public function sync_items(){
        $html = view('cpanel.sync.items') -> render();
        return  $html  ;
    }

    public function importItems(){
       $lastLocalItem = Item::latest('id')->first() -> id;
       $lastLocalCat = Category::latest('id')->first() -> id;
       $lastLocalSize = Size::latest('id')->first() -> id;
       $lastLocalItemSize = ItemSizes::latest('id')->first() -> id;
       $lastLocalItemMaterial = ItemMaterial::latest('id')->first() -> id;

       $base_url =  CompanyInfo::all() -> first() -> online_url ;

       //cats
       $response = Http::get($base_url.'/api/getCats/'.$lastLocalCat);
       $jsonData = $response->json();
       $cats = $response->json(); // array of items each item is an array
         foreach($cats as $cat){
           $this -> storeLocalCategory($item);
         }

        //sizes
       $response = Http::get($base_url.'/api/getSizes/'.$lastLocalSize);
       $jsonData = $response->json();
       $sizes = $response->json(); // array of items each item is an array
         foreach($sizes as $size){
           $this -> storeLocalCategory($size);
         }

       //items
       $response = Http::get($base_url.'/api/items/'.$lastLocalItem);
       $jsonData = $response->json();
       $items = $response->json(); // array of items each item is an array
         foreach($items as $item){
           $this -> storeLocalItem($item);
         }

         //itemSizes
         $response = Http::get($base_url.'/api/itemSizes/'.$lastLocalItemSize);
         $jsonData = $response->json();
         $itemsSizes = $response->json(); // array of items each item is an array
           foreach($itemsSizes as $itemsSize){
             $this -> storeLocalItemSize($itemsSize);
           }

        //itemMaterials
        $response = Http::get($base_url.'/api/itemMaterials/'.$lastLocalItemMaterial);
        $jsonData = $response->json();
        $itemsMaterials = $response->json(); // array of items each item is an array
            foreach($itemsMaterials as $itemsMaterial){
            $this -> storeLocalItemMaterial($itemsMaterial);
            }




       echo  json_encode("Your Offline Items Have been Updated From Your Online Server  :)");
       exit();

    }
    public function storeLocalItem($item){

        $imageName = 'default_item.png';

        $item_id =   Item::create([
            'code' => $item['code'],
            'name_ar' => $item['name_ar'],
            'name_en' => $item['name_en'],
            'type' => $item['type'],
            'category_id' => $item['category_id'],
            'description_ar' => $item['description_ar'],
            'description_en' => $item['description_en'],
            'img' => $imageName,
            'isAddValue' => $item['isAddValue'],
            'addValue' => $item['addValue'],
            'canPurshased' => $item['canPurshased']

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
    public function storeLocalCategory($cat){
        $imageName = 'default_cat.png';
        Category::create([
            'name_ar' => $cat['name_ar'],
            'name_en' => $cat['name_en'],
            'printer' => $cat['printer'],
            'img' => $imageName,

        ]);

    }
    public function storeLocalSize($size){
        Size::Create([
            'name_ar' => $size['name_ar'],
            'name_en' => $size['name_en'],
            'label' => $size['label'],
        ]);

    }
    public function storeLocalItemSize($ItemSize){
        ItemSizes::create([
            'item_id' => $ItemSize['item_id'],
            'size_id' => $ItemSize['size_id'],
            'level' => $ItemSize['level'],
            'transformFactor' => $ItemSize['transformFactor'],
            'price' => $ItemSize['price'],
            'priceWithAddValue' => $ItemSize['priceWithAddValue']
        ]);

    }

    public function storeLocalItemMaterial($ItemMaterial){
        ItemMaterial::create([
            'item_id' => $ItemMaterial['item_id'],
            'size_id' => $ItemMaterial['size_id'],
            'material_id' => $ItemMaterial['material_id'],
            'level' => 1,
            'qnt' => $ItemMaterial['qnt'],
            'transformFactor' => 1,
            'price' => 0,
            'priceWithAddValue' => 0
        ]);

    }


    public function exportItems() {
        $base_url =  CompanyInfo::all() -> first() -> online_url ;
        $response = Http::get($base_url.'/api/getLastItemIDS');
        $jsonData = $response->json();
        $ids = $response->json(); // array of items each item is an array
        $lastOnlineItem = $ids[0];
        $lastOnlineCat = $ids[1];
        $lastOnlineSize = $ids[2];
        $lastOnlineItemSize = $ids[3];
        $lastOnlineItemMaterial = $ids[4];

        $cats = Category::where('id' , '>' , $lastOnlineCat) -> get();
        $sizes = Size::where('id' , '>' , $lastOnlineSize) -> get();
        $items = Item::where('id' , '>' , $lastOnlineItem) -> get();
        $item_sizes = ItemSizes::where('id' , '>' , $lastOnlineItemSize) -> get();
        $materials = ItemMaterial::where('id' , '>' , $lastOnlineItemMaterial) -> get();



       return $this -> storeOnlineCategory($cats , $sizes , $items , $item_sizes  ,  $materials);


    }
    public function storeOnlineCategory($cats , $sizes , $items , $item_sizes  ,  $materials){
        $base_url =  CompanyInfo::all() -> first() -> online_url ;
        $url = $base_url.'/api/storeCatsFromLocal';
        $fields = [
            'cats'  => $cats,
            'sizes' =>  $sizes,
            'items' => $items ,
            'item_sizes' => $item_sizes  ,
            'item_materials' => $materials

        ];
       // $fields_string = http_build_query($fields);
        $ch = curl_init();

        curl_setopt($ch,CURLOPT_URL, $url);
        curl_setopt($ch,CURLOPT_POST, true);
        curl_setopt($ch,CURLOPT_POSTFIELDS, $fields);
        curl_setopt($ch,CURLOPT_RETURNTRANSFER, true);

        $result = curl_exec($ch);
        return  $result;

    }

    public function sync_sales(){

        $html = view('cpanel.sync.sales') -> render();
        return  $html  ;
    }
    public function importSales(){
        $lastLocalBillId= Bill::latest('id')->first() -> id;
        $lastLocalShiftId= Shift::latest('id')->first() -> id;
        $lastLocalTableId= Table::latest('id')->first() -> id;

        $base_url =  CompanyInfo::all() -> first() -> online_url ;

        $response = Http::get($base_url.'/api/getSales/'.$lastLocalBillId .'/'. $lastLocalShiftId .'/'.$lastLocalTableId);
        $jsonData = $response->json();


        foreach($jsonData['shifts'] as $shift){
            $this -> storeLocalShift($shift);
          }
          foreach($jsonData['tables'] as $table){
            $this -> storeLocalTable($table);
          }
          foreach($jsonData['bills'] as $bill){
            $this -> storeLocalBill($bill);
          }
          foreach($jsonData['details'] as $detail){
            $this -> storeLocalBillDetails($detail);
          }

          echo  json_encode("Your Offline Sales Bills Have been Updated From Your Online Server  :)");
          exit();
    }

    public function storeLocalShift($shift){
        Shift::create([
            'id' => $shift['id'],
            'user_id' => $shift['user_id'],
            'start_at' => $shift['start_at'],
            'state' => $shift['state'] ,
            'end_at' => $shift['end_at'] ,
            'end_money' => $shift['end_money'] ,
            'start_money' => $shift['start_money'],
        ]);

    }
    public function storeLocalTable($table){
        Table::create([
            'id' => $table['id'],
            'hall_id' => $table['hall_id'],
            'name_ar' => $table['name_ar'],
            'name_en' => $table['name_en'] ,
            'available' => $table['available'] ,
        ]);

    }
    public function storeLocalBill($bill){
        Bill::create([
            'identifier' => $bill['identifier'],
            'billType' => $bill['billType'],
            'client_id' => $bill['client_id'],
            'phone' => $bill['phone'],
            'address' => $bill['address'],
            'driver_id' => $bill['driver_id'],
            'table_id' => $bill['table_id'] ,
            'hall_id' => $bill['hall_id'],
            'delivery_service' => $bill['delivery_service'],
            'bill_date' => $bill['bill_date'],
            'bill_number' => $bill['bill_number'],
            'total' => $bill['total'],
            'vat' => $bill['vat'],
            'serviceVal' => $bill['billType'],
            'discount' => $bill['discount'],
            'net' => $bill['net'],
            'user_id' =>  $bill['user_id'] ,
            'payed' => $bill['payed'],
            'state' => $bill['state'],
            'client_name' => $bill['client_name'] ,
            'driver_name' => $bill['driver_name'] ,
            'notes' => $bill['notes'] ,
            'cash' => $bill['cash'],
            'credit' => $bill['credit'],
            'bank' => $bill['bank'],
            'shift_number' => $bill['shift_number'],
            'machine_id' => $bill['machine_id']

        ]);

    }

    public function storeLocalBillDetails($detail){
        BillDetails::create([
            'identifier' => $detail['identifier'],
            'bill_id' => $detail['bill_id'] ,
            'item_id' => $detail['item_id'],
            'size_id' => $detail['size_id'],
            'item_size_id' => $detail['item_size_id'],
            'category_id' => $detail['category_id'],
            'qnt' => $detail['qnt'],
            'price' => $detail['price'],
            'priceWithVat' => $detail['priceWithVat'],
            'total' => $detail['total'],
            'totalWithVat' => $detail['totalWithVat'],
            'isExtra' => $detail['isExtra'],
            'extra_item_id' => $detail['extra_item_id'],
            'notes' => $detail['notes'],
            'txt_holder' => $detail['txt_holder'],
             'payed' => $detail['payed'],


        ]);

    }
    public function exportSales(){
        $base_url =  CompanyInfo::all() -> first() -> online_url ;
        $response = Http::get($base_url.'/api/getLastSalesIDS');
        $jsonData = $response->json();
        $shift_id = $jsonData['shift'];
        $table_id = $jsonData['table'];
        $bill_id = $jsonData['bill'];
        $detail_id = $jsonData['detail'];

        $shifts = Shift::where('id' , '>' , $shift_id) -> get();
        $tables = Table::where('id' , '>' , $table_id) -> get();
        $bills = Bill::where('id' , '>' , $bill_id) -> get();
        $details = BillDetails::where('id' , '>' , $detail_id) -> get();

        return $this -> storeOnlineSales($shifts , $tables , $bills , $details );

    }


    public function storeOnlineSales($shifts , $tables , $bills , $details ){
        $base_url =  CompanyInfo::all() -> first() -> online_url ;
        $url = $base_url.'/api/storeSalesFromLocal';
        $fields = [
            'shifts'  => $shifts,
            'tables' =>  $tables,
            'bills' => $bills ,
            'details' => $details

        ];
        $ch = curl_init();

        curl_setopt($ch,CURLOPT_URL, $url);
        curl_setopt($ch,CURLOPT_POST, true);
        curl_setopt($ch,CURLOPT_POSTFIELDS, $fields);
        curl_setopt($ch,CURLOPT_RETURNTRANSFER, true);

        $result = curl_exec($ch);
        return  $result;

    }


    public function sync_purchase(){
        $html = view('cpanel.sync.purchses') -> render();
        return  $html  ;
    }
    public function importPurchase(){
        $lastLocalBillId= Purchase::latest('id')->first() ?-> id ?? 0;
        $lastLocalShiftId= Shift::latest('id')->first() ?-> id ?? 0;
        $lastLocalClientId= Client::latest('id')->first() ?-> id ?? 0;

        $base_url =  CompanyInfo::all() -> first() -> online_url ;

        $response = Http::get($base_url.'/api/getPurchase/'.$lastLocalBillId .'/'. $lastLocalShiftId .'/'.$lastLocalClientId);
        $jsonData = $response->json();


        foreach($jsonData['shifts'] as $shift){
            $this -> storeLocalShift($shift);
          }
          foreach($jsonData['clients'] as $client){
            $this -> storeLocalClient($client);
          }
          foreach($jsonData['bills'] as $bill){
            $this -> storeLocalPurchase($bill);
          }
          foreach($jsonData['details'] as $detail){
            $this -> storeLocalPurchaseDetails($detail);
          }
          echo  json_encode("Your Offline Purchase Bills Have been Updated From Your Online Server  :)");
          exit();
    }
    public function storeLocalClient($client){
        Client::create([
            'id' => $client['id'],
            'name_ar' => $client['name_ar'],
            'name_en' => $client['name_en'],
            'discount_type' => $client['discount_type'],
            'discount_value' => $client['discount_value'],
            'phone' => $client['phone'],
            'mobile' => $client['mobile'],
            'fax_number' => $client['fax_number'],
            'postal_code' => $client['postal_code'],
            'email' => $client['email'],
            'city_id' => $client['city_id'],
            'tax_number' => $client['tax_number'] ,
            'registration_number' => $client['registration_number'],
            'region' => $client['region'],
            'street' => $client['street'],
            'address' => $client['address'] ,
            'oppening_balance' => $client['oppening_balance'],
            'limit_money' => $client['limit_money'] ,
            'limit_days' => $client['limit_days'],
            'type' => $client['type']
        ]);
    }
    public function storeLocalPurchase($bill){
        Purchase::create([
            'id' => $bill['id'],
            'date' => $bill['date'],
            'invoice_no' => $bill['invoice_no'],
            'customer_id' => $bill['customer_id'],
            'biller_id' => $bill['biller_id'],
            'warehouse_id' => $bill['warehouse_id'],
            'note' => $bill['note'],
            'total' => $bill['total'],
            'discount' => $bill['discount'],
            'tax' => $bill['tax'],
            'net' => $bill['net'],
            'paid' => $bill['paid'],
            'purchase_status' => $bill['purchase_status'],
            'payment_status' =>$bill['payment_status'],
            'created_by' => $bill['created_by'],
            'shift_number' => $bill['shift_number'],
        ]);
    }
    public function storeLocalPurchaseDetails($detail){
        PurchaseDetails::create([
            'purchase_id' => $detail['purchase_id'],
            'product_code' => $detail['product_code'],
            'product_id' => $detail['product_id'],
            'quantity' => $detail['quantity'],
            'cost_without_tax' => $detail['cost_without_tax'],
            'cost_with_tax' => $detail['cost_with_tax'],
            'warehouse_id' => $detail['warehouse_id'],
            'unit_id' => $detail['unit_id'],
            'tax' => $detail['tax'],
            'total' => $detail['total'],
            'net' => $detail['net']
        ]);
    }

    public function exportPurchase(){
        $base_url =  CompanyInfo::all() -> first() -> online_url ;
        $response = Http::get($base_url.'/api/getLastPurchaseIDS');
        $jsonData = $response->json();
        $shift_id = $jsonData['shift'];
        $client_id = $jsonData['table'];
        $bill_id = $jsonData['bill'];
        $detail_id = $jsonData['detail'];

        $shifts = Shift::where('id' , '>' , $shift_id) -> get();
        $tables = Client::where('id' , '>' , $client_id) -> get();
        $bills = Purchase::where('id' , '>' , $bill_id) -> get();
        $details = PurchaseDetails::where('id' , '>' , $detail_id) -> get();

        return $this -> storeOnlineSales($shifts , $tables , $bills , $details );
    }
    public function sync_docs(){
        $html = view('cpanel.sync.expenses') -> render();
        return  $html  ;
    }
    public function importDocs(){

    }
    public function exportDocs(){

    }




}
