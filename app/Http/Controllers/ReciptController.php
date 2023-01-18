<?php

namespace App\Http\Controllers;

use App\Models\ExpensesType;
use App\Models\Recipt;
use App\Models\Shift;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Validation\Rule;

class ReciptController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $bills = Recipt::with('doc') -> get();
        return view('cpanel.Recipit.index' , ['bills' => $bills]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $expenses = ExpensesType::all();
        return view('cpanel.Recipit.create' , ['expenses' => $expenses]);
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
            'bill_number' => 'required|unique:recipts',
            'doc_type' => 'required',
            'doc_date' => 'required',
            'amount' => 'required'
        ]);

        $shift = Shift::where('user_id' , '=' , Auth::user() -> id)
            -> where('state' , '=' , 0 )->get();
        $shift_number = count($shift ) > 0 ? $shift[0] -> id : 0 ;
        Recipt::create([
            'bill_number' => $request -> bill_number,
            'doc_type' => $request -> doc_type,
            'doc_date' => $request -> doc_date,
            'amount' => $request -> amount,
            'amount_with_tax' =>  $request -> amount_with_tax ? $request -> amount_with_tax : 0,
            'tax' =>  $request -> tax  ? $request -> tax : 0,
            'bill_number_txt' =>  $request -> bill_number_txt ? $request -> bill_number_txt : '',
            'tax_number_txt' =>  $request -> tax_number_txt ? $request -> tax_number_txt : '',
            'supplier_name_txt' =>  $request -> supplier_name_txt ? $request -> supplier_name_txt : '',
            'tax_type' => $request -> tax_type,
            'notes' => $request -> notes ? $request -> notes : '',
            'shift_number' => $shift_number
        ]);

        return redirect()->route('recipt')->with('success' , __('main.created'));
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Recipt  $recipt
     * @return \Illuminate\Http\Response
     */
    public function show(Recipt $recipt)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Recipt  $recipt
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $bill = Recipt::find($id);
        if($bill){
            $expenses = ExpensesType::all();
            return view('cpanel.Recipit.edit' , ['expenses' => $expenses , 'bill' => $bill]);


        }
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Recipt  $recipt
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request,$id)
    {
        $bill = Recipt::find($id);
        if($bill){
            $validated = $request->validate([
                'bill_number' =>  ['required' , Rule::unique('recipts')->ignore($id)],
                'doc_type' => 'required',
                'doc_date' => 'required',
                'amount' => 'required'
            ]);

            $bill -> update([
                'bill_number' => $request -> bill_number,
                'doc_type' => $request -> doc_type,
                'doc_date' => $request -> doc_date,
                'amount' => $request -> amount,
                'amount_with_tax' =>  $request -> amount_with_tax ? $request -> amount_with_tax : 0,
                'tax' =>  $request -> tax  ? $request -> tax : 0,
                'bill_number_txt' =>  $request -> bill_number_txt ? $request -> bill_number_txt : '',
                'tax_number_txt' =>  $request -> tax_number_txt ? $request -> tax_number_txt : '',
                'supplier_name_txt' =>  $request -> supplier_name_txt ? $request -> supplier_name_txt : '',
                'tax_type' => $request -> tax_type,
                'notes' => $request -> notes ? $request -> notes : ''
            ]);

            return redirect()->route('recipt')->with('success' , __('main.updated'));
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Recipt  $recipt
     * @return \Illuminate\Http\Response
     */
    public function destroy( $id)
    {
        $bill = Recipt::find($id);
        if($bill){
            $bill -> delete();
            return redirect()->route('recipt')->with('success' , __('main.deleted'));
        }
    }

    public function getRecipitBillNo(){
        $bills = Recipt::orderBy('id', 'ASC')->get();
        if(count($bills) > 0){
            $id = $bills[count($bills) -1] -> id ;
        } else
            $id = 0 ;

        $billNo =  str_pad($id + 1, 6 , '0' , STR_PAD_LEFT);
        echo json_encode ($billNo);
        exit;
    }
}
