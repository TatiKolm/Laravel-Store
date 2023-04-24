<!DOCTYPE html>
<html lang="{{ app()->getLocale() }}">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>ElectronicStore - @yield('title')</title>
    <link rel="stylesheet" href="{{asset('assets/css/bootstrap.css')}}">
</head>
<body>
    @include("layouts.header")

    <main>
        <div class="container">
            @yield("content")
        </div>
    </main>


<script src="{{asset('assets/js/bootstrap.bundle.js')}}"></script>
</body>
</html>