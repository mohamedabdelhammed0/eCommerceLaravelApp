<div class="container-fluid">

    @extends('layouts.app')
    @section('content')
        @auth()
            <div class="row m-5">
                <div class="col">
                    <a href="{{route('products.create')}}" class="btn btn-success mt-auto">اضافة</a>
                </div>
            </div>
        @endauth
        @if (session()->has('success'))
            <div class="alert alert-success">
                {{session()->get('success')}}
            </div>
        @elseif(session()->has('update'))
            <div class="alert alert-info">
                {{session()->get('update')}}
            </div>
        @elseif(session()->has('destroy'))
            <div class="alert alert-danger">
                {{session()->get('destroy')}}
            </div>
        @elseif(session()->has('addToCart'))
            <div class="alert alert-danger">
                {{session()->get('destroy')}}
            </div>
        @endif

        <div class="row justify-content-center">
            @foreach($products  as $product)

                <div class="card col-3 text-center m-1 " style="width: 18rem;">
                    <img class="card-img-top" src="{{asset('/storage/'.$product->image)}}" alt="Card image cap"
                         style="height: 300px">
                    <div class="card-body">
                        <p class="card-text">{{$product->name}}</p>
                        <p class="card-text"><strong>{{$product->price}}</strong> ج </p>
                        <a href="/products/{{$product->id}}" class="btn btn-primary mt-auto">عرض</a>
                    </div>
                </div>

            @endforeach
        </div>


</div>


<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"
        integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj"
        crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js"
        integrity="sha384-9/reFTGAW83EW2RDu2S0VKaIzap3H66lZH81PoYlFhbGU+6BZp6G7niu735Sk7lN"
        crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"
        integrity="sha384-B4gt1jrGC7Jh4AgTPSdUtOBvfO8shuf57BaghqFfPlYxofvL8/KUEfYiJOMMV+rV"
        crossorigin="anonymous"></script>
@endsection
