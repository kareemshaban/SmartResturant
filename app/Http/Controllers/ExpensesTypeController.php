<?php

namespace App\Http\Controllers;

use App\Models\ExpensesType;
use App\Models\Recipt;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;

class ExpensesTypeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $expenses = ExpensesType::all();
        return view('cpanel.Expenses.index' , ['expenses' => $expenses]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('cpanel.expenses.create');
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
            'name_ar' => 'required|unique:expenses_types',
            'name_en' => 'required|unique:expenses_types',
        ]);

        ExpensesType::create([
            'name_ar' => $request -> name_ar,
            'name_en' => $request -> name_en,
            'description_ar' => $request -> description_ar ? $request -> description_ar : '',
            'description_en' => $request -> description_en ? $request -> description_en : '',
            'show_bill_number' =>  $request -> show_bill_number == 'on' ? 1 : 0,
            'show_supplier_name' =>  $request -> show_supplier_name == 'on' ? 1 : 0,
            'show_tax_number' =>  $request -> show_tax_number == 'on' ? 1 : 0,
        ]);

        return redirect()->route('expenses_type')->with('success' , __('main.created'));
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\ExpensesType  $expensesType
     * @return \Illuminate\Http\Response
     */
    public function show(ExpensesType $expensesType)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\ExpensesType  $expensesType
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $expenses = ExpensesType::find($id);
        if($expenses){
            return view('cpanel.expenses.edit' , ['expenses' => $expenses]);
        }
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\ExpensesType  $expensesType
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $expenses = ExpensesType::find($id);
        if($expenses){
            $validated = $request->validate([
                'name_ar' => ['required' , Rule::unique('expenses_types')->ignore($id)],
                'name_en' => ['required' , Rule::unique('expenses_types')->ignore($id)],
            ]);
            $expenses -> update([
                'name_ar' => $request -> name_ar,
                'name_en' => $request -> name_en,
                'description_ar' => $request -> description_ar ? $request -> description_ar : '',
                'description_en' => $request -> description_en ? $request -> description_en : '',
                'show_bill_number' =>  $request -> show_bill_number == 'on' ? 1 : 0,
                'show_supplier_name' =>  $request -> show_supplier_name == 'on' ? 1 : 0,
                'show_tax_number' =>  $request -> show_tax_number == 'on' ? 1 : 0,
            ]);

            return redirect()->route('expenses_type')->with('success' , __('main.updated'));

        }

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\ExpensesType  $expensesType
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $bills = Recipt::where('doc_type' , '=' , $id) -> get();
        if(count($bills) == 0){
            $expenses = ExpensesType::find($id);
            if($expenses){
                $expenses -> delete();
                return redirect()->route('expenses_type')->with('success' , __('main.deleted'));
            }
        } else {
            return redirect()->route('expenses_type')->with('success' , __('main.can_not_delete'));
        }

    }
    public function getExpense($id){
        $expenses = ExpensesType::find($id);
        echo json_encode ($expenses);
        exit;
    }
}
