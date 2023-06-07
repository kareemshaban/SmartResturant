<?php

namespace App\Http\Controllers;

use App\Models\Bill;
use App\Models\BillDetails;
use App\Models\Employee;
use Illuminate\Http\Request;

class BillController extends PosController
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
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
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Bill  $bill
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Bill  $bill
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Bill  $bill
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Bill  $bill
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }

    public function getTableBill($id){
        $bill = Bill::with('details.items.item', 'table.hall') -> with('details.items.size') ->
        where('table_id' , '=' , $id)
            -> where('payed' , '=' , 0)
            -> get() ;
        echo json_encode ($bill);
        exit;
    }
    public function searchBill($val){
        $bill = Bill::with('details.items.item', 'table.hall') -> with('details.items.size') ->
        where('bill_number' , '=' , $val)
            -> get() ;
        echo json_encode ($bill);
        exit;
    }
    public function getUnpaidBills(){
        $bills = Bill::with('details.items.item', 'table.hall') -> with('details.items.size') ->
        where('payed' , '=' , 0)
            -> get() ;
        $html = view('cpanel.pos.unPaidBills' , compact('bills')) -> render();
        return $html ;
    }
    public function partialPayment($id){
        $bill = Bill::with('details.items.item', 'table.hall') -> with('details.items.size') ->
        find($id);
        $html = view('cpanel.pos.partialPayment' , compact('bill')) -> render();
        return $html ;
    }

    public function partialPaymentAction(Request $request){
        $validated = $request->validate([
            'modalBillId2' => 'required',
            'modalTableId2' => 'required',
            'modalBillNet2' => 'required',
            'modalBillCash2' => 'required',
            'modalBillCredit2' => 'required'
        ]);

        $bill = Bill::find($request -> modalBillId2);
        if($bill){
            $totalPayment = $bill -> cash + $bill -> credit + $request->modalBillCash2 + $request->modalBillCredit2 ;

            $bill->update([
                'cash' => $request->modalBillCash2,
                'credit' => $request->modalBillCredit2,
                'payed' => ($totalPayment == $bill -> net),
                'state' => ($totalPayment == $bill -> net) ? 2 : 1
            ]);

            if($totalPayment == $bill -> net){
                $this -> releaseTable($request -> modalTableId2);
            }
            for($i = 0 ; $i < count($request -> select) ; $i++){
                $detail = BillDetails::find($request -> select[$i]);
                if($detail){
                    $detail -> update ([
                        'payed' => 1
                    ]) ;
                }
            }

            return redirect()->route('pos')->with('success' ,  __('main.bill_payed'));


        }

    }




}
