<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>{{$title}}</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="" />
    <meta name="keywords" content="" />
    <link href="{{asset("resources/images/cm-logo.png")}}" rel="icon">
    <link rel="stylesheet" type="text/css" href="{{asset("resources/css/animate.css")}}">
    <link rel="stylesheet" type="text/css" href="{{asset('resources/css/bootstrap.min.css')}}">
    <link rel="stylesheet" type="text/css" href="{{asset('resources/css/line-awesome.css')}}">
    <link rel="stylesheet" type="text/css" href="{{asset("resources/css/line-awesome-font-awesome.min.css")}}">
    <link rel="stylesheet" type="text/css" href="{{asset("resources/css/font-awesome.min.css")}}">
    <link rel="stylesheet" type="text/css" href="{{asset("resources/lib/slick/slick.css")}}">
    <link rel="stylesheet" type="text/css" href="{{asset("resources/lib/slick/slick-theme.css")}}">
    <link rel="stylesheet" type="text/css" href="{{asset('resources/css/style.css')}}">
    <link rel="stylesheet" type="text/css" href="{{asset("resources/css/responsive.css")}}">
    @yield('header_script')
</head>


<body class="sign-in">
<div class="wrapper">
    @yield("content")
</div><!--theme-layout end-->



<script type="text/javascript" src="{{asset("resources/js/jquery.min.js")}}"></script>
<script type="text/javascript" src="{{asset("resources/js/popper.js")}}"></script>
<script type="text/javascript" src="{{asset("resources/js/bootstrap.min.js")}}"></script>
<script type="text/javascript" src="{{asset("resources/lib/slick/slick.min.js")}}"></script>
<script type="text/javascript" src="{{asset("resources/js/script.js")}}"></script>
<script type="text/javascript" src="{{asset("resources/js/jquery.validate.js")}}"></script>
@yield("footer_script")
</body>
</html>

