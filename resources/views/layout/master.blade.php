<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Carbon - Admin Template</title>
    <link href="/css/app.css" rel="stylesheet" type="text/css">
    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/v/bs4/dt-1.10.16/af-2.2.2/b-1.5.1/b-colvis-1.5.1/b-html5-1.5.1/b-print-1.5.1/fc-3.2.4/fh-3.1.3/r-2.2.1/sl-1.2.5/datatables.min.css"/>
</head>
<body class="sidebar-fixed header-fixed">
<div class="page-wrapper">
    @include('layout.navbar')
    <div class="main-container">
        @include('layout.sidebar')
        @yield('content')
    </div>
</div>
<script src="{{asset('js/app.js')}}"></script>
<!-- <script src="https://cdn.datatables.net/1.10.16/js/jquery.dataTables.min.js"></script> -->
<script src="{{asset('js/dashboard/chart.min.js')}}"></script>
<script src="{{asset('js/dashboard/carbon.js')}}"></script>
<script src="{{asset('js/dashboard/demo.js')}}"></script>
</body>
</html>
