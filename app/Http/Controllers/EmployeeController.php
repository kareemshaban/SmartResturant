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
        //
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
    public function edit(Employee $employee)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Employee  $employee
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Employee $employee)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Employee  $employee
     * @return \Illuminate\Http\Response
     */
    public function destroy(Employee $employee)
    {
        //
    }
}
