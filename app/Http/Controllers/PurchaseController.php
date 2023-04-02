<?php

namespace App\Http\Controllers;

use App\Models\Client;
use App\Models\Purchase;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class PurchaseController extends Controller
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
}
