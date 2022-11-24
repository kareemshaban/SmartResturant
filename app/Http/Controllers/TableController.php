<?php

namespace App\Http\Controllers;

use App\Models\Hall;
use App\Models\Table;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;

class TableController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $tables = Table::with('hall') -> get();
        return view ('cpanel.Table.index' , ['tables' => $tables]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $halls = Hall::all();
        return view ('cpanel.Table.create' , ['halls' => $halls]);
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
            'name_ar' => 'required|unique:tables',
            'name_en' => 'required|unique:tables',
            'hall_id' => 'required',

        ]);

        Table::create([
            'name_ar' => $request -> name_ar,
            'name_en' => $request -> name_en,
            'hall_id' => $request -> hall_id,
            'available' => 1,
        ]);

        return redirect()->route('tables')->with('success' , __('main.created'));
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Table  $table
     * @return \Illuminate\Http\Response
     */
    public function show(Table $table)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Table  $table
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $table = Table::find($id);
        $halls = Hall::all();
        if($table){
            return view ('cpanel.Table.edit' , ['table' => $table , 'halls' => $halls]);
        }
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Table  $table
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request,  $id)
    {
        $table = Table::find($id);
        if($table){
            $validated = $request->validate([
                'name_ar' => ['required' , Rule::unique('tables')->ignore($id)],
                'name_en' => ['required' , Rule::unique('tables')->ignore($id)],
                'hall_id' => 'required',
            ]);

            $table -> update([
                'name_ar' => $request -> name_ar,
                'name_en' => $request -> name_en,
                'hall_id' => $request -> hall_id,
                'available' => $request -> available
            ]);
            return redirect()->route('tables')->with('success' , __('main.updated'));
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Table  $table
     * @return \Illuminate\Http\Response
     */
    public function destroy( $id)
    {
        $table = Table::find($id);
        if($table){
            $table -> delete();
            return redirect()->route('tables')->with('success' , __('main.delete'));
        }
    }
}
