<?php

namespace App\Http\Controllers;

use App\Models\BillDetails;
use App\Models\Category;
use App\Models\Item;
use App\Models\ItemSizes;
use Illuminate\Database\QueryException;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;

class ItemController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $items = Item::with('cayegory') -> get();
        $categories = Category::all();

        return view('cpanel.Items.index' , ['items' => $items , 'categories' => $categories]);

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $categories = Category::all();
        return view('cpanel.Items.create' , ['categories' => $categories]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        if($request -> id == 0) {
            if ($request->file('img')->getSize() / 1000 < 2000) {
                $validated = $request->validate([
                    'code' => 'required|unique:items',
                    'name_ar' => 'required|unique:items',
                    'name_en' => 'required|unique:items',
                    'type' => 'required',
                    'category_id' => 'required',
                    'img' => 'required'
                ]);

                $imageName = time() . '.' . $request->img->extension();
                $request->img->move(('images/Item'), $imageName);
                try {
                    Item::create([
                        'code' => $request->code,
                        'name_ar' => $request->name_ar,
                        'name_en' => $request->name_en,
                        'type' => $request->type,
                        'category_id' => $request->category_id,
                        'description_ar' => $request->description_ar,
                        'description_en' => $request->description_en,
                        'img' => $imageName,
                        'isAddValue' => $request->isAddValue == 'on' ? 1 : null,
                        'addValue' => $request->addValue

                    ]);
                    return redirect()->route('items')->with('success', __('main.created'));
                } catch (QueryException $ex) {
                    return redirect()->route('items')->with('error', $ex->getMessage());
                }


            } else {
                return redirect()->route('createItem')->with('error', __('main.img_big'));

            }
        } else {
            return  $this -> update($request , $request-> id);
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Item  $item
     * @return \Illuminate\Http\Response
     */
    public function show(Item $item)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Item  $item
     * @return \Illuminate\Http\Response
     */
    public function edit( $id)
    {
        $item = Item::find($id);

        if($item){
            $categories = Category::all();
            return view('cpanel.Items.edit' , ['item' => $item ,  'categories' => $categories]);
        }
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Item  $item
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request , $id)
    {
        $item = Item::find($id);
        if($item) {
            if($request->img){
                if($request->file('img')->getSize() / 1000 < 2000){
                    $imageName = time().'.'.$request->img->extension();
                    $request->img->move(('images/Item'), $imageName);

                } else {
                    return redirect()->route('createItem')->with('error' , __('main.img_big'));
                }

            } else {
                $imageName  =  $item -> img ;
            }
            $validated = $request->validate([
                'code' => ['required' , Rule::unique('items')->ignore($id)],
                'name_ar' => ['required' , Rule::unique('items')->ignore($id)],
                'name_en' => ['required' , Rule::unique('items')->ignore($id)],
                'type' => 'required',
                'category_id' => 'required'
            ]);

            try{
                $item -> update([
                   'code' => $request -> code,
                   'name_ar' => $request -> name_ar,
                   'name_en' => $request -> name_en,
                   'type' => $request -> type,
                   'category_id' => $request -> category_id,
                   'description_ar' => $request -> description_ar,
                   'description_en' => $request -> description_en,
                   'img' => $imageName,
                   'isAddValue' => $request -> isAddValue == 'on' ? 1 : null,
                   'addValue' => $request -> addValue

               ]);
               return redirect()->route('items')->with('success' , __('main.updated'));
             } catch(QueryException $ex){
               return redirect()->route('items')->with('error' ,  $ex->getMessage());
             }
        }

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Item  $item
     * @return \Illuminate\Http\Response
     */
    public function destroy( $id)
    {
        $bills = BillDetails::where('item_id' , '=' , $id) -> get();
        $itemSizes = ItemSizes::where('item_id' , '=' , $id) -> get();
        if(count($bills) == 0 && count($itemSizes) == 0){
            $item = Item::find($id);
            if($item) {
                $item -> delete();
                return redirect()->route('items')->with('success' , __('main.deleted'));


            }
        } else {
            return redirect()->route('items')->with('success' , __('main.can_not_delete'));
        }

    }
    public function getItem($id){
        $item = Item::find($id);
        echo  json_encode($item);
        exit();
    }
}
