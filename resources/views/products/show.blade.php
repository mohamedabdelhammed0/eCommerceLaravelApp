@extends('layouts.app')

@section('content')
    @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif
    @if (session()->has('addToCart'))
        <div class="alert alert-success">
            {{session()->get('success')}}
        </div>
    @endif
    <div class="container bg-light">
        <div class="row justify-content-center">
            <h1 class="text-center" style="color: #1f7199">{{$id->name}}</h1>
        </div>
        <div class="row">
            <div class="col-sm-4">
                <img src="{{asset('/storage/'.$id->image)}}" >
            </div>
            <div class="col-sm-4">
                <br>
                <h2 style="color: #00b0e8">{{$id->price}} جنيه</h2>
                <br>
                <br>
                <h2>الأحجام المتاحة</h2>
                <form method="POST" action="{{route('cart.add',$id->id)}}">
                    @csrf
                    <div class="form-group">
                        <select name="size">
                            @foreach($id->sizes->pluck('name') as $name)
                                <option value="{{$name}}">
                                    {{$name}}
                                    @endforeach
                                </option>
                        </select>
                        <br>
                        <br>
                        <br>
                        <br>
                    </div>
                    <button type="submit" class="btn " style="color: white;background-color: #ff810f">اضف الي العربة
                    </button>
                </form>
                <br>
                <br>
                @if(auth()->user())
                    <div class="d-flex">
                        <form method="POST" action="{{route('products.destroy',['product'=>$id->id])}}">
                            @method("DELETE")
                            @csrf
                            <button type="submit" class="btn btn-danger m-2">حذف</button>
                        </form>

                        <a href="/products/{{$id->id}}/edit">
                            <button type="button" class="btn btn-primary m-2">تعديل</button>
                        </a>
                    </div>
            </div>
            @endif
        </div>
    </div>
    <script>
        $(document).ready(function () {
            $('.js-example-basic-multiple').select2();
        });
    </script>
@endsection
