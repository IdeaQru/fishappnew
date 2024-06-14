<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title')</title>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />

    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="title" content="FISH APP">
    <meta name="author" content="Themesberg">
    <meta name="description"
        content="Volt Pro is a Premium Bootstrap 5 Admin Dashboard featuring over 800 components, 10+ plugins and 20 example pages using Vanilla JS.">
    <meta name="keywords"
        content="bootstrap 5, bootstrap, bootstrap 5 admin dashboard, bootstrap 5 dashboard, bootstrap 5 charts, bootstrap 5 calendar, bootstrap 5 datepicker, bootstrap 5 tables, bootstrap 5 datatable, vanilla js datatable, themesberg, themesberg dashboard, themesberg admin dashboard" />
    <link rel="canonical" href="https://themesberg.com/product/admin-dashboard/volt-premium-bootstrap-5-dashboard">

    <!-- Open Graph / Facebook -->
    <meta property="og:type" content="website">
    <meta property="og:url" content="https://demo.themesberg.com/volt-pro">
    <meta property="og:title" content="Volt - Free Bootstrap 5 Dashboard">
    <meta property="og:description"
        content="Volt Pro is a Premium Bootstrap 5 Admin Dashboard featuring over 800 components, 10+ plugins and 20 example pages using Vanilla JS.">
    <meta property="og:image"
        content="https://themesberg.s3.us-east-2.amazonaws.com/public/products/volt-pro-bootstrap-5-dashboard/volt-pro-preview.jpg">

    <!-- Twitter -->
    <meta property="twitter:card" content="summary_large_image">
    <meta property="twitter:url" content="https://demo.themesberg.com/volt-pro">
    <meta property="twitter:title" content="Volt - Free Bootstrap 5 Dashboard">
    <meta property="twitter:description"
        content="Volt Pro is a Premium Bootstrap 5 Admin Dashboard featuring over 800 components, 10+ plugins and 20 example pages using Vanilla JS.">
    <meta property="twitter:image"
        content="https://themesberg.s3.us-east-2.amazonaws.com/public/products/volt-pro-bootstrap-5-dashboard/volt-pro-preview.jpg">

    <!-- Favicon -->
    <link rel="apple-touch-icon" sizes="120x120" href="{{asset('volt/assets/img/favicon/apple-touch-icon.png')}}">
    <link rel="icon" type="image/png" sizes="32x32" href="{{asset('volt/assets/img/favicon/favicon-32x32.png')}}">
    <link rel="icon" type="image/png" sizes="16x16" href="{{asset('volt/assets/img/favicon/favicon-16x16.png')}}">
    <link rel="manifest" href="{{asset('volt/assets/img/favicon/site.webmanifest')}}">
    <link rel="mask-icon" href="{{asset('volt/assets/img/favicon/safari-pinned-tab.svg')}}" color="#ffffff">
    <meta name="msapplication-TileColor" content="#ffffff">
    <meta name="theme-color" content="#ffffff">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">

    <!-- Sweet Alert -->
    <link type="text/css" href="{{asset('volt/assets/vendor/sweetalert2/dist/sweetalert2.min.css')}}" rel="stylesheet">

    <!-- Notyf -->
    <link type="text/css" href="{{asset('volt/assets/vendor/notyf/notyf.min.css')}}" rel="stylesheet">

    <!-- Volt CSS -->
    <link type="text/css" href="{{asset('volt/assets/css/volt.css')}}" rel="stylesheet">

    <!-- Other styles and scripts -->
@yield('css')
    <!-- Referensi ke Leaflet JavaScript -->
</head>

<body>

    @include('component.header')
    <main class="content">

    <div class="container-fluid">
        @yield('content')
    </div>
</main>
    <script src="{{asset('volt/vendor/@popperjs/core/dist/umd/popper.min.js')}}"></script>
    <script src="{{asset('volt/vendor/bootstrap/dist/js/bootstrap.min.js')}}"></script>

    <!-- Vendor JS -->
    <script src="{{asset('volt/vendor/onscreen/dist/on-screen.umd.min.js')}}"></script>

    <!-- Slider -->
    <script src="{{asset('volt/vendor/nouislider/distribute/nouislider.min.js')}}"></script>

    <!-- Smooth scroll -->
    <script src="{{asset('volt/vendor/smooth-scroll/dist/smooth-scroll.polyfills.min.js')}}"></script>

    <!-- Charts -->
    <script src="{{asset('volt/vendor/chartist/dist/chartist.min.js')}}"></script>
    <script src="{{asset('volt/vendor/chartist-plugin-tooltips/dist/chartist-plugin-tooltip.min.js')}}"></script>

    <!-- Datepicker -->
    <script src="{{asset('volt/vendor/vanillajs-datepicker/dist/js/datepicker.min.js')}}"></script>

    <!-- Sweet Alerts 2 -->
    <script src="{{asset('volt/endor/sweetalert2/dist/sweetalert2.all.min.js')}}"></script>

    <!-- Moment JS -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.27.0/moment.min.js"></script>

    <!-- Vanilla JS Datepicker -->
    <script src="{{asset('volt/vendor/vanillajs-datepicker/dist/js/datepicker.min.js')}}"></script>

    <!-- Notyf -->
    <script src="{{asset('volt/vendor/notyf/notyf.min.js')}}"></script>

    <!-- Simplebar -->
    <script src="{{asset('volt/vendor/simplebar/dist/simplebar.min.js')}}"></script>

    <!-- Github buttons -->
    <script async defer src="https://buttons.github.io/buttons.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2/dist/umd/popper.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.min.js"></script>

    <!-- Volt JS -->
    <script src="{{asset('volt/assets/js/volt.js')}}"></script>
@stack('javascript')
</body>

</html>
