<?php

namespace App\Http\Controllers;

use App\Product;
use Illuminate\Http\Request;

class QuantityController extends Controller
{
    public function create(){
        $products = Product::all();
        return view('products.product-quantity', compact('products'));
    }
}
