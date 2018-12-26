<!doctype html>
<html class="no-js" lang="">

<head>
    <meta charset="utf-8">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <title></title>
    <meta name="description" content="">
    <link href="https://fonts.googleapis.com/css?family=Nunito:300,400,600,800" rel="stylesheet">
    <link rel="stylesheet" href="{{asset('front-assets/css/main.css')}}">
    @yield('styles')
</head>
<body>
@include('includes.front.header')
@yield('content')
@include('includes.front.footer')
<script src="{{asset('front-assets/js/main.js')}}"></script>
@yield('scripts')

</body>
</html>
