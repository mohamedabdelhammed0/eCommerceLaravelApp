@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-12">
                <div class="my-3">
                    <p style="color: #ff185e">اسم المشتري</p>
                    <h2>
                        {{$user->name}}
                    </h2>
                </div>
                <div class="my-3">
                    <p style="color: #ff185e">رقم الهاتف</p>
                    <h2>
                        {{$user->phone}}
                    </h2>
                </div>
                <div class="my-3">
                    <p style="color: #ff185e">اجمالي المنتجات</p>
                    <h2>
                        {{$user->total}} ج
                    </h2>
                </div>
            </div>
            <table class="table">
                <thead>
                <tr>
                    <th scope="col">الاسم</th>
                    <th scope="col">السعر</th>
                    <th scope="col">الحجم</th>
                    <th scope="col">الصورة</th>
                    <th scope="col">الحالة</th>

                </tr>
                </thead>
                <tbody>

                @foreach(json_decode($user->products,false) as $product)
                    <tr>
                        <th>{{ $product->{'name'} }}</th>
                        <td>{{ $product->{'price'} }}</td>
                        <td>{{$product->{'attributes'}[0]->{'size'} }}</td>
                                                <td><img src="<?php echo(asset("/storage/" . $product->{'attributes'}[0]->{'image'})); ?>"
                                                         alt="" style="width: 100px;height: 100px"></td>

                        <td><a href="">
                                <button class="btn-sm btn-danger">تم البيع</button>
                            </a></td>

                    </tr>
                @endforeach

                </tbody>
            </table>
        </div>
    </div>
@endsection
