@extends('layouts.app')
@section('content')
    <div class="container">
        <div class="row">
            <div class="col-12">
            @foreach($items as $row)
                    <div class="card h-35 ">
                        <div class="row m-auto">

                            <div class="col-8">
                                <div class="text-center pt-4">
                                    <label for="" style="color: #ff185e">اسم المنتج</label>
                                    <h5 class="card-title">{{$row->name}}</h5>
                                    <br>
                                    <div class="d-flex">
                                    <label class="ml-2" for="" style="color: #ff185e">سعر المنتج</label>

                                    <p class="card-text ml-2">{{$row->price}} جنيه</p>
                                    <label for="" style="color: #ff185e">الحجم</label>

                                    <p class="card-text mr-2">{{$row->attributes[0]['size']}}</p>
                                    </div>
                                    <a href="{{route('cart.cancel',$row->id)}}" ><button class="btn btn-danger mb-2 ">الغاء</button></a>
                                </div>
                            </div>
                            <div class="col-4">
                                <img style="width: 100px;height: 100px" class="img-fluid mt-5" src="{{asset('/storage/'.$row->associatedModel->image)}}" alt="">
                            </div>
                        </div>
                    </div>


            @endforeach
            </div>
        </div>
            <div class="container">
                <div class="card text-right mt-3" style="">
                    <div class="card-body ">
                        <h5 class="card-title">عربة التسوق ({{$subTotal}})   جنيه  </h5>
                        <br>
                        <p style="color: #1f9c29">"لأتمام عملية الشراء ادخل الأسم ورقم الهاتف وسيتم التواصل معكم من خلال تطبيق الواتس اب"</p>
                        <form method="POST" action="{{route('orders.store')}}">
                            @csrf
                            <div class="form-group">
                                <label for="exampleInputEmail1">الاسم</label>
                                <input type="text" name="name" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="ادخل الاسم ثلاثي">
                            </div>
                            <div class="form-group">
                                <label for="exampleInputPassword1">رقم الهاتف</label>
                                <input type="text" name="phone" class="form-control" id="exampleInputPassword1" placeholder="رقم الهاتف">
                            </div>
                        <input type="hidden" name="products" value="{{$items}}">
                        <input type="hidden" name="total" value="{{$subTotal}}">
                            <button type="submit" class="btn btn-primary">تاكيد الطلب</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>







@endsection
