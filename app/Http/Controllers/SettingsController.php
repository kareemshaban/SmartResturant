<?php

namespace App\Http\Controllers;

use App\Models\Client;
use App\Models\Settings;
use Illuminate\Database\QueryException;
use Illuminate\Http\Request;

class SettingsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    public function __construct()
    {
        $this->middleware('auth');
    }


    public function index()
    {
        $settings = Settings::all();
        if(count($settings) > 0)
            $html = view('cpanel.settings.edit' , ['setting' => $settings[0]]) -> render();
        else
            $html = view('cpanel.settings.create') -> render();

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
            'delivery_service' => 'required|numeric',
            'service' => 'required|numeric|max:100',
            'tobacco_tax' => 'required|numeric|max:100',
            'receipt_tax' => 'required|numeric|max:100'
        ]);

        try {
            Settings::create([
                'delivery_service' => $request->delivery_service,
                'service' => $request->service,
                'tobacco_tax' => $request->tobacco_tax,
                'receipt_tax' => $request->receipt_tax,
            ]);
            return redirect() -> route('home')->with('success' , __('main.created'));

        } catch(QueryException $ex){
            return redirect()->route('home')->with('error' ,  $ex->getMessage());
        }

    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Settings  $settings
     * @return \Illuminate\Http\Response
     */
    public function show(Settings $settings)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Settings  $settings
     * @return \Illuminate\Http\Response
     */
    public function edit(Settings $settings)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Settings  $settings
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request , $id)
    {
        $setting = Settings::find($id);
        if($setting){
            $validated = $request->validate([
                'delivery_service' => 'required|numeric',
                'service' => 'required|numeric|max:100',
                'tobacco_tax' => 'required|numeric|max:100',
                'receipt_tax' => 'required|numeric|max:100'
            ]);


            try {
                $setting -> update([
                    'delivery_service' => $request->delivery_service,
                    'service' => $request->service,
                    'tobacco_tax' => $request->tobacco_tax,
                    'receipt_tax' => $request->receipt_tax,
                ]);
                return redirect()->route('home')->with('success' , __('main.updated'));

            } catch(QueryException $ex){
                return redirect()->route('home')->with('error' ,  $ex->getMessage());
            }
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Settings  $settings
     * @return \Illuminate\Http\Response
     */
    public function destroy(Settings $settings)
    {
        //
    }

    public function getVats(){
        $settings = Settings::all();
        if(count($settings) > 0)
        echo json_encode ($settings[0]);
        else
            echo json_encode (null);
        exit;
    }
}
