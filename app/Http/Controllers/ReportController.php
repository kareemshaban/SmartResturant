<?php

namespace App\Http\Controllers;

use App\Models\Bill;
use App\Models\Category;
use App\Models\Client;
use App\Models\CompanyInfo;
use App\Models\Item;
use App\Models\Machine;
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

}
