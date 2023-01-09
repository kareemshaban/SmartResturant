<?php

namespace App\Http\Controllers;

use App\Models\Client;
use App\Models\Machine;
use App\Models\Shift;
use App\Models\User;
use Illuminate\Http\Request;

class ReportController extends Controller
{
    //
    public function report_total(){
        $clients = Client::all();
        $machines = Machine::all();
        $users = User::all();
        return view('cpanel.Reports.report_total' , ['clients' => $clients , 'machines' => $machines , 'users' => $users]);
    }
    public function report_total_search(){

    }
}
