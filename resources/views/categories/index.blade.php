@extends('layouts.app')
<div class="row p-0 m-0">
    <div class="col-12 p-0 m-0">
        <img
            src="https://png.pngtree.com/thumb_back/fh260/background/20190223/ourmid/pngtree-gold-gold-low-profile-background-material-low-profilebackground-materialconference-image_69763.jpg"
            alt="" style="width: 100vw">
    </div>
</div>
@section('content')
    @auth()
        <div class="row m-5">
            <div class="col">
                <a href="{{route('categories.create')}}" class="btn btn-success mt-auto">اضافة</a>
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

    @endif
<div class="container">
    <div class="row">
        @foreach($categories  as $category)
            <div class="col-6">
                <a href="{{route('products.category',$category->id)}}" style="text-decoration: none">
                <img class="card-img-top"
                     src="{{asset('/storage/'.$category->image)}}"
                     alt="Card image cap">
                <div class="card-body">
                    <h1 class="card-title" style="color: #00b0e8; text-align: center">{{$category->name}}</h1>

                    @auth()
                        <div class="container-fluid  m-4 justify-content-center">
                            <div class="mr-5">
                                <a href="{{route('categories.edit',$category->id)}}"
                                   class="btn btn-info mt-auto">تعديل</a>
                            </div>
                            <br>
                            <form action="{{route('categories.destroy',$category->id)}}" method="POST">
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
