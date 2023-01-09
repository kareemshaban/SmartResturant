<?php

namespace App\Http\Controllers;

use App\Models\Bill;
use App\Models\BillDetails;
use App\Models\BillDetailsItems;
use App\Models\Category;
use App\Models\Client;
use App\Models\CompanyInfo;
use App\Models\Employee;
use App\Models\Hall;
use App\Models\Item;
use App\Models\ReportSetting;
use App\Models\Settings;
use App\Models\Shift;
use App\Models\Table;
use ArPHP\I18N\Arabic;
use Barryvdh\DomPDF\Facade\Pdf;

use Carbon\Carbon;
use Illuminate\Database\QueryException;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;

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

        if(count($shift) > 0 ){
            if(Auth::user() -> machine_id > 0){
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
                return redirect() -> route('home' );
            }

        } else {
            return redirect() -> route('myShift' )->with('success', __('main.no_open_shift'));
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
        if($request -> item_id) {
        if(!$request -> identifier) {

                $uuid = $this->unique_code(20);
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
                        'billType' => $request->billType,
                        'client_id' => $request->client_id ? $request->client_id : 0,
                        'phone' => $request->phone ? $request->phone : '',
                        'address' => $request->address ? $request->address : '',
                        'driver_id' => $request->driver_id ? $request->driver_id : 0,
                        'table_id' => $request->table_id ? $request->table_id : 0,
                        'delivery_service' => $request->billType == 1 ? ($request->delivery_service ? $request->delivery_service : 0) : 0,
                        'bill_date' => Carbon::parse($request->bill_date),
                        'bill_number' => $request->bill_number,
                        'total' => $request->total,
                        'vat' => $request->vat,
                        'serviceVal' => $request->billType > 1 ? $request->serviceVal : 0,
                        'discount' => $request->discount,
                        'net' => $request->net,
                        'user_id' => Auth::user()->id,
                        'payed' => false,
                        'state' => 0,
                        'client_name' => $request->client_name ? $request->client_name : '',
                        'driver_name' => $request->driver_name ? $request->driver_name : '',
                        'notes' => $request->notes ? $request->notes : '',
                        'cash' => $request->cash,
                        'credit' => $request->credit,
                        'bank' => $request->bank,

                    ])->id;
                    $this->bookTable($request->table_id);
                    $this->storeDetails($uuid, $id, $request);
                    $val = null;
                    switch ($request->input('action')) {
                        case 'pay_prepare':
                            $val = 2;
                            break;
                        case 'prepare':
                            $val = 1;
                            break;
                    }
                    if ($val = 1)
                        return redirect()->route('pos')->with('success', __('main.bill_created'));
                    else
                        return redirect()->route('pos');


                }
                catch (QueryException $ex) {

                    return redirect()->route('pos')->with('error', $ex->getMessage());
                }

        }
        else {
            $bills = Bill::where('identifier' , '=' , $request -> identifier) -> get() ;
            if(count($bills)) {
                $bill  = $bills[0] ;
                try {
                    $bill->update([
                        'identifier' => $bill->identifier,
                        'billType' => $request->billType,
                        'client_id' => $request->client_id ? $request->client_id : $bill->driver_id,
                        'phone' => $request->phone ? $request->phone : $bill->phone,
                        'address' => $request->address ? $request->address : $bill->address,
                        'driver_id' => $request->driver_id ? $request->driver_id : $bill->driver_id,
                        'table_id' => $request->table_id ? $request->table_id : $bill->table_id,
                        'delivery_service' => $request->billType == 1 ? ($request->delivery_service ? $request->delivery_service : 0) : 0,
                        'bill_date' => Carbon::parse($request->bill_date),
                        'bill_number' => $request->bill_number,
                        'total' => $request->total,
                        'vat' => $request->vat,
                        'serviceVal' => $request->billType > 1 ? $request->serviceVal : 0,
                        'discount' => $request->discount,
                        'net' => $request->net,
                        'user_id' => Auth::user()->id,
                        'payed' => $bill->payed,
                        'state' => 1,
                        'client_name' => $request->client_name ? $bill->client_name : '',
                        'driver_name' => $request->driver_name ? $bill->driver_name : '',
                        'notes' => $request->notes ? $bill->notes : '',
                        'cash' => $request->cash,
                        'credit' => $request->credit,
                        'bank' => $request->bank,

                    ]);
                    $this->EmptyBillDetails($request->identifier);
                    $this->storeDetails($bill -> identifier, $bill -> id, $request);
                    $val = null;
                    switch ($request->input('action')) {
                        case 'pay_prepare':
                            $val = 2;
                            break;
                        case 'prepare':
                            $val = 1;
                            break;
                    }
                    if ($val = 1)
                        return redirect()->route('pos')->with('success', __('main.bill_updated'));
                    else
                        return redirect()->route('pos');


                } catch (QueryException $ex) {

                    return redirect()->route('pos')->with('error', $ex->getMessage());
                }
            }

        }
        } else {
               return redirect()->route('pos')->with('error',  __('main.empty_bill'));
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
                    'bill_details_id' => $details_id ,
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

                Session::put('payed', $bill -> id);

                 return redirect()->route('pos')->with('success' ,  __('main.bill_payed'));
            }catch(QueryException $ex){

                return redirect()->route('pos')->with('error' ,  $ex->getMessage());
            }
        }
    }

    public function EmptyBillDetails($identifier){
        $details = BillDetails::all() -> where('identifier' , '=' , $identifier );
        foreach ($details as $detail){
            $detailItems = BillDetailsItems::all() -> where('bill_details_id ' , '=' , $detail -> id);
            foreach ($detailItems as $item){
                $item -> delete();
            }
            $detail -> delete();
        }
    }


    /**
     * Display the specified resource.
     *
     * @param  \App\Models\cr  $cr
     * @return \Illuminate\Http\Response
     */
    public function show(Request $request)
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
    public function destroy( $id)
    {
        $bill = Bill::find($id);
        if($bill){
            if($bill -> payed == 0){
                $details = BillDetails::all() -> where('identifier' , '=' , $bill -> identifier);
                foreach ($details as $detail){
                    $detailItems = BillDetailsItems::all() -> where('bill_details_id ' , '=' , $detail -> id);
                    foreach ($detailItems as $item){
                        $item -> delete();
                    }
                    $detail -> delete();
                }
                if($bill -> table_id > 0){
                    $this -> releaseTable($bill -> table_id );
                }
                $bill -> delete();

                return redirect()->route('pos')->with('success' , __('main.bill_deleted'));

            } else {
                return redirect()->route('pos')->with('danger' , __('main.can_not_cancel'));
            }
        }
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

    public function PrintAction($id){
        $companyInfos = CompanyInfo::all();
        $printSettings = ReportSetting::all();
        $settings = Settings::all();
        $bill = Bill::with('details.items.item' , 'table.hall' , 'client') -> with('details.items.size') -> find($id);

        if(count($companyInfos) > 0 && count($printSettings) > 0 && count($settings) > 0 && $bill){
  //return  view('cpanel.Reports.printBill', ['companyInfo' => $companyInfos[0] , 'printSetting' => $printSettings[0] , 'bill' => $bill , '$setting' => $settings[0]]);
            $reportHtml = view('cpanel.Reports.printBill', ['companyInfo' => $companyInfos[0] ,
                'printSetting' => $printSettings[0] , 'bill' => $bill , '$setting' => $settings[0] , 'client' => 1]) ->render();

        $arabic = new Arabic();
        $p = $arabic->arIdentify($reportHtml);

        for ($i = count($p)-1; $i >= 0; $i-=2) {
            $utf8ar = $arabic->utf8Glyphs(substr($reportHtml, $p[$i-1], $p[$i] - $p[$i-1]));
            $reportHtml = substr_replace($reportHtml, $utf8ar, $p[$i-1], $p[$i] - $p[$i-1]);
        }
        $pdf = PDF::loadHTML($reportHtml) ->setWarnings(false);

            if (Session::has('payed'))
            {
                Session::forget('payed');

            }
           // return  $pdf->stream("client_receipt.pdf",array("Attachment"=>0));
            return $pdf->stream("filename.pdf", array("Attachment" => false));
          // return $pdf->download('client_receipt.pdf');
        }

    }

    public function PrintActionKitchen($id){
        $companyInfos = CompanyInfo::all();
        $printSettings = ReportSetting::all();
        $settings = Settings::all();
        $bill = Bill::with('details.items.item' , 'table.hall' , 'client') -> with('details.items.size') -> find($id);

        if(count($companyInfos) > 0 && count($printSettings) > 0 && count($settings) > 0 && $bill){
            //return  view('cpanel.Reports.printBill', ['companyInfo' => $companyInfos[0] , 'printSetting' => $printSettings[0] , 'bill' => $bill , '$setting' => $settings[0]]);
            $reportHtml = view('cpanel.Reports.printBill', ['companyInfo' => $companyInfos[0] ,
                'printSetting' => $printSettings[0] , 'bill' => $bill , '$setting' => $settings[0] , 'client' => 0]) ->render();

            $arabic = new Arabic();
            $p = $arabic->arIdentify($reportHtml);

            for ($i = count($p)-1; $i >= 0; $i-=2) {
                $utf8ar = $arabic->utf8Glyphs(substr($reportHtml, $p[$i-1], $p[$i] - $p[$i-1]));
                $reportHtml = substr_replace($reportHtml, $utf8ar, $p[$i-1], $p[$i] - $p[$i-1]);
            }
            $pdf = PDF::loadHTML($reportHtml) ->setWarnings(false);

            if (Session::has('payed'))
            {
                Session::forget('payed');

            }
            return $pdf->stream("filename.pdf", array("Attachment" => false));
        }

    }
}
