<!DOCTYPE html>
<html lang="{{ app()->getLocale()}}">
<head>
<meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">

  <!-- Bootstrap 3.3.7 -->
  
  

  <link  href="{{ asset('css/bootstrap.min.css') }}" rel="stylesheet">

 <link  href="{{ asset('css/font-awesome.min.css') }}" rel="stylesheet">

  <link href="{{ asset('css/AdminLTE.min.css') }}"  rel="stylesheet">
   <link  href="{{ asset('css/_all-skins.min.css') }}" rel="stylesheet">
  <link  href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,600,700,300italic,400italic,600italic" rel="stylesheet">
</head>
<body class="hold-transition skin-blue sidebar-mini">
@yield('content')
</body>
 <script src="{{ asset('js/jquery.min.js') }}"></script>
<!-- jQuery UI 1.11.4 -->
 <script src="{{ asset('js/jquery-ui.min.js') }}"></script>
<!-- Bootstrap 3.3.7 -->
<script src="{{ asset('js/bootstrap.min.js') }}"></script>
<script src="{{ asset('js/adminlte.min.js') }}"></script>
</html>