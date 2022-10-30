<?php

namespace App\Http\Controllers;

use App\Category;
use App\Http\Requests\ValidateCategory;
use App\Product;
use Illuminate\Http\Request;

class CategoriesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $categories = Category::all();
        return view('categories.index',['categories'=>$categories]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('categories.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(ValidateCategory $request)
    {

        $id = new Category();
        $id->name = $request->name;
        $id->image = $request->image->store('img','public');
        $id->save();
        session()->flash('success','تم انشاء القسم بنجاح');
        return redirect('categories');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $id = Category::find($id);
        return view('categories.show',['id'=>$id]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $id = Category::find($id);
        return view('categories.create',['id'=>$id]);
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
        $id = Category::find($id);
        $id->name = $request->name;
        if($request->image){
            \Storage::disk('public')->delete($id->image);
            $id->image = $request->image->store('img','public');
        }

        $id->save();
        session()->flash('update','تم تحديث القسم بنجاح');
        return redirect('categories');

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $id = Category::find($id);
        \Storage::disk('public')->delete($id->image);
        $id->delete();

        session()->flash('destroy', 'تم حذف القسم  بنجاح');
        return redirect('categories');
    }

}
