
<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8" />
        <title>SHC</title>
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta content="width=device-width, initial-scale=1" name="viewport" />
        <meta content="Preview page of Metronic Admin Theme #2 for buttons extension demos" name="description" />
        <meta content="" name="author" />
        <meta name="csrf-token" content="{{ csrf_token() }}">
        <link href="http://fonts.googleapis.com/css?family=Open+Sans:400,300,600,700&subset=all" rel="stylesheet" type="text/css" />
        <link href="{{ asset('css/font-awesome.min.css') }}" rel="stylesheet" type="text/css" />
        <!-- <link href="{{ asset('css/simple-line-icons.min.css') }}" rel="stylesheet" type="text/css" /> -->
        <link href="{{ asset('css/bootstrap.min.css') }}" rel="stylesheet" type="text/css" />
        <link href="{{ asset('css/bootstrap-switch.min.css') }}" rel="stylesheet" type="text/css" />
        <link href="{{ asset('css/datatables.min.css') }}" rel="stylesheet" type="text/css" />
        <link href="{{ asset('css/datatables.bootstrap.css') }}" rel="stylesheet" type="text/css" />
        <link href="{{ asset('css/components-md.min.css') }}" rel="stylesheet" id="style_components" type="text/css" />
        <link href="{{ asset('css/plugins-md.min.css') }}" rel="stylesheet" type="text/css" />
        <link href="{{ asset('css/layout.min.css') }}" rel="stylesheet" type="text/css" />
        <link href="{{ asset('css/blue.min.css') }}" rel="stylesheet" type="text/css" id="style_color" />
        <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.24/css/jquery.dataTables.css">
        <link rel="shortcut icon" href="favicon.ico" />
    </head>

    <body class="page-header-fixed page-sidebar-closed-hide-logo page-container-bg-solid page-md">  
        @include('layouts.navigation')
        <div class="page-container">
            @include('layouts.sidebar')
                @include('sweetalert::alert')
            @yield('content')
        </div>
        <div class="page-footer">
        @include('layouts.footer')
            <div class="quick-nav-overlay"></div>
            <script src="{{ asset('js/jquery.min.js') }}" type="text/javascript"></script>
            <script src="{{ asset('js/bootstrap.min.js') }}" type="text/javascript"></script>
            <script src="{{ asset('js/sweetalert.min.js') }}" type="text/javascript"></script>
            <script src="{{ asset('js/js.cookie.min.js') }}" type="text/javascript"></script>
            <script src="{{ asset('js/bootstrap-switch.min.js') }}" type="text/javascript"></script>
            <script src="{{ asset('js/datatable.js') }}" type="text/javascript"></script>
            <script src="{{ asset('js/datatables.min.js') }}" type="text/javascript"></script>
            <script src="{{ asset('js/datatables.bootstrap.js') }}" type="text/javascript"></script>
            <script src="{{ asset('js/app.min.js') }}" type="text/javascript"></script>
            <script src="{{ asset('js/layout.min.js') }}" type="text/javascript"></script>
            <!-- <script src="{{ asset('js/demo.min.js') }}" type="text/javascript"></script> -->
            <script type="text/javascript" charset="utf8" src="https://cdn.datatables.net/1.10.24/js/jquery.dataTables.js"></script>
            @yield('scripts')
            <script type="text/javascript">
                function goBack() {
                    window.history.back();
                }
            </script>
    </body>

</html>