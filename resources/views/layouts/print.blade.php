<!doctype html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <link rel="icon" href="{{asset('dash/img/icon.jpg')}}" type="image/png" />

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Stylesheet
======================= -->
    <link rel="stylesheet" type="text/css" href="{{asset('print/vendor/bootstrap/css/bootstrap.min.css')}}">
    <link rel="stylesheet" type="text/css" href="{{asset('print/vendor/font-awesome/css/all.min.css')}}">
    <link rel="stylesheet" type="text/css" href="{{asset('print/css/stylesheet.css')}}">

</head>




<body>

    @yield('content')

</body>

</html>
