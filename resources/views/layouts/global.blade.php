
<!DOCTYPE html>
<html>
<head>
    @include('includes.head')
</head>
<body class="hold-transition sidebar-mini" style="margin-right:50px; margin-left:50px">
<!-- Site wrapper -->
<div class="wrapper">
  <!-- Navbar -->
  <nav class="main-header navbar navbar-expand navbar-white navbar-light">
    <!-- Left navbar links -->
    <ul class="navbar-nav">
      <li class="nav-item">
        <a class="nav-link" data-widget="pushmenu" href="#"><i class="fas fa-bars"></i></a>
      </li>
      
    </ul>

  </nav>
  <!-- /.navbar -->   

    @include('includes.sidebar')

    
    @yield('content')
    

    @include('includes.footer')

  

  <!-- /.control-sidebar -->
</div>
<!-- ./wrapper -->

    @include('includes.js')
    @include('sweetalert::alert')

</body>
</html>
