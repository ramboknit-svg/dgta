<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta http-equiv="x-ua-compatible" content="ie=edge">

    <title>DGTA</title>
     {{-- DataTables Bootstrap 4 CSS --}}
<link
    rel="stylesheet"
    href="{{asset('public/dist/css/dataTables.bootstrap4.min.css')}}"
    nonce="{{ app('cspNonce') }}"
>
    <!-- Font Awesome Icons -->
    <link rel="stylesheet" href="{{asset('public/plugins/fontawesome-free/css/all.min.css')}}">
    <!-- overlayScrollbars -->
    <link rel="stylesheet" href="{{asset('public/plugins/overlayScrollbars/css/OverlayScrollbars.min.css')}}">
    <!-- Theme style -->
    <link rel="stylesheet" href="{{asset('public/dist/css/adminlte.min.css')}}">
    
    <link rel="stylesheet" href="{{asset('public/dist/css/style.css')}}">
    {{-- DataTables Bootstrap 4 CSS --}}


    <meta name="csrf-token" content="{{ csrf_token() }}">
   <link rel="icon" href="{{ asset('public/website/images/indian-aermy-1.png') }}" sizes="32x32" />

    @yield('after-style')
    <!-- Google Font: Source Sans Pro -->
    
</head>
<body class="hold-transition sidebar-mini layout-fixed layout-navbar-fixed layout-footer-fixed">
<div class="wrapper">

    @include('admin.partials.header')

    @include('admin.partials.left_sidebar')

    <div class="wrapper">
        @yield('content')
    </div>

</div>
@include('admin.partials.footer_js')
</body>
</html>
