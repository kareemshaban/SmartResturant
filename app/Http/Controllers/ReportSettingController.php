<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\ReportSetting;
use App\Models\Settings;
use Illuminate\Database\QueryException;
use Illuminate\Http\Request;

class ReportSettingController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $settings = ReportSetting::all();
        if(count($settings) > 0)
            $html = view('cpanel.ReportSettings.edit' , ['setting' => $settings[0]]);
        else
            $html = view('cpanel.ReportSettings.create');

        return  $html  ;
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
        if($request->file('logo')->getSize() / 1000 < 2000){
            $validated = $request->validate([
                'header_ar' => 'required',
                'header_en' => 'required',
                'footer_ar' => 'required',
                'footer_en' => 'required',
                'logo' => 'required'
            ]);

            $imageName = time().'.'.$request->logo->extension();
            $request->logo->move(('images/Company'), $imageName);

            ReportSetting::create([
                'header_ar' => $request -> header_ar,
                'header_en' => $request -> header_en,
                'footer_ar' => $request -> footer_ar,
                'footer_en' => $request -> footer_en,
                'logo' => $imageName,

            ]);
            return redirect()->route('home')->with('success' , __('main.created'));



        } else {
            return redirect()->route('home')->with('error' , __('main.img_big'));

        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\ReportSetting  $reportSetting
     * @return \Illuminate\Http\Response
     */
    public function show(ReportSetting $reportSetting)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\ReportSetting  $reportSetting
     * @return \Illuminate\Http\Response
     */
    public function edit(ReportSetting $reportSetting)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\ReportSetting  $reportSetting
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $setting = ReportSetting::find($id);
        if($setting){
            if($request->logo){
                if($request->file('logo')->getSize() / 1000 < 2000){
                    $imageName = time().'.'.$request->logo->extension();
                    $request->logo->move(('images/Company'), $imageName);

                } else {
                    return redirect()->route('home')->with('error' , __('main.img_big'));
                }

            } else {
                $imageName  =  $setting -> logo ;
            }

            $validated = $request->validate([
                'header_ar' => 'required',
                'header_en' => 'required',
                'footer_ar' => 'required',
                'footer_en' => 'required'
            ]);


            try {
                $setting -> update([
                    'header_ar' => $request -> header_ar,
                    'header_en' => $request -> header_en,
                    'footer_ar' => $request -> footer_ar,
                    'footer_en' => $request -> footer_en,
                    'logo' => $imageName,
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
     * @param  \App\Models\ReportSetting  $reportSetting
     * @return \Illuminate\Http\Response
     */
    public function destroy(ReportSetting $reportSetting)
    {
        //
    }
}
