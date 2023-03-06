<?php

namespace App\Http\Controllers;

use App\Models\Rolses;
use App\Models\User;
use App\Models\UserRolses;
use Couchbase\Role;
use Illuminate\Http\Request;

class UserRolsesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $users = User::all();
        $roles = Rolses::all();
        return view('cpanel.roles.index' , compact('users' , 'roles'));
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
            'user_id' => 'required'
        ]);

        //return $request ;
     $roles = UserRolses::where('user_id' , '=' , $request -> user_id) -> get();
        foreach( $roles  as $role){
            $role -> delete();
        }
//
       for ($i = 0 ; $i < count($request -> role_id ) ; $i++ ){
          if($request -> has_role[$i] == "1" ){

                  UserRolses::create([
                      'user_id' => $request -> user_id,
                      'role_id' => $request -> role_id[$i]
                  ]);

          }

       }
        return redirect()->route('user_roles')->with('success', __('main.created'));

    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\UserRolses  $userRolses
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $roles = UserRolses::where('user_id' , '=' , $id) -> get();
        echo json_encode($roles);
        exit();
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\UserRolses  $userRolses
     * @return \Illuminate\Http\Response
     */
    public function edit(UserRolses $userRolses)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\UserRolses  $userRolses
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, UserRolses $userRolses)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\UserRolses  $userRolses
     * @return \Illuminate\Http\Response
     */
    public function destroy(UserRolses $userRolses)
    {
        //
    }
}
