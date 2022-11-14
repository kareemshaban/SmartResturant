<?php

namespace App\Http\Controllers;

use App\Models\Departments;
use App\Models\Education;
use App\Models\Employee;
use App\Models\Gender;
use App\Models\Jobs;
use App\Models\MaritalStatus;
use App\Models\Nationality;
use App\Models\Religions;
use Exception;
use Illuminate\Database\QueryException;
use Illuminate\Http\Request;

class EmployeeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $employees = Employee::with('Job') -> get();

        return view ('cpanel.Employee.index' , ['employees' => $employees   ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $religions = Religions::all();
        $genders = Gender::all();
        $nationalties = Nationality::all();
        $martialStats = MaritalStatus::all();
        $educations = Education::all();
        $departments = Departments::all();
        $jobs = Jobs::all();

        return view('cpanel.Employee.create' , [
          'religions' => $religions , 
          'genders' => $genders , 
          'nationalties' => $nationalties ,
          'martialStats' => $martialStats ,
          'educations' => $educations,
          'departments' => $departments,
          'jobs' => $jobs
        ]);
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
            'name_en' => 'required',
             'job_id' =>'required'
        ]);

        try{
            Employee::create([
                'name_ar' => $request ->name_ar,
                'name_en' => $request ->name_en,
                'department_id' => $request ->department_id,
                'job_id' => $request ->job_id,
                'religion_id' => $request ->religion_id,
                'gender_id' => $request ->gender_id,
                'nationalty_id' => $request ->nationalty_id,
                'martialState_id' => $request ->martialState_id,
                'ID_number' => $request ->ID_number,
                'child_number' => $request ->child_number,
                'birth_date' => $request ->birth_date ,
                'education_id' => $request ->education_id,
                'work_hours' => $request ->work_hours,
                'week_off_days' => $request ->week_off_days,
                'phone' => $request ->phone,
                'mobile' => $request ->mobile,
                'email' => $request ->email,
                'postal_code' => $request ->postal_code,
                'fax_number' => $request ->fax_number,
                'address' => $request ->address,
            ]);

            return redirect()->route('employees')->with('success' , __('main.created'));
        } catch(QueryException  $ex){
            return redirect()->route('employees')->with('error' , $ex->getMessage());
        }

      

    



    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Employee  $employee
     * @return \Illuminate\Http\Response
     */
    public function show(Employee $employee)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Employee  $employee
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $employee = Employee::find($id);
        if($employee){
        $religions = Religions::all();
        $genders = Gender::all();
        $nationalties = Nationality::all();
        $martialStats = MaritalStatus::all();
        $educations = Education::all();
        $departments = Departments::all();
        $jobs = Jobs::all();

        return view('cpanel.Employee.edit' , [
           'employee' => $employee , 
          'religions' => $religions , 
          'genders' => $genders , 
          'nationalties' => $nationalties ,
          'martialStats' => $martialStats ,
          'educations' => $educations,
          'departments' => $departments,
          'jobs' => $jobs
        ]);
        }
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Employee  $employee
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request,  $id)
    {
        $employee = Employee::find($id);
        if($employee){
        $validated = $request->validate([
            'name_ar' => 'required',
            'name_en' => 'required',
             'job_id' =>'required'
        ]);

        try{
            $employee -> update([
                'name_ar' => $request ->name_ar,
                'name_en' => $request ->name_en,
                'department_id' => $request ->department_id,
                'job_id' => $request ->job_id,
                'religion_id' => $request ->religion_id,
                'gender_id' => $request ->gender_id,
                'nationalty_id' => $request ->nationalty_id,
                'martialState_id' => $request ->martialState_id,
                'ID_number' => $request ->ID_number,
                'child_number' => $request ->child_number,
                'birth_date' => $request ->birth_date ,
                'education_id' => $request ->education_id,
                'work_hours' => $request ->work_hours,
                'week_off_days' => $request ->week_off_days,
                'phone' => $request ->phone,
                'mobile' => $request ->mobile,
                'email' => $request ->email,
                'postal_code' => $request ->postal_code,
                'fax_number' => $request ->fax_number,
                'address' => $request ->address,
            ]);

            return redirect()->route('employees')->with('success' , __('main.updated'));
        } catch(QueryException  $ex){
            return redirect()->route('employees')->with('error' , $ex->getMessage());
        }
    }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Employee  $employee
     * @return \Illuminate\Http\Response
     */
    public function destroy( $id)
    {
        $employee = Employee::find($id);
        if($employee){
            try{
               $employee -> delete();
               return redirect()->route('employees')->with('success' , __('main.deleted'));
            }catch(QueryException  $ex){
                return redirect()->route('employees')->with('error' , $ex->getMessage());
            }
        }
    }
}
