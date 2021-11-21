<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="apple-touch-icon" sizes="76x76" href="  {{ asset('admin/js/img/apple-icon.png') }} ">
    <link rel="icon" type="image/png" href=" {{ asset('admin/js/img/favicon.png') }} ">
    <title>      
    @yield('title')
    </title>
    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}"> 
    <!-- Styles -->
    <link href="{{ asset('frontend/css/bootstrap5.css') }}" rel="stylesheet">
    <link href="{{ asset('frontend/css/custom.css') }}" rel="stylesheet">
    <link href="{{ asset('frontend/css/owl.carousel.min.css') }}" rel="stylesheet">
    <link href="{{ asset('frontend/css/owl.theme.default.min.css') }}" rel="stylesheet">

 <style>
 a{
     text-decoration:none;
     color: black;
 }
 span {cursor:pointer; }
		.number{
			margin:100px;
		}
		.minus, .plus{
			width:30px;
			height:30px;
			background:#f2f2f2;
			border-radius:4px;
			padding:8px 5px 8px 5px;
			border:1px solid #ddd;
         display: inline-block;
         vertical-align: middle;
         text-align: center;
		}
		input{
			height:34px;
      width: 100px;
      text-align: center;
      font-size: 26px;
			border:1px solid #ddd;
			border-radius:4px;
      display: inline-block;
      vertical-align: middle;
      }
 </style>

</head>
<body>
@include('layouts.inc.frontnavbar')
        <div class="content">
           @yield('content')
        </div>  
     <!-- Scripts -->
     <script src="https://code.jquery.com/jquery-3.6.0.min.js" integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>
     <script src="{{asset('frontend/js/bootstrap.bundle.min.js') }}" > </script>
     <script src="{{asset('frontend/js/owl.carousel.min.js') }}" > </script>
     <script src="{{asset('frontend/js/custom.js') }}" > </script>   
     @yield('script')
     <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
     @if(session('status'))
     <script>
     swal("{{session('status')}}", "You clicked the button!", "success");
       </script>
     @endif
</body>
</html>
