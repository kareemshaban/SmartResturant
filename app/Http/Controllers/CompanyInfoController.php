<?php

namespace App\Http\Controllers;

use App\Models\CompanyInfo;
use Illuminate\Database\QueryException;
use Illuminate\Http\Request;

class CompanyInfoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $settings = CompanyInfo::all();
        if(count($settings) > 0)
            return view('cpanel.company.edit' , ['setting' => $settings[0]]);
        else
            return view('cpanel.company.create');
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
        try {
            CompanyInfo::create([
                'name_ar' => $request -> name_ar ,
                'name_en' => $request -> name_en ,
                'activity_ar' => $request -> activity_ar ,
                'activity_en' => $request -> activity_en ,
                'phone1' => $request -> phone1 ,
                'phone2' => $request -> phone2 ,
                'fax1' => $request -> fax1 ,
                'fax2' => $request -> fax2,
                'online_url' => $request -> online_url
            ]);
            return redirect()->route('company')->with('success' , __('main.created'));
        } catch(QueryException  $ex){
            return redirect()->route('company')->with('error' , $ex->getMessage());
        }

    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\CompanyInfo  $companyInfo
     * @return \Illuminate\Http\Response
     */
    public function show(CompanyInfo $companyInfo)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\CompanyInfo  $companyInfo
     * @return \Illuminate\Http\Response
     */
    public function edit(CompanyInfo $companyInfo)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\CompanyInfo  $companyInfo
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $company = CompanyInfo::find($id);
        if($company){
            try {
                $company -> update([
                    'name_ar' => $request -> name_ar ,
                    'name_en' => $request -> name_en ,
                    'activity_ar' => $request -> activity_ar ,
                    'activity_en' => $request -> activity_en ,
                    'phone1' => $request -> phone1 ,
                    'phone2' => $request -> phone2 ,
                    'fax1' => $request -> fax1 ,
                    'fax2' => $request -> fax2,
                    'online_url' => $request -> online_url
                ]);
                return redirect()->route('company')->with('success' , __('main.updated'));
            } catch(QueryException  $ex){
                return redirect()->route('company')->with('error' , $ex->getMessage());
            }
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\CompanyInfo  $companyInfo
     * @return \Illuminate\Http\Response
     */
    public function destroy(CompanyInfo $companyInfo)
    {
        //
    }
}
