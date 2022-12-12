<?php

namespace App\Http\Controllers;

use App\Models\Bill;
use App\Models\BillDetails;
use App\Models\BillDetailsItems;
use App\Models\Category;
use App\Models\Client;
use App\Models\Employee;
use App\Models\Hall;
use App\Models\Item;
use App\Models\Settings;
use App\Models\Shift;
use App\Models\Table;
use Carbon\Carbon;
use Illuminate\Database\QueryException;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class PosController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $shift = Shift::where('user_id' , '=' , Auth::user() -> id)
            -> where('state' , '=' , 0 )->get();
        if(count($shift) > 0){
            $categories = Category::with('items.sizes') -> get();
                $items = Item::with('sizes.size' ,'cayegory' ) -> get();
            $clients = Client::all();
            $employees = Employee::all();
            $halls = Hall::all();
            $tables = Table::with('hall') -> get();
            $setting = null ;


            return view('cpanel.pos.pos' , ['categories' => $categories ,
                'items' => $items , 'clients' => $clients , 'employees' => $employees ,
                'halls' => $halls , 'tables' => $tables ]);
        } else {
            return redirect() -> route('home');
        }

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    //prepare
    public function store(Request $request)
    {
       $uuid =  $this -> unique_code(20);
       $validated = $request->validate([
           'billType' => 'required',
           'bill_date' => 'required',
           'bill_number' => 'required|unique:bills',
           'total' => 'required',
           'vat' => 'required',
           'serviceVal' => 'required',
           'net' => 'required',
       ]);
       try {
           $id = Bill::create([
               'identifier' => $uuid,
               'billType' => $request -> billType ,
               'client_id' => $request -> client_id ? $request -> client_id : 0 ,
               'phone' => $request ->phone ?$request ->phone : '',
               'address' => $request -> address ? $request -> address : '',
               'driver_id' => $request -> driver_id ? $request -> driver_id : 0 ,
               'table_id' => $request -> table_id ? $request -> table_id : 0 ,
               'delivery_service' => $request -> billType == 1 ?  ($request -> delivery_service ? $request -> delivery_service : 0) : 0  ,
               'bill_date' => Carbon::parse($request -> bill_date  ) ,
               'bill_number' => $request -> bill_number,
               'total' => $request -> total ,
               'vat' => $request -> vat ,
               'serviceVal' => $request -> serviceVal,
               'discount' => $request-> discount,
               'net' => $request-> net,
               'user_id' => Auth::user() -> id ,
               'payed' =>  false ,
               'state' => 0 ,
               'client_name' => $request -> client_name ? $request -> client_name : '',
               'driver_name' => $request -> driver_name ? $request -> driver_name : '',
               'notes' => $request -> notes ? $request -> notes : '',
               'cash' => $request -> cash ,
               'credit' => $request -> credit ,
               'bank' => $request -> bank ,

           ]) -> id;
           $this -> bookTable($request -> table_id);
           $this -> storeDetails($uuid , $id , $request);
           $val = null;
           switch ($request->input('action')){
               case 'pay_prepare':
                   $val = 2 ;
                   break;
               case 'prepare':
                   $val = 1 ;
                   break;
           }
           if($val = 1 )
              return redirect()->route('pos')->with('success' , __('main.bill_created'));
           else
               return redirect()->route('pos');


       }catch(QueryException $ex){

           return redirect()->route('pos')->with('error' ,  $ex->getMessage());
       }
    }
    public function storeDetails($identifier , $id , $request){


        for($i = 0 ; $i < count($request -> item_id) ; $i++ ){
         $details_id =   BillDetails::create([
               'identifier' => $identifier,
                'bill_id' => $id ,
                'item_id' => $request -> item_id[$i],
                'size_id' => $request -> size_id[$i],
                'item_size_id' => $request -> item_size_id[$i],
                'qnt' => $request -> qnt[$i],
                'price' => $request -> price[$i],
                'priceWithVat' => $request -> priceWithVat[$i],
                'total' => $request -> totalTable[$i],
                'totalWithVat' => $request -> totalWithVat[$i],
                'isExtra' => $request -> isExtra[$i],
                'extra_item_id' => $request -> extra_item_id[$i],
                'notes' => "",
                'txt_holder' => "",
            ]) -> id;

            BillDetailsItems::create([
                    'bill_id' => $details_id ,
                    'item_sizes_id' =>  $request -> item_size_id[$i]
            ]);
        }


    }
    public function bookTable($table_id){
       $table = Table::find($table_id);
       if($table){
        $table -> available = 0 ;
        $table -> update();
       }



    }
    public function releaseTable($table_id){
        $table = Table::find($table_id);
        if($table){
         $table -> available = 1 ;
            $table -> update();
        }

    }

    public function payBill(Request  $request){

        $validated = $request->validate([
            'modalBillId' => 'required',
            'modalTableId' => 'required',
            'modalBillDiscount' => 'required',
            'modalBillNet' => 'required',
            'modalBillCash' => 'required',
            'modalBillCredit' => 'required'
        ]);

        $bill = Bill::find($request -> modalBillId);
        if($bill){
            try {
                $bill->update([
                    'discount' => $request->modalBillDiscount,
                    'net' => $request->modalBillNet,
                    'cash' => $request->modalBillCash,
                    'credit' => $request->modalBillCredit,
                    'payed' => true,
                    'state' => 2
                ]);

                $this -> releaseTable($request -> modalTableId);
                return redirect()->route('pos')->with('success' , __('main.bill_payed'));
            }catch(QueryException $ex){

                return redirect()->route('pos')->with('error' ,  $ex->getMessage());
            }
        }
    }
    /**
     * Display the specified resource.
     *
     * @param  \App\Models\cr  $cr
     * @return \Illuminate\Http\Response
     */
    public function show(cr $cr)
    {

    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\cr  $cr
     * @return \Illuminate\Http\Response
     */
    public function edit(cr $cr)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\cr  $cr
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, cr $cr)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\cr  $cr
     * @return \Illuminate\Http\Response
     */
    public function destroy(cr $cr)
    {
        //
    }
    public function getBillNo(){
        $bills = Bill::orderBy('id', 'ASC')->get();
        if(count($bills) > 0){
            $id = $bills[count($bills) -1] -> id ;
        } else
            $id = 0 ;

        $billNo =  str_pad($id + 1, 6 , '0' , STR_PAD_LEFT);
            echo json_encode ($billNo);
        exit;
    }

    public function getLastBill(){
        $bills = Bill::with('details.items' , 'table.hall') -> orderBy('id', 'desc')->get();
        if(count($bills) > 0)
        echo json_encode ($bills ->first());
        else
            json_encode (null);
        exit;
    }

    function unique_code($limit)
    {
        return substr(base_convert(sha1(uniqid(mt_rand())), 16, 36), 0, $limit);
    }
}
