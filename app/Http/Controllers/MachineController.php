<?php

namespace App\Http\Controllers;

use App\Models\Hall;
use App\Models\Machine;
use Illuminate\Http\Request;

class MachineController extends Controller
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

    public function getHall($id){
        $client = Hall::find($id);
        echo json_encode ($client);
        exit;
    }
    public function getMachineNo(){
        $machines = Machine::orderBy('id', 'ASC')->get();
        if(count($machines) > 0){
            $id = $machines[count($machines) -1] -> id ;
        } else
            $id = 0 ;

        $billNo =  str_pad($id + 1, 6 , '0' , STR_PAD_LEFT);
        echo json_encode ($billNo);
        exit;
    }
    public function getMac(){
        $macAddr = substr(exec('getmac'), 0, 17);
        echo json_encode ($macAddr);
        exit;
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
     * @param  \App\Models\Machine  $machine
     * @return \Illuminate\Http\Response
     */
    public function show(Machine $machine)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Machine  $machine
     * @return \Illuminate\Http\Response
     */
    public function edit(Machine $machine)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Machine  $machine
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Machine $machine)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Machine  $machine
     * @return \Illuminate\Http\Response
     */
    public function destroy(Machine $machine)
    {
        //
    }
}
