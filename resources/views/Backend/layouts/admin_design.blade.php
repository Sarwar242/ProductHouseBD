<!DOCTYPE html>
<html lang="en">

<head>
    <title>Admin | Cosmoline</title>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link rel="stylesheet" href="{{ asset('css/backend_css/bootstrap.min.css')}}" />
    <link rel="stylesheet" href="{{ asset('css/backend_css/bootstrap-responsive.min.css')}}" />
    <link rel="stylesheet" href="{{ asset('css/backend_css/jquery.dataTables.min.css')}}" />
    <link rel="stylesheet" href="{{ asset('css/backend_css/select2.css')}}" />
    <link rel="stylesheet" href="{{ asset('css/backend_css/fullcalendar.css')}}" />
    <link rel="stylesheet" href="{{ asset('css/backend_css/matrix-style.css')}}" />
    <link rel="stylesheet" href="{{ asset('css/backend_css/matrix-media.css')}}" />

    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/3.0.0/css/font-awesome.css" rel="stylesheet" />
    <link rel="stylesheet" href="{{ asset('css/backend_css/jquery.gritter.css')}}" />

    <link href='http://fonts.googleapis.com/css?family=Open+Sans:400,700,800' rel='stylesheet' type='text/css'>
    <link rel="stylesheet" href="{{ asset('css/backend_css/backend.css')}}" />
</head>

<body>

    @include('Backend.layouts.admin_header')

    @include('Backend.layouts.admin_sidebar')

    @yield('content')

    @include('Backend.layouts.admin_footer')
    @yield('scripts')



    <!-- from from_validation.html -->

    <script src="{{ asset('js/backend_js/jquery.min.js')}}"></script>
    <script src="{{ asset('js/backend_js/jquery.ui.custom.js')}}"></script>
    <script src="{{ asset('js/backend_js/bootstrap.min.js')}}"></script>
    <script src="{{ asset('js/backend_js/select2.min.js')}}"></script>
    <script src="{{ asset('js/backend_js/jquery.dataTables.min.js')}}"></script>
    <script type="text/javascript">
    $(document).ready(function() {
        $('#dataTable').DataTable();
    });
    const myapplink="http://127.0.0.1:8000";
    const myapplocallink="http://127.0.0.1:8000";
    </script>

    <script src="{{ asset('js/backend_js/jquery.validate.js')}}"></script>
    <script src="{{ asset('js/backend_js/matrix.js')}}"></script>
    {{-- <script src="{{ asset('js/backend_js/matrix.form_validation.js')}}"></script> --}}
    {{-- <script src="{{ asset('js/backend_js/matrix.tables.js')}}"></script> --}}

</body>

</html>
