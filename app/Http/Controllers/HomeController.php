<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $sales_total = 0 ;
        $sales_tax = 0 ;
        $purchase_total = 0 ;
        $total_expenses = 0 ;
      return view('home' , compact('sales_tax' , 'sales_total' , 'purchase_total' , 'total_expenses'));

    }
    public function getUser(){
        $user = Auth::user();
        echo json_encode($user -> machine_id);
        exit;
    }
    public function clearSession($key){
        if (Session::has($key))
        {
            Session::forget($key);

        }
    }

}
