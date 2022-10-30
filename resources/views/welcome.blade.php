@extends('layouts.app')
<div class="row p-0 m-0">
    <div class="col-12 p-0 m-0">
        <img
            src="https://png.pngtree.com/thumb_back/fh260/background/20190223/ourmid/pngtree-gold-gold-low-profile-background-material-low-profilebackground-materialconference-image_69763.jpg"
            alt="" style="width: 100vw">
    </div>
</div>
@section('content')

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
        <div class="alert alert-success">
            {{session()->get('addToCart')}}
        </div>
    @elseif(session()->has('addToOrder'))
        <div class="alert alert-success">
            {{session()->get('addToOrder')}}
        </div>
    @endif
    <div class="container">
        <div class="row">
            @foreach($fourProducts as $category)
                <div class="col-4 m-auto">
                    <a href="{{route('products.show',$category->id)}}" style="text-decoration: none">
                        <img class="card-img-top"
                             src="{{asset('/storage/'.$category->image)}}"
                             alt="Card image cap"
                        >
                        <div class="card-body">
                            <p class="card-title" style="max-width: 10000px;
                            overflow: hidden;
                             display: -webkit-box;
                             -webkit-line-clamp: 2;
                              -webkit-box-orient: vertical;
                            color: #e88850; text-align: center">{{$category->name}}</p>
                        </div>
                    </a>

                </div>
            @endforeach
        </div>
    </div>
    <div class="container-fluid ">
        <div class="row" style="background-color: #9b988b">
            <div class="col-12 w-100">
                @if(count(\App\User::all()) ==   0)
                <a href="/register" style="text-decoration: none">
                <h1 class=" pt-2" style="text-align: center;color: #deffdf ">الأقسام</h1>
                </a>
                    @endif
                    <h1 class=" pt-2" style="text-align: center;color: #deffdf ">الأقسام</h1>
            </div>
        </div>
    </div>
    <div class="container mt-3">
        <div class="row">
            @foreach($categories as $category)
                <div class="col-3 ">
                    <a href="{{route('products.category',$category->id)}}" style="text-decoration: none">
                        <img class="card-img-top"
                             src="{{asset('/storage/'.$category->image)}}"
                             alt="Card image cap"
                        >
                        <div class="card-body">
                            <p class="card-title" style="max-width: 10000px;
                            overflow: hidden;
                             display: -webkit-box;
                             -webkit-line-clamp: 2;
                              -webkit-box-orient: vertical;
                            color: #e88850; text-align: center">{{$category->name}}</p>
                        </div>
                    </a>

                </div>
            @endforeach
        </div>
    </div>


    <div class="container-fluid ">
        <div class="row" style="background-color: #9b988b">
            <div class="col-12 w-100">
                <h1 class=" pt-2" style="text-align: center;color: #deffdf ">جميع المنتجات</h1>
            </div>
        </div>
    </div>
    <div class="container mt-3">
        <div class="row">
            @foreach($products as $category)
                <div class="col-4 ">
                    <a href="{{route('products.category',$category->id)}}" style="text-decoration: none">
                        <img class="card-img-top"
                             src="{{asset('/storage/'.$category->image)}}"
                             alt="Card image cap"
                        >
                        <div class="card-body">
                            <p class="card-title" style="max-width: 10000px;
                            overflow: hidden;
                             display: -webkit-box;
                             -webkit-line-clamp: 2;
                              -webkit-box-orient: vertical;
                            color: #e88850; text-align: center">{{$category->name}}</p>
                        </div>
                    </a>

                </div>
            @endforeach
        </div>
    </div>
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js"
            integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN"
            crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js"
            integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q"
            crossorigin="anonymous"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"
            integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl"
            crossorigin="anonymous"></script>
@endsection
