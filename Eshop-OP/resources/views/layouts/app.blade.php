<!DOCTYPE HTML>
<html lang="en">
<head>
<meta charset="utf-8">
<meta http-equiv="pragma" content="no-cache" />
<meta http-equiv="cache-control" content="max-age=604800" />
<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

<title>OP-Eshop</title>
<link href="{{asset('user/assets/images/favicon.ico')}}" rel="shortcut icon" type="image/x-icon">

<!-- jQuery -->
<script src="{{asset('user/assets/js/jquery-2.0.0.min.js')}}"  type="text/javascript"></script>
<script src="{{asset('user/assets/js/jquery-sessition.js')}}" type="text/javascript"></script>

<!-- Bootstrap4 files-->
<script src="{{asset('user/assets/js/bootstrap.bundle.min.js')}}" type="text/javascript"></script>
<link href="{{asset('user/assets/css/bootstrap.css')}}" rel="stylesheet" type="text/css"/>

<!-- Font awesome 5 -->
<link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.1/css/all.min.css" type="text/css" rel="stylesheet">
<script src="{{asset('//cdn.jsdelivr.net/npm/sweetalert2@11')}}"></script>
<!-- custom style -->
<link href="{{asset('user/assets/css/ui.css')}}" rel="stylesheet" type="text/css"/>
<link href="{{asset('user/assets/css/responsive.css')}}" rel="stylesheet" type="text/css" />

<!-- custom javascript -->
<script src="{{asset('user/assets/js/script.js')}}" type="text/javascript"></script>
{{-- login --}}
</head>
<body>
    @include('partials.header')
    @yield('content')
    @include('partials.footer')
    </body>
</html>