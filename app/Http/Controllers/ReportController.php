<?php

namespace App\Http\Controllers;

use App\Models\Bill;
use App\Models\Category;
use App\Models\Client;
use App\Models\CompanyInfo;
use App\Models\ExpensesType;
use App\Models\Hall;
use App\Models\Item;
use App\Models\Machine;
use App\Models\Recipt;
use App\Models\ReportSetting;
use App\Models\Settings;
use App\Models\Shift;
use App\Models\User;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ReportController extends Controller
{
    //
    public function report_total(){
        $clients = Client::all();
        $machines = Machine::all();
        $users = User::all();
        return view('cpanel.Reports.report_total' , ['clients' => $clients , 'machines' => $machines , 'users' => $users]);
    }
    public function report_total_search(Request $request){
        $companyInfos = CompanyInfo::all();
        $printSettings = ReportSetting::all();
        $settings = Settings::all();
        $bills = Bill::all();
        if($request -> has('is_bill_no')) $bills = $bills -> where('bill_number' , '=' , $request -> bill_no);
        if($request -> has('is_client')) $bills = $bills -> where('client_id' , '=' , $request -> client_id);
        if($request -> has('is_from_date')) $bills = $bills -> where('bill_date' , '>=' , Carbon::parse($request -> from_date));
        if($request -> has('is_to_date')) $bills = $bills -> where('bill_date' , '<=' , Carbon::parse($request -> to_date) -> addDay());
        if($request -> has('is_machine')) $bills = $bills -> where('machine_id' , '=' , $request -> machine_id);
        if($request -> has('is_shifts')) $bills = $bills -> where('shift_number' , '=' , $request -> shift_no);
        if($request -> has('is_user')) $bills = $bills -> where('user_id' , '=' , $request -> user_id);



        return view('cpanel.Reports.print_report_total' , ['companyInfo' => $companyInfos[0] , 'printSetting' => $printSettings[0] ,
             'bills' => $bills , 'paper_type' => $request -> print_type , 'is_from_time' => $request -> is_from_time ,   'from_time' => $request -> from_time ,
            'is_to_time' => $request -> is_to_time ,   'to_time' => $request -> to_time ]);
    }


    public function report_details(){
        $clients = Client::all();
        $machines = Machine::all();
        $users = User::all();
        $categories = Category::all();
        return view('cpanel.Reports.report_details' , ['clients' => $clients , 'machines' => $machines ,
            'users' => $users , 'categories' => $categories]);
    }

    public function autocompleteSearch(Request $request)
    {
        $keyword = $request->get('query');

        $filterResult =  Item::where(function ($query) use($keyword) {
            $query->where('name_en', 'like', '%' . $keyword . '%')
                ->orWhere('name_ar', 'like', '%' . $keyword . '%')
                ->orWhere('code', 'like', '%' . $keyword . '%');
        })
            ->get();
        $data = array();
        foreach ($filterResult as $item)
        {
            $data[] =  $item -> code . '--' . $item -> name_en . '--' .$item -> name_ar ;
        }
        return response()->json($data);
    }

    public function report_details_search(Request $request){
        $companyInfos = CompanyInfo::all();
        $printSettings = ReportSetting::all();
        $AllBills = Bill::with('details.items.item') -> get();
         $item_id = 0 ;
        if($request -> has('is_bill_no'))   $AllBills = $AllBills -> where('bill_number' , '=' , $request -> bill_no);
        if($request -> has('is_client'))    $AllBills = $AllBills -> where('client_id' , '=' , $request -> client_id);
        if($request -> has('is_from_date')) $AllBills = $AllBills -> where('bill_date' , '>=' , Carbon::parse($request -> from_date));
        if($request -> has('is_to_date'))   $AllBills = $AllBills -> where('bill_date' , '<=' , Carbon::parse($request -> to_date) -> addDay());
        if($request -> has('is_machine'))   $AllBills = $AllBills -> where('machine_id' , '=' , $request -> machine_id);
        if($request -> has('is_shifts'))    $AllBills = $AllBills -> where('shift_number' , '=' , $request -> shift_no);
        if($request -> has('is_user'))      $AllBills = $AllBills -> where('user_id' , '=' , $request -> user_id);

        if($request -> has('is_item'))  {
            $code = substr($request -> item_id , 0 , strpos($request -> item_id , '--'))  ;
            $item = Item::where('code' , '=' , $code) -> get();
            if(count($item) > 0){
                $item_id = $item[0] -> id ;
            }
        }
        return view('cpanel.Reports.print_report_details' , ['companyInfo' => $companyInfos[0] , 'printSetting' => $printSettings[0] ,
            'bills' => $AllBills , 'paper_type' => $request -> print_type , 'is_from_time' => $request -> is_from_time ,   'from_time' => $request -> from_time ,
            'is_to_time' => $request -> is_to_time ,   'to_time' => $request -> to_time , 'category_id' => $request -> has('is_category') ? $request -> category_id : 0 ,
            'item_id' => $request -> has('is_item') ? $item_id : 0]);
    }

    public function report_sales_type(){
        $clients = Client::all();
        $machines = Machine::all();
        $users = User::all();
        $halls = Hall::all();
        return view('cpanel.Reports.report_sales_by_type' , ['clients' => $clients , 'machines' => $machines , 'users' => $users , 'halls' => $halls]);
    }
    public function report_sales_type_search(Request $request){
        $companyInfos = CompanyInfo::all();
        $printSettings = ReportSetting::all();
        $settings = Settings::all();
        $bills = Bill::all();

        if($request -> has('is_bill_no')) $bills = $bills -> where('bill_number' , '=' , $request -> bill_no);
        if($request -> has('is_bill_type')) $bills = $bills -> where('billType' , '=' , $request -> bill_type);
        if($request -> has('is_client')) $bills = $bills -> where('client_id' , '=' , $request -> client_id);
        if($request -> has('is_from_date')) $bills = $bills -> where('bill_date' , '>=' , Carbon::parse($request -> from_date));
        if($request -> has('is_to_date')) $bills = $bills -> where('bill_date' , '<=' , Carbon::parse($request -> to_date) -> addDay());
        if($request -> has('is_machine')) $bills = $bills -> where('machine_id' , '=' , $request -> machine_id);
        if($request -> has('is_shifts')) $bills = $bills -> where('shift_number' , '=' , $request -> shift_no);
        if($request -> has('is_user')) $bills = $bills -> where('user_id' , '=' , $request -> user_id);
        if($request -> has('is_hall'))  $bills = $bills -> where('hall_id' , '=' , $request -> hall);
        if($request -> has('is_table')) $bills = $bills -> where('table_id' , '=' , $request -> table);


        return view('cpanel.Reports.print_report_type' , ['companyInfo' => $companyInfos[0] , 'printSetting' => $printSettings[0] ,
            'bills' => $bills , 'paper_type' => $request -> print_type , 'is_from_time' => $request -> is_from_time ,   'from_time' => $request -> from_time ,
            'is_to_time' => $request -> is_to_time ,   'to_time' => $request -> to_time ]);
    }

    public function report_daily_sales(){
        return view('cpanel.Reports.report_daily_sales' );
    }
    public function report_daily_sales_search(Request $request){
        $companyInfos = CompanyInfo::all();
        $printSettings = ReportSetting::all();
        $settings = Settings::all();
        $bills = Bill::all();

        if($request -> has('is_from_date')) $bills = $bills -> where('bill_date' , '>=' , Carbon::parse($request -> from_date));
        if($request -> has('is_to_date')) $bills = $bills -> where('bill_date' , '<=' , Carbon::parse($request -> to_date) -> addDay());

        return view('cpanel.Reports.print_report_daily' , ['companyInfo' => $companyInfos[0] , 'printSetting' => $printSettings[0] ,
            'bills' => $bills , 'paper_type' => $request -> print_type , 'is_from_time' => $request -> is_from_time ,   'from_time' => $request -> from_time ,
            'is_to_time' => $request -> is_to_time ,   'to_time' => $request -> to_time ]);
    }
    public function report_period_sales(){
        $categories = Category::all();
        return view('cpanel.Reports.report_period_sales'  , compact('categories'));
    }
    public function  report_period_sales_search(Request $request){
        $companyInfos = CompanyInfo::all();
        $printSettings = ReportSetting::all();
        $settings = Settings::all();
        $bills = DB::table('bill_details')-> join('bills' , 'bills.identifier' , '=' , 'bill_details.identifier')
            -> join('categories' , 'bill_details.category_id' , '=' , 'categories.id')
            -> join('items' , 'bill_details.item_id' , '=' , 'items.id')
            -> join('sizes' , 'bill_details.size_id' , '=' , 'sizes.id')
            -> select('bill_details.*' , 'categories.name_ar as category_name_ar' , 'categories.name_en as category_name_en' ,
                'items.name_ar as item_name_ar' , 'items.name_en as item_name_en' , 'sizes.label') -> get();



        if($request -> has('is_category')) $bills = $bills -> where('category_id' , '=' , $request -> category);
        if($request -> has('is_from_date')) $bills = $bills -> where('bill_date' , '>=' , Carbon::parse($request -> from_date));
        if($request -> has('is_to_date')) $bills = $bills -> where('bill_date' , '<=' , Carbon::parse($request -> to_date) -> addDay());

        if($request -> report_type == 0){
            // total
            $arabic  = $bills -> groupBy('category_name_ar' );
            $english = $bills -> groupBy('category_name_en' );
            $english =  $english -> map(function ($bill) {
               return [
                   'totalWithVat' => $bill -> sum('totalWithVat'),
               ];
            });
            $arabic =  $arabic -> map(function ($bill) {
                return [
                    'totalWithVat' => $bill -> sum('totalWithVat'),
                ];
            });
            return view('cpanel.Reports.print_report_period' , ['companyInfo' => $companyInfos[0] , 'printSetting' => $printSettings[0] ,
                'arabic' => $arabic  , 'english' => $english , 'paper_type' => $request -> print_type , 'is_from_time' => $request -> is_from_time ,   'from_time' => $request -> from_time ,
                'is_to_time' => $request -> is_to_time ,   'to_time' => $request -> to_time , 'report_type' => $request -> report_type]);
        } else {
            //return $bills ;
            return view('cpanel.Reports.print_report_period' , ['companyInfo' => $companyInfos[0] , 'printSetting' => $printSettings[0] ,
                'bills' => $bills   , 'paper_type' => $request -> print_type , 'is_from_time' => $request -> is_from_time ,   'from_time' => $request -> from_time ,
                'is_to_time' => $request -> is_to_time ,   'to_time' => $request -> to_time , 'report_type' => $request -> report_type]);
        }

    }
    public function report_expenses(){
        $expenses = ExpensesType::all();
        return view('cpanel.Reports.report_expenses'  , compact('expenses'));
    }
    public function report_expenses_search(Request $request){
        $companyInfos = CompanyInfo::all();
        $printSettings = ReportSetting::all();
        $settings = Settings::all();
        $bills = Recipt::with('doc') -> get();
        if($request -> has('is_from_date')) $bills = $bills -> where('doc_date' , '>=' , Carbon::parse($request -> from_date));
        if($request -> has('is_to_date')) $bills = $bills -> where('doc_date' , '<=' , Carbon::parse($request -> to_date) -> addDay());
        if($request -> has('is_expenses_type')) $bills = $bills -> where('doc_type' , '=' , $request -> expenses_type);

        return view('cpanel.Reports.print_expenses' , ['companyInfo' => $companyInfos[0] , 'printSetting' => $printSettings[0] ,
            'bills' => $bills   , 'paper_type' => $request -> print_type , 'is_from_time' => $request -> is_from_time ,   'from_time' => $request -> from_time ,
            'is_to_time' => $request -> is_to_time ,   'to_time' => $request -> to_time , 'report_type' => $request -> report_type]);
    }

    public function report_client_account(){
        $clients = Client::all();
        return view('cpanel.Reports.report_client_account'  , compact('clients'));
    }

    public function report_client_account_search(Request  $request){
        $companyInfos = CompanyInfo::all();
        $printSettings = ReportSetting::all();
        $settings = Settings::all();
        $bills = DB::table('bills') -> join('clients' , 'bills.client_id' , '=' , 'clients.id')
            -> select('bills.*' , 'clients.name_ar as client_name_ar' , 'clients.name_en as client_name_en') -> get();
        if($request -> has('is_from_date')) $bills = $bills -> where('bill_date' , '>=' , Carbon::parse($request -> from_date));
        if($request -> has('is_to_date')) $bills = $bills -> where('bill_date' , '<=' , Carbon::parse($request -> to_date) -> addDay());
        if($request -> has('is_client')) $bills = $bills -> where('client_id' , '=' , $request -> client);


        $arabic  = $bills -> groupBy('client_name_ar' );
        $english = $bills -> groupBy('client_name_en' );

        $english =  $english -> map(function ($bill) {
            return [
                'net' => $bill -> sum('net'),
            ];
        });
        $arabic =  $arabic -> map(function ($bill) {
            return [
                'net' => $bill -> sum('net'),
            ];
        });

        return view('cpanel.Reports.print_client_account' , ['companyInfo' => $companyInfos[0] , 'printSetting' => $printSettings[0] ,
            'arabic' => $arabic   , 'english' => $english ,  'paper_type' => $request -> print_type , 'is_from_time' => $request -> is_from_time ,   'from_time' => $request -> from_time ,
            'is_to_time' => $request -> is_to_time ,   'to_time' => $request -> to_time , 'report_type' => $request -> report_type]);


    }
    public function report_total_transactions(){
        return view('cpanel.Reports.report_total_transactions' );
    }
    public function report_total_transactions_search(Request $request){
        $companyInfos = CompanyInfo::all();
        $printSettings = ReportSetting::all();
        $settings = Settings::all();
        $bills = Bill::all();
        $expenses = Recipt::all();

        if($request -> has('is_from_date')) $bills = $bills -> where('bill_date' , '>=' , Carbon::parse($request -> from_date));
        if($request -> has('is_to_date')) $bills = $bills -> where('bill_date' , '<=' , Carbon::parse($request -> to_date) -> addDay());
        if($request -> has('is_shift')) $bills = $bills -> where('shift_number' , '=' , $request -> shift_no);

        if($request -> has('is_from_date')) $expenses = $expenses -> where('doc_date' , '>=' , Carbon::parse($request -> from_date));
        if($request -> has('is_to_date')) $expenses = $expenses -> where('doc_date' , '<=' , Carbon::parse($request -> to_date) -> addDay());
        if($request -> has('is_shift')) $expenses = $expenses -> where('shift_number' , '=' , $request -> shift_no);

        $cashs =  $bills -> map(function ($bill) {
            return [
                'net' => $bill -> sum('net'),
            ];
        });
        $outs = $expenses -> map(function ($expense) {
            return [
                'net' => $expense -> sum('amount_with_tax'),
            ];
        });

        $out = (float) count($outs) > 0 ? $outs[0]['net'] : 0;
        $cash = (float) count($cashs) > 0 ? $cashs[0]['net'] : 0;
        $net = $cash - $out ;

        return view('cpanel.Reports.print_total_transactions' , ['companyInfo' => $companyInfos[0] , 'printSetting' => $printSettings[0] ,
            'cashs' => $cashs   , 'outs' => $outs , 'net' => $net ,  'paper_type' => $request -> print_type , 'is_from_time' => $request -> is_from_time ,   'from_time' => $request -> from_time ,
            'is_to_time' => $request -> is_to_time ,   'to_time' => $request -> to_time , 'report_type' => $request -> report_type]);

     //    return $outs[0]['net'];
    }
    public function report_box_transactions(){
        return view('cpanel.Reports.report_box_transaction');
    }
    public function report_box_transactions_search(Request $request){
        $companyInfos = CompanyInfo::all();
        $printSettings = ReportSetting::all();
        $settings = Settings::all();
        $bills = Bill::all();
        $expenses = Recipt::all();


        if($request -> has('is_from_date')) $bills = $bills -> where('bill_date' , '>=' , Carbon::parse($request -> from_date));
        if($request -> has('is_to_date')) $bills = $bills -> where('bill_date' , '<=' , Carbon::parse($request -> to_date) -> addDay());

        if($request -> has('is_from_date')) $expenses = $expenses -> where('doc_date' , '>=' , Carbon::parse($request -> from_date));
        if($request -> has('is_to_date')) $expenses = $expenses -> where('doc_date' , '<=' , Carbon::parse($request -> to_date) -> addDay());

        $data = array();

        $obj = [
            'date',
            'billNumber',
            'type',
            'positive',
            'negative',
            'net'
        ];
        foreach ($bills as $bill){
            $obj = [
                'date' => $bill -> bill_date ,
                'billNumber' => $bill -> bill_number ,
                'type' => 'فاتورة بيع نقدي' ,
                'positive' => $bill -> net ,
                'negative' => 0 ,
                'net' => $bill -> net ,

            ] ;

            array_push($data , $obj) ;
        }

        foreach ($expenses as $expense){
            $obj = [
                'date' => $expense -> doc_date ,
                'billNumber' => $expense -> bill_number ,
                'type' => 'سند صرف صندوق' ,
                'positive' => 0,
                'negative' => $expense -> amount_with_tax  ,
                'net' => $expense -> amount_with_tax ,

            ] ;

            array_push($data , $obj) ;
        }

        usort($data, function ($a, $b) {
            return $a['date'] <=> $b['date'];
        });
      // return $data ;
        return view('cpanel.Reports.print_box_transaction' , ['companyInfo' => $companyInfos[0] , 'printSetting' => $printSettings[0] ,
            'bills' => $data  ,   'paper_type' => $request -> print_type , 'is_from_time' => $request -> is_from_time ,   'from_time' => $request -> from_time ,
            'is_to_time' => $request -> is_to_time ,   'to_time' => $request -> to_time , 'report_type' => $request -> report_type]);
    }

    function sortByOrder($a, $b) {
        return $a['date'] - $b['date'];
    }


}
