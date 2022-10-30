<?php

namespace App\Http\Controllers;
use App\Http\Requests\ValidateProduct;
use App\Product;
use Illuminate\Contracts\Session\Session;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;

class CartController extends Controller
{

   public function add(Request $request,Product $product){
           \Cart::session('_token')->add(array(
           'id' => $product->id,
           'name' => $product->name,
           'price' => $product->price,
           'quantity' => 1,
           'attributes' => array([
               'size'=>$request->size,
               'image'=>$product->image
           ]),
           'associatedModel' => $product
       ));
           session()->flash('addToCart','تم اضافة العنصر الي العربة بنجاح');

       return redirect('/');
   }
   public  function index(Request $request){
      $d = json_decode(\Cart::session('_token')->getContent('size'),true);
//      dd($d);
      $count    = \Cart::session('_token')->getContent()->count();
      $items    = \Cart::session('_token')->getContent();
      $subTotal = \Cart::getSubTotal();


       return view('cart.index',['items'=>$items,'count'=>$count,'subTotal'=>$subTotal]);
   }

   public function cancel($id){
       $items  = \Cart::session('_token')->getContent();
        $product = Product::find($id);
       $cartCollection = \Cart::getContent();
        $arr = $cartCollection->toArray();
       \Cart::session('_token')->remove($product->id);
       return back();
   }
}
