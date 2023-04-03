<?php

namespace App\Http\Controllers;

use App\Models\Client;
use App\Models\Item;
use App\Models\Purchase;
use App\Models\PurchaseDetails;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class PurchaseController extends SiteController
{

    public function index(){
        $data = DB::table('purchases')
            ->join('clients','purchases.customer_id','=','clients.id')
            ->select('purchases.*','clients.name_ar as customer_name_ar' , 'clients.name_en as customer_name_en')
            ->get();

        return view('cpanel.purchases.index',compact('data'));
    }
    public function create()
    {

        $customers = Client::where('type' , '=' , 1) -> get();
        return view('cpanel.purchases.create',compact('customers' ));
    }

    public function getNo(){
        $bills = Purchase::where('warehouse_id' , '=' , 0) -> orderBy('id', 'ASC')->get();
        if(count($bills) > 0){
            $id = $bills[count($bills) -1] -> id ;
        } else
            $id = 0 ;


        $no = json_encode( str_pad($id + 1, 6 , '0' , STR_PAD_LEFT)) ;
        echo $no ;
        exit;
    }

    public function store(Request $request){

        $total = 0;
        $tax = 0;
        $net = 0;

        $products = array();
        $qntProducts = array();
        foreach ($request->product_id as $index=>$id){
            $productDetails = Item::find($id);
            $product = [
                'purchase_id' => 0,
                'product_code' => $productDetails->code,
                'product_id' => $id,
                'quantity' => $request->qnt[$index],
                'cost_without_tax' => $request->price[$index],
                'cost_with_tax' => $request->price[$index] + ($request->tax[$index] / $request->qnt[$index]) ,
                'warehouse_id' => 1,
                'unit_id' => $request->unit_id[$index],
                'tax' => $request->tax[$index],
                'total' => $request->price[$index] * $request->qnt[$index],
                'net' => $request->net[$index]
            ];

            $item = new Item();
            $item -> product_id = $id;
            $item -> quantity = $request->qnt[$index] ;
            $item -> warehouse_id = 1 ;
            $qntProducts[] = $item ;

            $products[] = $product;
            $total +=$request->price[$index] * $request->qnt[$index];
            $tax +=$request->tax[$index];
            $net +=$request->net[$index];

        }

        //  return $products ;
        $purchase = Purchase::create([
            'date' => $request->bill_date,
            'invoice_no' => $request-> bill_number,
            'customer_id' => $request->customer_id,
            'biller_id' => Auth::id(),
            'warehouse_id' => 1,
            'note' => $request->notes ?? '' ,
            'total' => $total,
            'discount' => 0,
            'tax' => $tax,
            'net' => $net,
            'paid' => $request -> paid,
            'purchase_status' => 'completed',
            'payment_status' =>$request -> remain > 0 ? 'not_paid' : 'paid',
            'created_by' => Auth::id()
        ]);

        foreach ($products as $product){
            $product['purchase_id'] = $purchase->id;
            PurchaseDetails::create($product);
        }

        $siteController = new SiteController();
        $siteController ->  syncQnt($qntProducts,null , false);
        $clientController = new ClientMoneyController();
        $clientController->syncMoney($request->customer_id,0,$net);

        $vendorMovementController = new VendorMovementController();
        $vendorMovementController->addPurchaseMovement($purchase->id);


        return redirect()->route('purchases');
    }
}
