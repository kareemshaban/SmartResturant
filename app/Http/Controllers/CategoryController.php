<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Item;
use App\Models\Printer;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;

class CategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $categories = Category::all();
        $printers = Printer::all() ;
        return view('cpanel.Category.index' , ['categories' => $categories , 'printers' => $printers]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $printers = Printer::all() ;
        return view('cpanel.Category.create' , ['printers' => $printers]);
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

                $validated = $request->validate([
                    'name_ar' => 'required|unique:categories',
                    'name_en' => 'required|unique:categories'
                ]);

            if($request -> has('img')){
                if ($request->file('img')->getSize() / 1000 > 2000) {
                    return redirect()->route('items')->with('error', __('main.img_big'));
                }
                $imageName = time() . '.' . $request->img->extension();
                $request->img->move(('images/Category'), $imageName);
            } else {
                $imageName = 'default_cat.png';
            }



                Category::create([
                    'name_ar' => $request->name_ar,
                    'name_en' => $request->name_en,
                    'printer' => $request->printer,
                    'img' => $imageName,

                ]);
                return redirect()->route('categories')->with('success', __('main.created'));




        } else {
            return  $this -> update($request , $request -> id);
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Category  $category
     * @return \Illuminate\Http\Response
     */
    public function show(Category $category)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Category  $category
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $printers = Printer::all() ;
        $category = Category::find($id);
        if($category){
            return view('cpanel.Category.edit' , ['printers' => $printers , 'category' => $category]);
        }
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Category  $category
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request,$id)
    {
        $category = Category::find($id);
        if($category){
            if($request->img){
                if($request->file('img')->getSize() / 1000 < 2000){
                    $imageName = time().'.'.$request->img->extension();
                    $request->img->move(('images/Category'), $imageName);

                } else {
                    return redirect()->route('createCategory')->with('error' , __('main.img_big'));
                }

            } else {
                $imageName  =  $category -> img ;
            }
            $validated = $request->validate([
                'name_ar' => ['required' , Rule::unique('categories')->ignore($id)],
                'name_en' => ['required' , Rule::unique('categories')->ignore($id)],
            ]);
            $category -> update([
                'name_ar' => $request -> name_ar,
                'name_en' => $request -> name_en,
                'printer' => $request -> printer,
                'img' => $imageName,

            ]);
            return redirect()->route('categories')->with('success' , __('main.updated'));




        }


    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Category  $category
     * @return \Illuminate\Http\Response
     */
    public function destroy( $id)
    {
        $items = Item::where('category_id' , '=' , $id) -> get();
        if(count($items) == 0){
            $category = Category::find($id);
            if($category){
                $category -> delete();
                return redirect()->route('categories')->with('success' , __('main.deleted'));

            }
        } else {
            return redirect()->route('categories')->with('success' , __('main.can_not_delete'));
        }


    }
    public function getCategory($id){
        $category = Category::find($id);
        echo json_encode($category);
        exit();
    }
}
