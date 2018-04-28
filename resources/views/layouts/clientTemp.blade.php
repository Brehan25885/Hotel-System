<!DOCTYPE html>
<html lang="{{ app()->getLocale()}}">
<head>
<meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">

  <!-- Bootstrap 3.3.7 -->
  <!--for datatables-->
  
  <!--end -->

  <link href="//maxcdn.bootstrapcdn.com/font-awesome/4.1.0/css/font-awesome.min.css" rel="stylesheet">

  <link  href="{{ asset('css/bootstrap.min.css') }}" rel="stylesheet">
  <link  href="{{ asset('css/font-awesome.min.css') }}" rel="stylesheet">
  <link href="{{ asset('css/AdminLTE.min.css') }}"  rel="stylesheet">
  <link  href="{{ asset('css/_all-skins.min.css') }}" rel="stylesheet">

  <link  href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,600,700,300italic,400italic,600italic" rel="stylesheet">
  
 <!-- for stripe -->
 <script src="https://js.stripe.com/v3/"></script>
 
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
        <li ><a href="/clients/{{$client->id}}"><i class="fa fa-link"></i> <span>My Profile</span></a></li>
        <li><a href="/clients/{{$client->id}}/edit"><i class="fa fa-link"></i> <span>Edit Profile</span></a></li>
        <li><a href="/reservations/{{$client->id}}"><i class="fa fa-link"></i> <span>My Reservations</span></a></li>
        <li><a href="/rooms/{{$client->id}}"><i class="fa fa-link"></i> <span>Make Reservation</span></a></li>
        <li><a href="{{ route('logout') }}" onclick="event.preventDefault();
                                         document.getElementById('logout-form').submit();">
            <i class="fa fa-link"></i> <span>Logout</span></a></li>
            <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                        @csrf
                                    </form>
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
 <!--<footer class="main-footer"> -->
   
    
    <!-- Default to the left -->
   <!-- <strong>Copyright &copy; 2016 <a href="#">Company</a>.</strong> All rights reserved.
  </footer> -->
  <!-- jQuery -->


<!-- Bootstrap 3.3.7 -->


</body>
<script src="{{ asset('js/jquery.min.js') }}"></script>
<!-- jQuery UI 1.11.4 -->
 <script src="{{ asset('js/jquery-ui.min.js') }}"></script>
<!-- Bootstrap 3.3.7 -->
<script src="{{ asset('js/bootstrap.min.js') }}"></script>
<script src="{{ asset('js/adminlte.min.js') }}"></script>

<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.2.0/jquery.min.js"></script>
<link href="//netdna.bootstrapcdn.com/bootstrap/3.2.0/css/bootstrap.min.css" rel="stylesheet">
<link rel="stylesheet" href="//cdn.datatables.net/1.10.7/css/jquery.dataTables.min.css">
<!-- DataTables -->
<script src="//cdn.datatables.net/1.10.7/js/jquery.dataTables.min.js"></script>
        <!-- Bootstrap JavaScript -->
<script src="//netdna.bootstrapcdn.com/bootstrap/3.2.0/js/bootstrap.min.js"></script>
<!-- App scripts -->
</html>