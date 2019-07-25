<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>@yield('title_prefix', config('adminlte.title_prefix', ''))
@yield('title', config('adminlte.title', 'AdminLTE 2'))
@yield('title_postfix', config('adminlte.title_postfix', ''))</title>
    <!-- Tell the browser to be responsive to screen width -->
    <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
    <!-- Bootstrap 3.3.7 -->
    <link rel="stylesheet" href="{{ asset('vendor/adminlte/vendor/bootstrap/dist/css/bootstrap.min.css') }}">
    <!-- Font Awesome -->
    <link rel="stylesheet" href="{{ asset('vendor/adminlte/vendor/font-awesome/css/font-awesome.min.css') }}">
    <!-- Ionicons -->
    <link rel="stylesheet" href="{{ asset('vendor/adminlte/vendor/Ionicons/css/ionicons.min.css') }}">

    @if(config('adminlte.plugins.select2'))
        <!-- Select2 -->
        <link rel="stylesheet" href="//cdnjs.cloudflare.com/ajax/libs/select2/4.0.3/css/select2.css">
    @endif

    <!-- Theme style -->
    <link rel="stylesheet" href="{{ asset('vendor/adminlte/dist/css/AdminLTE.min.css') }}">

    @if(config('adminlte.plugins.datatables'))
        <!-- DataTables -->
        <link rel="stylesheet" href="//cdn.datatables.net/1.10.15/css/jquery.dataTables.min.css">
    @endif

    @yield('adminlte_css')

    <!--[if lt IE 9]>
    <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
    <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->

    <!-- Google Font -->
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,600,700,300italic,400italic,600italic">

    <style>
        .btn_1 {
            display: inline-block;
            padding: 8.5px 15px;
            border-radius: 50px;
            font-size: 14px;
            color: #fff;
            background-image: linear-gradient(to right, #ee390f, #f9b700, #ee390f);
            -o-transition: all .4s ease-in-out;
            -webkit-transition: all .4s ease-in-out;
            transition: all .4s ease-in-out;
            text-transform: capitalize;
            background-size: 200% auto;
            border: 1px solid transparent;
            box-shadow: 0px 12px 20px 0px rgba(255, 126, 95, 0.15);
        }

            /* line 38, E:/172 Etrain Education/172_Etrain_Education_html/sass/_button.scss */
        .btn_1:hover {
            color: #fff !important;
            background-image: linear-gradient(to left, #ee390f 0%, #f9b700 51%, #ee390f 100%);
            background-position: right center;
            box-shadow: 0px 10px 30px 0px rgba(193, 34, 10, 0.2);
        }  

        .btn_2 {
            display: inline-block;
            padding: 8.5px 15px;
            border-radius: 50px;
            font-size: 14px;
            color: #fff;
            background-image: linear-gradient(to right, #28a745, #33cc00, #28a745);
            -o-transition: all .4s ease-in-out;
            -webkit-transition: all .4s ease-in-out;
            transition: all .4s ease-in-out;
            text-transform: capitalize;
            background-size: 200% auto;
            border: 1px solid transparent;
            box-shadow: 0px 12px 20px 0px rgba(255, 126, 95, 0.15);
        }

            /* line 38, E:/172 Etrain Education/172_Etrain_Education_html/sass/_button.scss */
        .btn_2:hover {
            color: #fff !important;
            background-image: linear-gradient(to left, #28a745 0%, #33cc00 51%, #28a745 100%);
            background-position: right center;
            box-shadow: 0px 10px 30px 0px rgba(193, 34, 10, 0.2);
        }  

        .btn_3 {
            display: inline-block;
            padding: 8.5px 15px;
            border-radius: 50px;
            font-size: 14px;
            color: #fff;
            background-image: linear-gradient(to right, #6c757d, #bbc0c4, #6c757d);
            -o-transition: all .4s ease-in-out;
            -webkit-transition: all .4s ease-in-out;
            transition: all .4s ease-in-out;
            text-transform: capitalize;
            background-size: 200% auto;
            border: 1px solid transparent;
            box-shadow: 0px 12px 20px 0px rgba(255, 126, 95, 0.15);
        }

            /* line 38, E:/172 Etrain Education/172_Etrain_Education_html/sass/_button.scss */
        .btn_3:hover {
            color: #fff !important;
            background-image: linear-gradient(to left, #6c757d 0%, #bbc0c4 51%, #6c757d 100%);
            background-position: right center;
            box-shadow: 0px 10px 30px 0px rgba(193, 34, 10, 0.2);
        } 
    </style>
</head>
<body class="hold-transition @yield('body_class')">

@yield('body')

<script src="{{ asset('vendor/adminlte/vendor/jquery/dist/jquery.min.js') }}"></script>
<script src="{{ asset('vendor/adminlte/vendor/bootstrap/dist/js/bootstrap.min.js') }}"></script>

@if(config('adminlte.plugins.select2'))
    <!-- Select2 -->
    <script src="//cdnjs.cloudflare.com/ajax/libs/select2/4.0.3/js/select2.min.js"></script>
@endif

@if(config('adminlte.plugins.datatables'))
    <!-- DataTables -->
    <script src="//cdn.datatables.net/1.10.15/js/jquery.dataTables.min.js"></script>
@endif

@yield('adminlte_js')

</body>
</html>
