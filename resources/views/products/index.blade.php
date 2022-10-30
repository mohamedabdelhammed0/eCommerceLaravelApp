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
    <div class="container">
        <div class="row">
            @foreach($products  as $category)
                <div class="col-3">
                    <a href="{{route('products.show',$category->id)}}" style="text-decoration: none">
                        <img class="card-img-top"
                             src="{{asset('/storage/'.$category->image)}}"
                             alt="Card image cap">
                        <div class="card-body">
                            <p class="card-title" style="
                            max-width: 10000px;
                            overflow: hidden;
                             display: -webkit-box;
                             -webkit-line-clamp: 2;
                              -webkit-box-orient: vertical;
                              text-align: center;
                            color: #0d310a; text-align: center">{{$category->name}}</p>

                            @auth()
                                <div class="container-fluid  m-4 justify-content-center">
                                    <div class="mr-5">
                                        <a href="{{route('products.edit',$category->id)}}"
                                           class="btn btn-info mt-auto">تعديل</a>
                                    </div>
                                    <br>
                                    <form action="{{route('products.destroy',$category->id)}}" method="POST">
                                        @method("DELETE")
                                        @csrf

                                        <button type="submit" class="btn btn-danger mt-auto">حذف</button>
                                    </form>
                                </div>
                            @endauth
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
