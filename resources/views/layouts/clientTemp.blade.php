<!DOCTYPE html>
<html lang="{{ app()->getLocale()}}">
<head>
<meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">

  <!-- Bootstrap 3.3.7 -->
  
  
  <link href="//maxcdn.bootstrapcdn.com/font-awesome/4.1.0/css/font-awesome.min.css" rel="stylesheet">
  <link  href="{{ asset('css/bootstrap.min.css') }}" rel="stylesheet">

 <link  href="{{ asset('css/font-awesome.min.css') }}" rel="stylesheet">

  <link href="{{ asset('css/AdminLTE.min.css') }}"  rel="stylesheet">
   <link  href="{{ asset('css/_all-skins.min.css') }}" rel="stylesheet">
  <link  href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,600,700,300italic,400italic,600italic" rel="stylesheet">
</head>
<body class="hold-transition skin-blue sidebar-mini">
<div class="wrapper">

  <!-- Main Header -->
  <header class="main-header">

    <!-- Logo -->
    <a href="index2.html" class="logo">
      <!-- mini logo for sidebar mini 50x50 pixels -->
      <span class="logo-mini"><b>My</b>A</span>
      <!-- logo for regular state and mobile devices -->
      <span class="logo-lg"><b>My</b>Account</span>
    </a>

    <!-- Header Navbar -->
    <nav class="navbar navbar-static-top" role="navigation">
      <!-- Sidebar toggle button-->
      <a href="#" class="sidebar-toggle" data-toggle="push-menu" role="button">
        <span class="sr-only">Toggle navigation</span>
      </a>
      <!-- Navbar Right Menu -->
     
               
          <!-- /.messages-menu -->  
          <!-- Control Sidebar Toggle Button -->
         
        </ul>
      </div>
    </nav>
  </header>
  <!-- Left side column. contains the logo and sidebar -->
  <aside class="main-sidebar">

    <!-- sidebar: style can be found in sidebar.less -->
    <section class="sidebar">

      <!-- Sidebar user panel (optional) -->
      <div class="user-panel">
        <div class="pull-left image">
          <img src="/storage/avatar_images/{{$client->avatar_image}}" class="img-circle" alt="User Image">
        </div>
        <div class="pull-left info">
          <p>{{$client->name}}</p>
         
        </div>
      </div>

     

      <!-- Sidebar Menu -->
      <ul class="sidebar-menu" data-widget="tree">
       
        <!-- Optionally, you can add icons to the links -->
        <li ><a href="#"><i class="fa fa-link"></i> <span>My Profile</span></a></li>
        <li><a href="#"><i class="fa fa-link"></i> <span>Update Profile</span></a></li>
        <li><a href="#"><i class="fa fa-link"></i> <span>My Reservations</span></a></li>
        <li><a href="#"><i class="fa fa-link"></i> <span>Make Reservation</span></a></li>
        
      </ul>
      <!-- /.sidebar-menu -->
    </section>
    <!-- /.sidebar -->
  </aside>

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
   

    <!-- Main content -->
    <section class="content container-fluid">

      <!--------------------------
        | Your Page Content Here |
        -------------------------->
        @yield('mainPage')

    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->

  <!-- Main Footer -->
  <footer class="main-footer">
   
    
    <!-- Default to the left -->
    <strong>Copyright &copy; 2016 <a href="#">Company</a>.</strong> All rights reserved.
  </footer>

</body>
 <script src="{{ asset('js/jquery.min.js') }}"></script>
<!-- jQuery UI 1.11.4 -->
 <script src="{{ asset('js/jquery-ui.min.js') }}"></script>
<!-- Bootstrap 3.3.7 -->
<script src="{{ asset('js/bootstrap.min.js') }}"></script>
<script src="{{ asset('js/adminlte.min.js') }}"></script>
</html>
