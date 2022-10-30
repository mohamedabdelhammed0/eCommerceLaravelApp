<!doctype html>
<html lang="ar" dir="rtl">
<head>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}"></script>

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">

    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-beta.1/dist/css/select2.min.css" rel="stylesheet"/>

</head>
<body>
<div id="app">

    <nav class="navbar navbar-light bg-light">
        <div class="d-flex">
            <a class="nav-link" href="{{ route('cart.index') }}">
                <h4>
                                <span class="badge-warning">
                                    {{ \Cart::session('_token')->getContent()->count()}}
                                </span>
                </h4>
                <img
                    src="https://encrypted-tbn0.gstatic.com/images?q=tbn%3AANd9GcQqaC9O5tPYfUIk1P5sNo9XxvC0ecblZa0mtQ&usqp=CAU"
                    alt="" style="width: 50px;height: 50px">
            </a>
        </div>


        <a href="/categories">
            <button class="btn btn-sm btn-outline-secondary" type="button">الاقسام</button>
        </a>
{{--        @auth()--}}
            <a href="/orders">
                <button class="btn btn-sm btn-outline-secondary" type="button">الطلبات</button>
            </a>
        <a href="/products">
            <button class="btn btn-sm btn-outline-secondary" type="button">المنتجات</button>
        </a>
{{--        @endauth--}}

    </nav>

    <main class="py-4">
        @yield('content')
    </main>
</div>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js"
        integrity="sha384-9/reFTGAW83EW2RDu2S0VKaIzap3H66lZH81PoYlFhbGU+6BZp6G7niu735Sk7lN"
        crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"
        integrity="sha384-B4gt1jrGC7Jh4AgTPSdUtOBvfO8shuf57BaghqFfPlYxofvL8/KUEfYiJOMMV+rV"
        crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-beta.1/dist/js/select2.min.js"></script>

</body>
</html>
