@extends('layouts.app')
@section('stylesheet')
    <link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-beta.1/dist/css/select2.min.css" rel="stylesheet" />
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

    @if (session()->has('addCategory'))
        <div class="alert alert-success">
            {{session()->get('addCategory')}}
        </div>
    @endif

    <div class="container">
        <div class="row">
            <form  enctype="multipart/form-data"  class="ml-4 py-4" method="post" action="{{isset($id) ? route('categories.update',['category'=>$id]) : route('categories.store')}}">
                @if(isset($id))
                    @method("PUT")
                @endif
                @csrf

                <div class="form-group">
                    <label for=""> اسم القسم</label>
                    <input type="text" class="form-control" value="{{isset($id) ? $id->name : ""}}" name="name" aria-describedby="emailHelp" placeholder="اسم القسم">
                </div>
                <label for="">صورة القسم</label>
                <div class="form-group">
                    @if(isset($id))
                            <img src={{asset('/storage/'.$id->image)}} alt="img" >
                    @endif
                    <input type="file" class="form-control" value="{{isset($id) ? $id->image : ""}}" name="image"  >
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
    <script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-beta.1/dist/js/select2.min.js"></script>
    <script>
        $(document).ready(function() {
            $('.js-example-basic-multiple').select2();
        });
    </script>
@endsection
