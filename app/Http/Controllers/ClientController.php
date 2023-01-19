<?php

namespace App\Http\Controllers;

use App\Models\Bill;
use App\Models\Client;
use App\Models\Country;
use Illuminate\Database\QueryException;
use Illuminate\Http\Request;

class ClientController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $clients = Client::all();
        return view('cpanel.Client.index' , ['clients' => $clients]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view ('cpanel.Client.create');
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
            'name_ar' => 'required',
            'name_en' => 'required'
        ]);
        try{
            Client::create([
                'name_ar' => $request ->name_ar,
                'name_en' => $request ->name_en,
                'discount_type' => $request ->discount_type,
                'discount_value' => $request ->discount_value,
                'phone' => $request ->phone,
                'mobile' => $request ->mobile,
                'fax_number' => $request ->fax_number,
                'postal_code' => $request ->postal_code,
                'email' => $request ->email,
                'city_id' => $request ->city_id,
                'house_number' => $request ->house_number ,
                'apartment_number' => $request ->apartment_number,
                'region' => $request ->region,
                'street' => $request ->street,
                'address' => $request ->address ,
                'oppening_balance' => $request ->oppening_balance,
                'limit_money' => $request ->limit_money ,
                'limit_days' => $request ->limit_days,
            ]);

            return redirect()->route('clients')->with('success' , __('main.created'));
        } catch(QueryException  $ex){
            return redirect()->route('clients')->with('error' , $ex->getMessage());
        }

    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Client  $client
     * @return \Illuminate\Http\Response
     */
    public function show(Client $client)
    {
        //
    }

    public function getClient($id){
        $client = Client::find($id);
        echo json_encode ($client);
        exit;
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Client  $client
     * @return \Illuminate\Http\Response
     */
    public function edit( $id)
    {
        $client = Client::find($id);
        if($client){
            return view ('cpanel.Client.edit' , ['client' => $client]);
        }
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Client  $client
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request,  $id)
    {
        $client = Client::find($id);
        if( $client ){
        $validated = $request->validate([
            'name_ar' => 'required',
            'name_en' => 'required'
        ]);
        try{
            $client -> update([
                'name_ar' => $request ->name_ar,
                'name_en' => $request ->name_en,
                'discount_type' => $request ->discount_type,
                'discount_value' => $request ->discount_value,
                'phone' => $request ->phone,
                'mobile' => $request ->mobile,
                'fax_number' => $request ->fax_number,
                'postal_code' => $request ->postal_code,
                'email' => $request ->email,
                'city_id' => $request ->city_id,
                'house_number' => $request ->house_number ,
                'apartment_number' => $request ->apartment_number,
                'region' => $request ->region,
                'street' => $request ->street,
                'address' => $request ->address ,
                'oppening_balance' => $request ->oppening_balance,
                'limit_money' => $request ->limit_money ,
                'limit_days' => $request ->limit_days,
            ]);

            return redirect()->route('clients')->with('success' , __('main.created'));
        } catch(QueryException  $ex){
            return redirect()->route('clients')->with('error' , $ex->getMessage());
        }
    }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Client  $client
     * @return \Illuminate\Http\Response
     */
    public function destroy( $id)
    {
        $bills = Bill::where('client_id' , '=' , $id) -> get();
        if(count($bills) == 0){
            $client = Client::find($id);
            if($client){
                try{
                    $client -> delete();
                    return redirect()->route('clients')->with('success' , __('main.deleted'));
                }catch(QueryException  $ex){
                    return redirect()->route('clients')->with('error' , $ex->getMessage());
                }
            }
        } else {
            return redirect()->route('clients')->with('success' , __('main.can_not_delete'));
        }

    }
}
