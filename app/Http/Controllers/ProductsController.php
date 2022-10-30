<?php

namespace App\Http\Controllers;

use App\Category;
use App\Http\Requests\ValidateProduct;
use App\Product;
use App\Size;
use Illuminate\Http\Request;

class ProductsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function categoryShow($id){
        $categories = Category::find($id)->products;
        return view('products.specific',['categories'=>$categories]);
    }

    public function index()
    {
        $products = Product::all();
        return view('products.index',['products'=>$products]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {

        $sizes = Size::all();
        $categories = Category::all();
        if($categories->isEmpty()){
            session()->flash('addCategory','يجب اضافة قسم واحد علي الاقل قبل اضافة اي منتجات');
            return redirect('categories/create');
      }
        return view('products.create',['categories'=>$categories,'sizes'=>$sizes]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(ValidateProduct $request)
    {
        $id = new Product();
        $id->name = $request->name;

        $id->price = $request->price;
        $id->category_id = $request->category_id;
        $id->image = $request->image->store('img','public');
        $id->save();
        $id->sizes()->attach($request->size);
        session()->flash('success','تم اضافة المنتج بنجاح');
        return redirect('products');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $sizes = Size::all();
        $id = Product::find($id);
        return view('products.show',['id'=>$id,'sizes'=>$sizes]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $id = Product::find($id);
        $categories = Category::all();
        $sizes = Size::all();
        return view('products.create',['id'=>$id,'categories'=>$categories,'sizes'=>$sizes]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
//        dd($request);
        $id = Product::find($id);
        $id->name = $request->name;
        if($request->image){
            \Storage::disk('public')->delete($id->image);
            $id->image = $request->image->store('img', 'public');
        }
        $id->price = $request->price;

        $id->save();
        $id->sizes()->sync($request->size);
        session()->flash('update','تم تحديث القسم بنجاح');
        return redirect('products');

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $id = Product::find($id);
        \Storage::disk('public')->delete($id->image);
        $id->delete();

        session()->flash('destroy', 'تم حذف المنتج  بنجاح');
        return redirect('products');
    }
}
