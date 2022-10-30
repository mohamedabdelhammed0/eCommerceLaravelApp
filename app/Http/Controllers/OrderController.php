<?php

namespace App\Http\Controllers;

use App\Order;
use App\Size;
use Illuminate\Http\Request;

class OrderController extends Controller
{
//    public  function __construct()
//    {
//        return $this->middleware('auth')->only(['index','show','destroy']);
//    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $orders = Order::all();
//        dd(session());
        return view('orders.index', compact('orders'));
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
        $order = new Order();
        $order->name = $request->name;
        $order->phone = $request->phone;
        $order->total = $request->total;
        $order->products = $request->products;

        $order->save();
        $request->session()->flush();
        session()->flash('addToOrder','تم تسجيل الطلب الخاص بكم وسيت التواصل معاكم عبر الواتس اب بنفس الرقم المسجل لاتمام عملية الشراء');

        return redirect('/');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Order  $order
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $user = Order::FindOrFail($id);
//        dd($user);
        return view('orders.single', compact('user'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Order  $order
     * @return \Illuminate\Http\Response
     */
    public function edit(Order $order)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Order  $order
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Order $order)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Order  $order
     * @return \Illuminate\Http\Response
     */
    public function destroy(Order $id)
    {
//        dd($id);
        $id->delete();
        return  redirect('orders');
    }
}
