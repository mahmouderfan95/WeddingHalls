<!DOCTYPE html>
<html class="loading" lang="en" data-textdirection="rtl">
<head>
    @include('layouts.Admin.head_css')
    @yield('css')
</head>
<body class="vertical-layout vertical-menu-modern 2-columns   fixed-navbar" data-open="click"
      data-menu="vertical-menu-modern" data-col="2-columns">
@include('sweetalert::alert')
@include('layouts.Admin.navbar')
@include('layouts.Admin.sidebar')
@yield('content')
<div class="sidenav-overlay"></div>
<div class="drag-target"></div>
@include('layouts.Admin.footer')
@include('layouts.Admin.footer_js')
@include('sweetalert::alert', ['cdn' => "https://cdn.jsdelivr.net/npm/sweetalert2@9"])
@stack('js')
</body>
</html>
