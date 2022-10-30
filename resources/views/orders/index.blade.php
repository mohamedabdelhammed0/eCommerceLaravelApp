@extends('layouts.app')
@section('content')
    <div class="container">
        <div class="row">
            <div class="col-12 my-4">
                <h2>
                   اضغط علي الأسم  لمشاهدة جميع المنتجات المطلوبة
                </h2>
            </div>
            <div class="col-12">
                <table class="table">
                    <thead>
                    <tr>
                        <th scope="col">id</th>
                        <th scope="col">الاسم</th>
                        <th scope="col">الرقم</th>
                        <th scope="col">حذف</th>

                    </tr>
                    </thead>
                    <tbody>
                    @foreach($orders as $order)
                        <tr>
                            <th scope="row">{{$order->id}}</th>
                            <td><a href="{{route('order.show', $order->id)}}">{{$order->name}}</a></td>
                            <td>{{$order->phone}}</td>
                            <td>
                                <form method="POST" action="{{route('order.destroy',$order->id)}}">

                                    @csrf
                                <button class="btn btn-danger" type="submit">حذف</button>
                            </form>
                            </td>
                        </tr>
                    @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
@endsection
