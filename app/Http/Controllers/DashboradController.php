<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Religions ;
use App\Models\Departments ;
use App\Models\Gender ;
use App\Models\Nationality ;
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


     public function departments(){
        $departments = Departments::all();
        return view('cpanel.Department.index' , [
            'departments' => $departments
        ] );
    }
    public function createDepartment(){
        return view('cpanel.Department.create');
    }

    public function storeDepartment(Request $request){
        $validated = $request->validate([
            'name_ar' => 'required|unique:religions',
            'name_en' => 'required|unique:religions',
        ]);
     
        Departments::Create([
            'name_ar' => $request ->name_ar,
            'name_en' => $request ->name_en
        ]);
        return redirect()->route('departments')->with('success' , __('main.created'));

    }
    public function editDepartment($id){
        $department = Departments::find($id);
        if($department){
            return view('cpanel.Department.edit' ,  [
                'department' => $department
            ]);
        }
    }
    public function updateDepartment(Request $request , $id){
        $department = Departments::find($id);
        if($department){
        $validated = $request->validate([
            'name_ar' => ['required' , Rule::unique('religions')->ignore($id)],
            'name_en' => ['required' , Rule::unique('religions')->ignore($id)]
        ]);
     
        $department -> update([
            'name_ar' => $request ->name_ar,
            'name_en' => $request ->name_en
        ]);
        return redirect()->route('departments')->with('success' , __('main.updated'));
    }
    }

    public function destroyDepartment($id){
        $department = Departments::find($id);
        if($department){
            $department -> delete();
             redirect()->route('departments')->with('success' , __('main.deleted'));
        }
    }

     public function genders(){
        $genders = Gender::all();
        return view('cpanel.Gender.index' , [
            'genders' => $genders
        ] );
    }
    public function createGender(){
        return view('cpanel.Gender.create');
    }

    public function storeGender(Request $request){
        $validated = $request->validate([
            'name_ar' => 'required|unique:religions',
            'name_en' => 'required|unique:religions',
        ]);
     
        Gender::Create([
            'name_ar' => $request ->name_ar,
            'name_en' => $request ->name_en
        ]);
        return redirect()->route('genders')->with('success' , __('main.created'));

    }
    public function editGender($id){
        $gender = Gender::find($id);
        if($gender){
            return view('cpanel.Gender.edit' ,  [
                'gender' => $gender
            ]);
        }
    }
    public function updateGender(Request $request , $id){
        $gender = Gender::find($id);
        if($gender){
        $validated = $request->validate([
            'name_ar' => ['required' , Rule::unique('religions')->ignore($id)],
            'name_en' => ['required' , Rule::unique('religions')->ignore($id)]
        ]);
     
        $gender -> update([
            'name_ar' => $request ->name_ar,
            'name_en' => $request ->name_en
        ]);
        return redirect()->route('genders')->with('success' , __('main.updated'));
    }
    }

    public function destroyGender($id){
          $gender = Gender::find($id);
        if($gender){
            $gender -> delete();
             redirect()->route('genders')->with('success' , __('main.deleted'));
        }
    }


         public function nationalties(){
        $nationalties = Nationality::all();
        return view('cpanel.Nationalty.index' , [
            'nationalties' => $nationalties
        ] );
    }
    public function createNationality(){
        return view('cpanel.Nationalty.create');
    }

    public function storeNationality(Request $request){
        $validated = $request->validate([
            'name_ar' => 'required|unique:religions',
            'name_en' => 'required|unique:religions',
        ]);
     
        Nationality::Create([
            'name_ar' => $request ->name_ar,
            'name_en' => $request ->name_en
        ]);
        return redirect()->route('nationalties')->with('success' , __('main.created'));

    }
    public function editNationality($id){
        $nationaltie = Nationality::find($id);
        if($nationaltie){
            return view('cpanel.Nationalty.edit' ,  [
                'nationaltie' => $nationaltie
            ]);
        }
    }
    public function updateNationality(Request $request , $id){
        $nationaltie = Nationality::find($id);
        if($nationaltie){
        $validated = $request->validate([
            'name_ar' => ['required' , Rule::unique('religions')->ignore($id)],
            'name_en' => ['required' , Rule::unique('religions')->ignore($id)]
        ]);
     
        $nationaltie -> update([
            'name_ar' => $request ->name_ar,
            'name_en' => $request ->name_en
        ]);
        return redirect()->route('nationalties')->with('success' , __('main.updated'));
    }
    }

    public function destroyNationality($id){
          $nationaltie = Nationality::find($id);
        if($nationaltie){
            $nationaltie -> delete();
             redirect()->route('genders')->with('success' , __('main.deleted'));
        }
    }
    
}