<?php

namespace App\Http\Controllers;

use App\Models\Bill;
use App\Models\BillDetails;
use App\Models\Recipt;
use App\Models\Shift;
use Barryvdh\DomPDF\Facade\Pdf;
use Carbon\Carbon;
use Illuminate\Http\Request;
use App\Models\Religions ;
use App\Models\Departments ;
use App\Models\Gender ;
use App\Models\Nationality ;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;
use Illuminate\Validation\Rule;
use App\Models\MaritalStatus ;
use App\Models\Jobs ;
use App\Models\Education ;
use App\Models\Country ;
use App\Models\City ;
use App\Models\Governorate ;
use ArPHP\I18N\Arabic;

class DashboradController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index(){
        $sales_total = 0 ;
        $sales_tax = 0 ;
        $items_total = 0 ;
        $total_expenses = 0 ;
        $sales = Bill::all();
        $expenses = Recipt::all();
        $details = [] ;
        foreach ($sales as $bill){
            if(Carbon::parse($bill -> bill_date) -> format('d-m-y') == Carbon::now() -> format('d-m-y') ) {
                $sales_total += $bill->total;
                $sales_tax += $bill->vat;
                $details = BillDetails::where('bill_id' , '=' , $bill -> id ) -> get();
                foreach ($details as $detail){
                    $items_total += $detail -> qnt ;
                }
                $details = [] ;
            }
        }



        foreach ($expenses as $bill){
            if(Carbon::parse($bill -> doc_date) -> format('d-m-y') == Carbon::now() -> format('d-m-y') ){
                $total_expenses += $bill -> amount_with_tax ;
            }

        }
        return view('home' , compact('sales_tax' , 'sales_total' , 'items_total' , 'total_expenses'));

    }
    public function checkShift(){
        $shift = Shift::where('user_id' , '=' , Auth::user() -> id)
            -> where('state' , '=' , 0 )->get();
        echo json_encode ($shift );
        exit;
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


    public function maritalStatus(){
        $status = MaritalStatus::all();
        return view('cpanel.MartialStatus.index' , [
            'status' => $status
        ] );
    }
    public function createMaritalStatus(){
        return view('cpanel.MartialStatus.create');
    }

    public function storeMaritalStatus(Request $request){
        $validated = $request->validate([
            'name_ar' => 'required|unique:religions',
            'name_en' => 'required|unique:religions',
        ]);

        MaritalStatus::Create([
            'name_ar' => $request ->name_ar,
            'name_en' => $request ->name_en
        ]);
        return redirect()->route('maritalStatus')->with('success' , __('main.created'));

    }
    public function editMaritalStatus($id){
        $maritalStatus = MaritalStatus::find($id);
        if($maritalStatus){
            return view('cpanel.MartialStatus.edit' ,  [
                'maritalStatus' => $maritalStatus
            ]);
        }
    }
    public function updateMaritalStatus(Request $request , $id){
        $maritalStatus = MaritalStatus::find($id);
        if($maritalStatus){
        $validated = $request->validate([
            'name_ar' => ['required' , Rule::unique('religions')->ignore($id)],
            'name_en' => ['required' , Rule::unique('religions')->ignore($id)]
        ]);

        $maritalStatus -> update([
            'name_ar' => $request ->name_ar,
            'name_en' => $request ->name_en
        ]);
        return redirect()->route('maritalStatus')->with('success' , __('main.updated'));
    }
    }

    public function destroyMaritalStatus($id){
        $maritalStatus = MaritalStatus::find($id);
                if($maritalStatus){
            $maritalStatus -> delete();
             redirect()->route('maritalStatus')->with('success' , __('main.deleted'));
        }
    }


    public function jobs(){
        $jobs = Jobs::all();
        return view('cpanel.Jobs.index' , [
            'jobs' => $jobs
        ] );
    }
    public function createJob(){
        return view('cpanel.Jobs.create');
    }

    public function storeJob(Request $request){
        $validated = $request->validate([
            'name_ar' => 'required|unique:religions',
            'name_en' => 'required|unique:religions',
        ]);

        Jobs::Create([
            'name_ar' => $request ->name_ar,
            'name_en' => $request ->name_en
        ]);
        return redirect()->route('jobs')->with('success' , __('main.created'));

    }
    public function editJob($id){
        $job = Jobs::find($id);
        if($job){
            return view('cpanel.Jobs.edit' ,  [
                'job' => $job
            ]);
        }
    }
    public function updateJob(Request $request , $id){
        $job = Jobs::find($id);
        if($job){
        $validated = $request->validate([
            'name_ar' => ['required' , Rule::unique('religions')->ignore($id)],
            'name_en' => ['required' , Rule::unique('religions')->ignore($id)]
        ]);

        $job -> update([
            'name_ar' => $request ->name_ar,
            'name_en' => $request ->name_en
        ]);
        return redirect()->route('jobs')->with('success' , __('main.updated'));
    }
    }

    public function destroyJob($id){
        $job = Jobs::find($id);
                if($job){
            $job -> delete();
             redirect()->route('jobs')->with('success' , __('main.deleted'));
        }
    }


    public function educations(){
        $educations = Education::all();
        return view('cpanel.Education.index' , [
            'educations' => $educations
        ] );
    }
    public function createEducation(){
        return view('cpanel.Education.create');
    }

    public function storeEducation (Request $request){
        $validated = $request->validate([
            'name_ar' => 'required|unique:religions',
            'name_en' => 'required|unique:religions',
        ]);

        Education::Create([
            'name_ar' => $request ->name_ar,
            'name_en' => $request ->name_en
        ]);
        return redirect()->route('educations')->with('success' , __('main.created'));

    }
    public function editEducation($id){
        $education = Education::find($id);
        if($education){
            return view('cpanel.Education.edit' ,  [
                'education' => $education
            ]);
        }
    }
    public function updateEducation(Request $request , $id){
        $education = Education::find($id);
        if($education){
        $validated = $request->validate([
            'name_ar' => ['required' , Rule::unique('religions')->ignore($id)],
            'name_en' => ['required' , Rule::unique('religions')->ignore($id)]
        ]);

        $education -> update([
            'name_ar' => $request ->name_ar,
            'name_en' => $request ->name_en
        ]);
        return redirect()->route('educations')->with('success' , __('main.updated'));
    }
    }

    public function destroyEducation($id){
        $education = Education::find($id);
                if($education){
            $education -> delete();
             redirect()->route('educations')->with('success' , __('main.deleted'));
        }
    }
    public function countries(){
        $countries = Country::all();
        return view('cpanel.Country.index' , [
            'countries' => $countries
        ] );
    }
    public function createCountry(){
        return view('cpanel.Country.create');
    }

    public function storeCountry (Request $request){
        $validated = $request->validate([
            'name_ar' => 'required|unique:religions',
            'name_en' => 'required|unique:religions',
        ]);

        Country::Create([
            'name_ar' => $request ->name_ar,
            'name_en' => $request ->name_en
        ]);
        return redirect()->route('countries')->with('success' , __('main.created'));

    }
    public function editCountry($id){
        $country = Country::find($id);
        if($country){
            return view('cpanel.Country.edit' ,  [
                'country' => $country
            ]);
        }
    }
    public function updateCountry(Request $request , $id){
        $country = Country::find($id);
        if($country){
        $validated = $request->validate([
            'name_ar' => ['required' , Rule::unique('religions')->ignore($id)],
            'name_en' => ['required' , Rule::unique('religions')->ignore($id)]
        ]);

        $country -> update([
            'name_ar' => $request ->name_ar,
            'name_en' => $request ->name_en
        ]);
        return redirect()->route('countries')->with('success' , __('main.updated'));
    }
    }

    public function destroyCountry($id){
        $country = Country::find($id);
                if($country){
            $country -> delete();
             redirect()->route('countries')->with('success' , __('main.deleted'));
        }
    }

    public function governorates(){
        $governorates = Governorate::with('country' , 'cities') -> get();

        return view('cpanel.Governorate.index' , [
            'governorates' => $governorates
        ] );
    }
    public function createGovernorate(){
        $countries = Country::all();
        return view('cpanel.Governorate.create' , ['countries' => $countries]);
    }

    public function storeGovernorate (Request $request){
        $validated = $request->validate([
            'name_ar' => 'required|unique:religions',
            'name_en' => 'required|unique:religions',
             'country_id' =>'required'
        ]);

        Governorate::Create([
            'name_ar' => $request ->name_ar,
            'name_en' => $request ->name_en,
            'country_id' => $request -> country_id

        ]);
        return redirect()->route('governorates')->with('success' , __('main.created'));

    }
    public function editGovernorate($id){
        $governorate = Governorate::find($id);
        $countries = Country::all();
        if($governorate){
            return view('cpanel.Governorate.edit' ,  [
                'governorate' => $governorate ,
                'countries' => $countries
            ]);
        }
    }
    public function updateGovernorate(Request $request , $id){
        $governorate = Governorate::find($id);
        if($governorate){
        $validated = $request->validate([
            'name_ar' => ['required' , Rule::unique('religions')->ignore($id)],
            'name_en' => ['required' , Rule::unique('religions')->ignore($id)],
            'country_id' =>  ['required']
        ]);

        $governorate -> update([
            'name_ar' => $request ->name_ar,
            'name_en' => $request ->name_en,
            'country_id' => $request ->country_id
        ]);
        return redirect()->route('governorates')->with('success' , __('main.updated'));
    }
    }

    public function destroyGovernorate($id){
        $governorate = Governorate::find($id);
                if($governorate){
            $governorate -> delete();
             redirect()->route('governorates')->with('success' , __('main.deleted'));
        }
    }


    public function cities(){
        $cities = City::with('Governorate.country') -> get();
        $governorate = Governorate::all();
        return view('cpanel.City.index' , [
            'cities' => $cities ,
        ] );
    }
    public function createCity(){
        $governorate = Governorate::all();
        return view('cpanel.City.create' , ['governorate' => $governorate]);
    }

    public function storeCity (Request $request){
        $validated = $request->validate([
            'name_ar' => 'required|unique:religions',
            'name_en' => 'required|unique:religions',
             'governorate_id' =>'required'
        ]);

        City::Create([
            'name_ar' => $request ->name_ar,
            'name_en' => $request ->name_en,
            'governorate_id' => $request -> governorate_id

        ]);
        return redirect()->route('cities')->with('success' , __('main.created'));

    }
    public function editCity($id){
        $city = City::find($id);
        $governorate = Governorate::all();
        if($governorate){
            return view('cpanel.City.edit' ,  [
                'city' => $city ,
                'governorate' => $governorate
            ]);
        }
    }
    public function updateCity(Request $request , $id){
        $city = City::find($id);
        if($city){
        $validated = $request->validate([
            'name_ar' => ['required' , Rule::unique('religions')->ignore($id)],
            'name_en' => ['required' , Rule::unique('religions')->ignore($id)],
            'governorate_id' =>  ['required']
        ]);

        $city -> update([
            'name_ar' => $request ->name_ar,
            'name_en' => $request ->name_en,
            'governorate_id' => $request ->governorate_id
        ]);
        return redirect()->route('cities')->with('success' , __('main.updated'));
    }
    }

    public function destroyCity($id){
        $city = City::find($id);
                if($city){
            $city -> delete();
             redirect()->route('cities')->with('success' , __('main.deleted'));
        }
    }
}
