<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Religions ;
use Illuminate\Validation\Rule;

class DashboradController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index(){
        return view('home');
    }
    public function religions(){
        $religions = Religions::all();
        return view('cpanel.Religions.index' , [
            'religions' => $religions
        ] );
    }
    public function createReligion(){
        return view('cpanel.Religions.create');
    }

    public function storeReligion(Request $request){
        $validated = $request->validate([
            'name_ar' => 'required|unique:religions',
            'name_en' => 'required|unique:religions',
        ]);
     
        Religions::Create([
            'name_ar' => $request ->name_ar,
            'name_en' => $request ->name_en
        ]);
        return redirect()->route('religions')->with('success' , __('main.created'));

    }
    public function editReligion($id){
        $religion = Religions::find($id);
        if($religion){
            return view('cpanel.Religions.edit' ,  [
                'religion' => $religion
            ]);
        }
    }
    public function updateReligion(Request $request , $id){
        $religion = Religions::find($id);
        if($religion){
        $validated = $request->validate([
            'name_ar' => ['required' , Rule::unique('religions')->ignore($id)],
            'name_en' => ['required' , Rule::unique('religions')->ignore($id)]
        ]);
     
        $religion -> update([
            'name_ar' => $request ->name_ar,
            'name_en' => $request ->name_en
        ]);
        return redirect()->route('religions')->with('success' , __('main.updated'));
    }
    }

    public function destroyReligion($id){
        $religion = Religions::find($id);
        if($religion){
            $religion -> delete();
            return redirect()->route('religions')->with('success' , __('main.deleted'));
        }
    }
    
}
