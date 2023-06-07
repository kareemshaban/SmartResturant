<?php

namespace App\Http\Controllers;

use App\Models\Bill;
use App\Models\CompanyInfo;
use App\Models\Payment;
use App\Models\Recipt;
use App\Models\ReportSetting;
use App\Models\Settings;
use App\Models\Shift;
use App\Models\Size;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Date;

class ShiftController extends Controller
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
        if(count($shift) == 0){
            $html = view('cpanel.Shift.start' , ['user' => Auth::user() -> id , 'name' => Auth::user() -> name]) -> render();
        }else {
            $sales = Bill::where('shift_number' , $shift[0] -> id ) -> get();
            $payments = Payment::where('shift_number' ,$shift[0] -> id ) -> get();
            $recipts = Recipt::where('shift_number' ,$shift[0] -> id ) -> get();

            $net = 0 ;
            foreach ($sales as $sale){
                $net +=  $sale -> net ;
            }
            foreach ($payments as $payment){
                $net -=  $payment -> amount ;
            }
            foreach ($recipts as $recipt){
                $net -=  $recipt -> amount_with_tax ;
            }

            $html = view('cpanel.Shift.end' , ['user' => Auth::user() -> id , 'name' => Auth::user() -> name ,
                    'shift' => $shift[0] -> id , 'start_money' => $shift[0] -> start_money , 'net' => $net]) -> render();
        }
        return $html ;
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
    public function store(Request $request)
    {
        $validated = $request->validate([
            'user_id' => 'required',
            'start_money' => 'required'
        ]);

        Shift::Create([
            'user_id' => $request ->user_id,
            'start_at' => Carbon::now(),
            'state' => 0 ,
            'start_money' => $request ->start_money,

        ]);
        return redirect() -> route('home');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Shift  $shift
     * @return \Illuminate\Http\Response
     */
    public function show(Shift $shift)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Shift  $shift
     * @return \Illuminate\Http\Response
     */
    public function edit(Shift $shift)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Shift  $shift
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $shift = Shift::find($id);
        if($shift){
            $validated = $request->validate([
                'user_id' => 'required',
                'end_money' => 'required'
            ]);

             $shift -> update([
               'end_at' => Carbon::now(),
               'state' => 1 ,
                'end_money' => $request -> end_money
            ]);
            $shift = Shift::find($id);

            if($request -> print == 0){
                return redirect() -> route('home');
            } else {
                return  $this -> printShift($shift);
            }

        }
    }

    public function printShift($shift){
        $companyInfos = CompanyInfo::all();
        $printSettings = ReportSetting::all();
        $settings = Settings::all();
        if(count($companyInfos) > 0 && count($printSettings) > 0 && count($settings) > 0 && $shift){

            return view('cpanel.Reports.printShift', ['companyInfo' => $companyInfos[0] ,
                'printSetting' => $printSettings[0] , 'shift' => $shift , '$setting' => $settings[0] , 'client' => 1]);

        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Shift  $shift
     * @return \Illuminate\Http\Response
     */
    public function destroy(Shift $shift)
    {
        //
    }
}
