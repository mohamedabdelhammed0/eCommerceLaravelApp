@extends('layouts.app')
@section('stylesheet')
@endsection
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



    <div class="container">
        <div class="row">
            <form  enctype="multipart/form-data"  class="ml-4 py-4" method="post" action="{{isset($id) ? route('products.update',['product'=>$id]) : route('products.store')}}">
                @if(isset($id))
                    @method("PUT")
                @endif
                @csrf

                <div class="form-group">
                    <label for="">اسم المنتج</label>
                        <input type="text" class="form-control" value="{{isset($id) ? $id->name : ""}}" name="name" aria-describedby="emailHelp" placeholder="اخل الاسم">
                </div>
                    <label for="">سعر المنتج</label>
                <div class="form-group">
                    <input type="text" class="form-control" value="{{isset($id) ? $id->price : ""}}" name="price" aria-describedby="emailHelp" placeholder="ادخل السعر">
                </div>
                    <label for="">اضف صورة</label>
                <div class="form-group">
                    @if(isset($id))
                        <img src={{asset('/storage/'.$id->image)}} alt="img">
                    @endif
                    <input type="file" class="form-control" value="{{isset($id) ? $id->image : ""}}" name="image">
                </div>
                    <label for="">الاحجام المتاحة</label>
                    <div class="form-group">
                        <select class="w-25 p-3 js-example-basic-multiple "  style="width: 300px;" name="size[]"  multiple  >
                            @foreach($sizes as $tag)
                                <option value="{{$tag->id}}"
                                        @if(isset($id))
                                        @if($id->hasTags($tag->id))
                                        selected
                                    @endif
                                    @endif
                                >

                                    {{$tag->name}}
                                </option>
                            @endforeach
                        </select>
                    </div>

                <div class="form-group">
                    <label for="s">القسم التابع له المنتج</label>
                    <select id="s" class="form-control form-control-sm" name="category_id" >
                        @foreach($categories as $category)
                            <option value="{{$category->id}}">{{$category->name}}</option>
                        @endforeach
                    </select>
                </div>
                <div class="form-group">
                    <br>
                    <br>
                    <br>
                    <button type="submit" class="btn btn-primary">{{isset($id)? "تحديث" : "اضافة"}}</button>
                </div>
            </form>
        </div>
    </div>
    <script>
        $(document).ready(function() {
            $('.js-example-basic-multiple').select2();
        });
    </script>
@endsection
