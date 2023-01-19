<?php

namespace App\Http\Controllers;

use App\Models\ItemSizes;
use App\Models\Size;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;
class SizeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $sizes = Size::all();
        return view ('cpanel.Size.index' , ['sizes' => $sizes]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view ('cpanel.Size.create');
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
                'name_ar' => 'required|unique:sizes',
                'name_en' => 'required|unique:sizes',
                'label' => 'required|unique:sizes'
            ]);

        Size::Create([
            'name_ar' => $request ->name_ar,
            'name_en' => $request ->name_en,
            'label' =>$request ->label,


        ]);
        return redirect()->route('sizes')->with('success' , __('main.created'));
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Size  $size
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {

    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Size  $size
     * @return \Illuminate\Http\Response
     */
    public function edit( $id)
    {
        $size = Size::find($id);
        if($size){
            return view ('cpanel.Size.edit' , ['size' => $size]);
        }
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Size  $size
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request,  $id)
    {
        $size = Size::find($id);
        if($size){
            $validated = $request->validate([
                'name_ar' => ['required' , Rule::unique('sizes')->ignore($id)],
                'name_en' => ['required' , Rule::unique('sizes')->ignore($id)],
                'label' => ['required' , Rule::unique('sizes')->ignore($id)],
            ]);

           $size -> update([
            'name_ar' => $request ->name_ar,
            'name_en' => $request ->name_en,
             'label'=> $request ->name_en
           ]);
           return redirect()->route('sizes')->with('success' , __('main.updated'));
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Size  $size
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $itemSizes = ItemSizes::where('size_id' , '=' , $id) -> get();
        if(count($itemSizes) == 0){
            $size = Size::find($id);
            if($size){
                $size -> delete();
                return redirect()->route('sizes')->with('success' , __('main.deleted'));
            }
        } else {
            return redirect()->route('sizes')->with('success' , __('main.can_not_delete'));
        }

    }
}
