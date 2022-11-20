<?php

namespace App\Http\Controllers;

use App\Models\Shift;
use App\Models\Size;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Date;

class ShiftController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $shift = Shift::where('user_id' , '=' , Auth::user() -> id)
            -> where('state' , '=' , 0 )->get();
        if(count($shift) == 0){
            return view('cpanel.Shift.start' , ['user' => Auth::user() -> id , 'name' => Auth::user() -> name]);
        }else {
            return view('cpanel.Shift.end' , ['user' => Auth::user() -> id , 'name' => Auth::user() -> name ,
                    'shift' => $shift[0] -> id]);


        }
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
            'user_id' => 'required',
            'start_money' => 'required'
        ]);

        Shift::Create([
            'user_id' => $request ->user_id,
            'start_at' => Carbon::now(),
            'state' => 0 ,
            'start_money' => $request ->start_money,

        ]);
        return redirect() -> route('home');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Shift  $shift
     * @return \Illuminate\Http\Response
     */
    public function show(Shift $shift)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Shift  $shift
     * @return \Illuminate\Http\Response
     */
    public function edit(Shift $shift)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Shift  $shift
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $shift = Shift::find($id);
        if($shift){
            $validated = $request->validate([
                'user_id' => 'required',
                'end_money' => 'required'
            ]);

            $shift -> update([
               'end_at' => Carbon::now(),
               'state' => 1 ,
                'end_money' => $request -> end_money
            ]);
            return redirect() -> route('home');
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Shift  $shift
     * @return \Illuminate\Http\Response
     */
    public function destroy(Shift $shift)
    {
        //
    }
}
