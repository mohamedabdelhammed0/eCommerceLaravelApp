<?php

namespace App\Http\Controllers;

use App\Category;
use App\Product;
use Illuminate\Http\Request;

class keswaController extends Controller
{
   public function index(){
       $categories = Category::all();
       $fourProducts = Product::inRandomOrder()->take(12)->get();
       $products = Product::all();
       return view('welcome',['categories'=>$categories,'products'=>$products,'fourProducts'=>$fourProducts]);
   }

   public function updateSize( $id,Request $request){
       $product = Product::find($id);
//       dd($product);
       $product->sizes()->sync($request->size);
       return back();
   }
}
