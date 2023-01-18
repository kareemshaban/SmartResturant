<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Hall;
use App\Models\Table;
use Facade\Ignition\Tabs\Tab;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;

class HallController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $halls = Hall::all();
        return view('cpanel.Hall.index' , ['halls' => $halls] );
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('cpanel.Hall.create' );
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
            'name_ar' => 'required|unique:halls',
            'name_en' => 'required|unique:halls'
        ]);

        Hall::create([
            'name_ar' => $request -> name_ar,
            'name_en' => $request -> name_en,
            'details_ar' => $request -> details_ar,
            'details_en' => $request -> details_en,
        ]);

        return redirect()->route('halls')->with('success' , __('main.created'));
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Hall  $hall
     * @return \Illuminate\Http\Response
     */
    public function show(Hall $hall)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Hall  $hall
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $hall = Hall::find($id);
        if($hall){
            return view('cpanel.Hall.edit' , ['hall' => $hall]);
        }
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Hall  $hall
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $hall = Hall::find($id);
        if($hall){
            $validated = $request->validate([
                'name_ar' => ['required' , Rule::unique('halls')->ignore($id)],
                'name_en' => ['required' , Rule::unique('halls')->ignore($id)],
            ]);

            $hall -> update([
                'name_ar' => $request -> name_ar,
                'name_en' => $request -> name_en,
                'details_ar' => $request -> details_ar,
                'details_en' => $request -> details_en,
            ]);
            return redirect()->route('halls')->with('success' , __('main.updated'));
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Hall  $hall
     * @return \Illuminate\Http\Response
     */
    public function destroy( $id)
    {
        $hall = Hall::find($id);
        if($hall){
            $hall -> delete();
            return redirect()->route('halls')->with('success' , __('main.deleted'));
        }
    }
    public function gatHallTables($id){
        $tables = Table::where('hall_id' , '=' , $id) -> get();
        echo  json_encode($tables);
        exit;
    }
}
