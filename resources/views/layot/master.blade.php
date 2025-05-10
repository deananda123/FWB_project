<!DOCTYPE html>
<html lang="en">
@include('layot.head')
<body class="hold-transition sidebar-mini layout-fixed">
<div class="wrapper">


  <!-- Navbar -->
  @include('layot.nav')
  <!-- /.navbar -->

  <!-- Main Sidebar Container -->
 @include('layot.aside')

  <!-- Content Wrapper. Contains page content -->
 @yield('content')
  <!-- /.content-wrapper -->
@include('layot.footer')

  <!-- Control Sidebar -->
  <aside class="control-sidebar control-sidebar-dark">
    <!-- Control sidebar content goes here -->
  </aside>
  <!-- /.control-sidebar -->
</div>
<!-- ./wrapper -->
@include('layot.script')
<!-- jQuery -->

</body>
</html>