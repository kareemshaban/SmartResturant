<?php

namespace App\Http\Controllers;

use App\Models\Printer;
use Illuminate\Database\QueryException;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;

class PrinterController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $printers = Printer::all();
        return view('cpanel.Printer.index' , ['printers' => $printers ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('cpanel.Printer.create');
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
            'name' => 'required|unique:printers',
            'type' => 'required',
            'nickName' => 'required'
        ]);
        try {
            Printer::create([
                'name' => $request -> name,
                'type' => $request -> type,
                'nickName' => $request -> nickName,
            ]);
            return redirect()->route('printers')->with('success' , __('main.created'));
        }catch(QueryException $ex){
            return redirect()->route('printers')->with('error' ,  $ex->getMessage());
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Printer  $printer
     * @return \Illuminate\Http\Response
     */
    public function show(Printer $printer)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Printer  $printer
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $printer = Printer::find($id);
        if($printer){
            return view('cpanel.Printer.edit' , ['printer' => $printer ]);
        }
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Printer  $printer
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request,  $id)
    {
        $printer = Printer::find($id);
        if($printer){
            $validated = $request->validate([
                'name' => ['required' , Rule::unique('printers')->ignore($id)],
                'type' => 'required',
                'nickName' => 'required'
            ]);
            try {
                $printer -> update([
                    'name' => $request -> name,
                    'type' => $request -> type,
                    'nickName' => $request -> nickName,
                ]);
                return redirect()->route('printers')->with('success' , __('main.updated'));
            } catch(QueryException $ex){
                return redirect()->route('printers')->with('error' ,  $ex->getMessage());
            }


        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Printer  $printer
     * @return \Illuminate\Http\Response
     */
    public function destroy( $id)
    {
        $printer = Printer::find($id);
        if($printer) {
            $printer -> delete();
            return redirect()->route('printers')->with('success' , __('main.deleted'));
        }
    }
}
