<!DOCTYPE html>
<html lang="en">

<head>
    <title>@yield('title','Eshop | ECommerce Platform')</title>
    <meta charset="UTF-8" />
    <meta name="description" content=" Divisima | eCommerce Template" />
    <meta name="keywords" content="divisima, eCommerce, creative, html" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <link href="img/favicon.ico" rel="shortcut icon" />
    <link href="https://fonts.googleapis.com/css?family=Josefin+Sans:300,300i,400,400i,700,700i" rel="stylesheet" />

    <link rel="stylesheet" href="/assets/frontend/css/bootstrap.min.css" />
    <link rel="stylesheet" href="/assets/frontend/css/font-awesome.min.css" />
    <link rel="stylesheet" href="/assets/frontend/css/flaticon.css" />
    <link rel="stylesheet" href="/assets/frontend/css/slicknav.min.css" />
    <link rel="stylesheet" href="/assets/frontend/css/jquery-ui.min.css" />
    <link rel="stylesheet" href="/assets/frontend/css/owl.carousel.min.css" />
    <link rel="stylesheet" href="/assets/frontend/css/animate.css" />
    <link rel="stylesheet" href="/assets/frontend/css/style.css" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.css">

</head>

<body>
    <div id="preloder">
        <div class="loader"></div>
    </div>
    @include('frontend.partials.header')

    @yield('content')

    @include('frontend.partials.footer')

    <script src="/assets/frontend/js/jquery-3.2.1.min.js"></script>
    <script src="/assets/frontend/js/bootstrap.min.js"></script>
    <script src="/assets/frontend/js/jquery.slicknav.min.js"></script>
    <script src="/assets/frontend/js/owl.carousel.min.js"></script>
    <script src="/assets/frontend/js/jquery.nicescroll.min.js"></script>
    <script src="/assets/frontend/js/jquery.zoom.min.js"></script>
    <script src="/assets/frontend/js/jquery-ui.min.js"></script>
    <script src="/assets/frontend/js/main.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.js"></script>

    @include('backend.partials.messages')

    @yield('scripts')

</body>

</html>