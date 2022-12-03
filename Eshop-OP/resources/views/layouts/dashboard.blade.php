<!DOCTYPE html>
<html>

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link rel="apple-touch-icon" sizes="76x76" href="./assets/img/apple-icon.png" />
    <link rel="icon" type="image/png" href="./assets/img/favicon.png" />
    <title>Argon Dashboard 2 Tailwind by Creative Tim</title>
    <!--     Fonts and icons     -->
    <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,400,600,700" rel="stylesheet" />
    <!-- Font Awesome Icons -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>

{{-- <script src="{{asset('user/assets/js/jquery-2.0.0.min.js')}}"  type="text/javascript"></script> --}}
    {{-- //thu vien alert --}}
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
<script src="{{asset('user/assets/js/jquery-sessition.js')}}" type="text/javascript"></script>
    
<script src="https://kit.fontawesome.com/42d5adcbca.js" crossorigin="anonymous"></script>
    <!-- Nucleo Icons -->
    <link href="{{asset('/user/assets/css/nucleo-icons.css')}}" rel="stylesheet" />
    <link href="{{asset('/user/assets/css/nucleo-svg.css')}}" rel="stylesheet" />
    <!-- Popper -->
    <script src="https://unpkg.com/@popperjs/core@2"></script>

    <!-- Main Styling -->
    <link href="{{asset('/user/assets/css/argon-dashboard-tailwind.css')}}" rel="stylesheet" />
    <!-- <link href="{{asset('/user/assets/css/argon-dashboard-tailwind.min.css')}}" rel="stylesheet" /> -->
    <!-- <script src="https://cdn.tailwindcss.com"></script> -->
</head>

<body
    class="m-0 font-sans text-base antialiased font-normal dark:bg-slate-900 leading-default bg-gray-50 text-slate-500">
    <div class="absolute w-full bg-blue-500 dark:hidden min-h-75"></div>
    <!-- sidenav  -->
    @include('partials.menu')

    <!-- end sidenav -->

    <main class="relative h-full max-h-screen transition-all duration-200 ease-in-out xl:ml-68 rounded-xl">
        <!-- Navbar -->
        @include('partials.headerdashboard')

        <!-- end Navbar -->

        <!-- cards -->
        @yield('contentt')

        @include('partials.setting')
       
    </main>

</body>
<!-- plugin for charts  -->
<!-- <script src="./assets/js/plugins/chartjs.min.js" async></script> -->
<!-- plugin for scrollbar  -->
<!-- <script src="./assets/js/plugins/perfect-scrollbar.min.js" async></script> -->
<!-- main script file  -->

<!-- <script src="{{asset('./assets/js/argon-dashboard-tailwind.js?v=1.0.1')}}" async></script>
<script src="{{asset('/user/assets/js/dashboard/argon-dashboard-tailwind.js')}} async></script>
  <script src=" {{asset('/user/assets/js/dashboard/argon-dashboard-tailwind.min.js')}} async></script>
<script src="{{asset('/user/assets/js/dashboard/carousel.js')}} async></script>
  <script src=" {{asset('/user/assets/js/dashboard/charts.js')}} async></script>
<script src="{{asset('/user/assets/js/dashboard/dropdown.js')}} async></script>
  <script src=" {{asset('/user/assets/js/dashboard/fixed-plugin')}} async></script>
<script src="{{asset('/user/assets/js/dashboard/nav-pills.js')}} async></script>
  <script src=" {{asset('/user/assets/js/dashboard/navbar-collapse.js')}} async></script>
<script src="{{asset('/user/assets/js/dashboard/navbar-sticky.js')}} async></script>
  <script src=" {{asset('/user/assets/js/dashboard/perfect-scrollbar.js')}} async></script>
<script src="{{asset('/user/assets/js/dashboard/sidenav-burger.js')}} async></script>
  <script src=" {{asset('/user/assets/js/dashboard/tooltips.js')}} async></script> -->

<script src="/user/assets/js/dashboard/argon-dashboard-tailwind.js?v=1.0.1" async></script>
<script src="/user/assets/js/dashboard/argon-dashboard-tailwind.min.js" async></script>
<script src="/user/assets/js/dashboard/carousel.js" async></script>
<script src="/user/assets/js/dashboard/charts.js" async></script>
<script src="/user/assets/js/dashboard/dropdown.js" async></script>
<script src="/user/assets/js/dashboard/fixed-plugin.js" async></script>
<script src="/user/assets/js/dashboard/navbar-collapse.js" async></script>
<script src="/user/assets/js/dashboard/navbar-sticky.js" async></script>
<script src="/user/assets/js/dashboard/nav-pills.js" async></script>
<script src="/user/assets/js/dashboard/perfect-scrollbar.js" async></script>
<script src="/user/assets/js/dashboard/sidenav-burger.js" async></script>
<script src="/user/assets/js/dashboard/tooltips.js" async></script>

<script src="/user/assets/js/dashboard/plugins/Chart.extension.js" async></script>
<script src="/user/assets/js/dashboard/plugins/chartjs.min.js" async></script>
<script src="/user/assets/js/dashboard/plugins/perfect-scrollbar.min.js" async></script>

</html>