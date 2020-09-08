<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>@yield('title') | {{ config('app.name') }} - Admin</title>

    <link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700" rel="stylesheet">

    <link rel="stylesheet" href="/assets/backend/dist/css/adminlte.min.css">
    <link rel="stylesheet" href="/assets/backend/plugins/fontawesome-free/css/all.min.css">
    <link rel="stylesheet" href="/assets/backend/plugins/datatables-bs4/css/dataTables.bootstrap4.min.css">
    <link rel="stylesheet" href="/assets/backend/plugins/select2/css/select2.min.css" rel="stylesheet" />
    <link rel="stylesheet" href="/assets/backend/plugins/select2-bootstrap4-theme/select2-bootstrap4.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.css">
    <link rel="stylesheet"
        href="https://cdnjs.cloudflare.com/ajax/libs/jasny-bootstrap/3.1.3/css/jasny-bootstrap.min.css">
    <link href="https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote.min.css" rel="stylesheet">

</head>

<body class="hold-transition sidebar-mini layout-fixed layout-navbar-fixed">
    <div class="wrapper">

        <!-- Header -->
        @include('backend.partials.header')
        <!-- /.header -->

        <!-- Main Sidebar Container -->
        @include('backend.partials.sidebar')

        <!-- Content Wrapper. Contains page content -->
        <div class="content-wrapper">
            @include('backend.partials.errors')

            @yield('content')
        </div>

        <!-- /.content-wrapper -->

        <!-- Main Footer -->
        @include('backend.partials.footer')
    </div>
    <!-- ./wrapper -->

    <script src="/assets/backend/plugins/jquery/jquery.min.js"></script>
    <script src="/assets/backend/plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
    <script src="/assets/backend/plugins/datatables/jquery.dataTables.min.js"></script>
    <script src="/assets/backend/plugins/datatables-bs4/js/dataTables.bootstrap4.min.js"></script>
    <script src="/assets/backend/plugins/datatables-responsive/js/dataTables.responsive.min.js"></script>
    <script src="/assets/backend/plugins/datatables-responsive/js/responsive.bootstrap4.min.js"></script>
    <script src="/assets/backend/plugins/select2/js/select2.min.js"></script>
    <script src="/assets/backend/dist/js/adminlte.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jasny-bootstrap/3.1.3/js/jasny-bootstrap.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote.min.js"></script>

    @include('backend.partials.messages')
    @yield('scripts')
</body>

</html>